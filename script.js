document.addEventListener('DOMContentLoaded', () => {

  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileDropdown = document.getElementById('mobile-dropdown');

  if (mobileMenuBtn && mobileDropdown) {
    mobileMenuBtn.addEventListener('click', () => {
      mobileDropdown.classList.toggle('open');
    });
  }


  let movies = ['default-1', 'default-2', 'default-3'];
  const movieGrid = document.getElementById('movie-grid');


  movieGrid.addEventListener('click', (e) => {
    const removeBtn = e.target.closest('.remove-btn');
    if (removeBtn) {
      const idToRemove = removeBtn.getAttribute('data-id');
      movies = movies.filter(id => id !== idToRemove);
      
      const card = removeBtn.closest('.movie-card');
      if (card) {
        card.remove();
      }
    }
  });


  const searchInput = document.getElementById('movie-search');
  const searchResults = document.getElementById('search-results');
  let searchTimeout;

  searchInput.addEventListener('input', (e) => {
    const query = e.target.value.trim();
    clearTimeout(searchTimeout);

    if (query.length < 2) {
      searchResults.classList.remove('active');
      searchResults.innerHTML = '';
      return;
    }

    searchTimeout = setTimeout(async () => {
      try {
        const response = await fetch(`https://api.tvmaze.com/search/shows?q=${encodeURIComponent(query)}`);
        const data = await response.json();

        searchResults.innerHTML = '';
        if (data.length > 0) {
          data.forEach(item => {
            const show = item.show;
            const resultItem = document.createElement('div');
            resultItem.className = 'search-result-item';

            const imgUrl = show.image && show.image.medium ? show.image.medium : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
            const year = show.premiered ? show.premiered.substring(0, 4) : 'N/A';

            resultItem.innerHTML = `
              <img src="${imgUrl}" alt="${show.name}" class="search-result-img">
              <div class="search-result-info">
                <span class="search-result-title">${show.name}</span>
                <span class="search-result-year">${year}</span>
              </div>
            `;

            resultItem.addEventListener('click', () => {
              addMovieFromSearch(show);
              searchInput.value = '';
              searchResults.classList.remove('active');
            });

            searchResults.appendChild(resultItem);
          });
          searchResults.classList.add('active');
        } else {
          searchResults.innerHTML = '<div style="padding: 12px; font-size: 14px; color: #9ca3af;">No results found</div>';
          searchResults.classList.add('active');
        }
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }, 300);
  });


  document.addEventListener('click', (e) => {
    if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
      searchResults.classList.remove('active');
    }
  });

  function addMovieFromSearch(show) {
    const showId = show.id.toString();


    if (movies.includes(showId)) {
      alert('This movie is already in your library!');
      return;
    }


    let desc = show.summary ? show.summary.replace(/<[^>]*>?/gm, '') : 'No description available.';
    let img = show.image && show.image.original ? show.image.original : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';

    movies.push(showId);

    const card = document.createElement('article');
    card.className = 'movie-card';
    card.innerHTML = `
      <div class="movie-img-wrapper">
        <img src="${img}" alt="${show.name}" class="movie-img">
        <button type="button" class="remove-btn" aria-label="Remove ${show.name}" data-id="${showId}">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <div class="movie-content">
        <h3 class="movie-title">${show.name}</h3>
        <p class="movie-desc">${desc}</p>
      </div>
    `;

    movieGrid.appendChild(card);
  }


  const contactForm = document.getElementById('contact-form');
  const formMessage = document.getElementById('form-message');
  const submitBtn = document.getElementById('submit-btn');

  if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      formMessage.className = 'form-message';
      formMessage.innerText = '';


      const firstName = document.getElementById('first-name').value.trim();
      const lastName = document.getElementById('last-name').value.trim();
      const email = document.getElementById('email').value.trim();
      const message = document.getElementById('message').value.trim();
      const terms = document.getElementById('terms').checked;

      if (!firstName || !lastName || !email || !message || !terms) {
        showFormMessage('Please fill all required fields and accept the Terms & Conditions.', 'error');
        return;
      }


      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        showFormMessage('Please enter a valid email address.', 'error');
        return;
      }

      submitBtn.disabled = true;
      submitBtn.innerText = 'SUBMITTING...';

      try {
        const formData = new FormData(contactForm);
        const response = await fetch('backend/submit.php', {
          method: 'POST',
          body: formData
        });

        const result = await response.json();

        if (result.success) {
          showFormMessage(result.message, 'success');
          contactForm.reset();
        } else {
          showFormMessage(result.message || 'An error occurred.', 'error');
        }
      } catch (error) {
        showFormMessage('A network error occurred. Please try again.', 'error');
      } finally {
        submitBtn.disabled = false;
        submitBtn.innerText = 'SUBMIT';
      }
    });
  }

  function showFormMessage(msg, type) {
    formMessage.innerText = msg;
    formMessage.className = 'form-message ' + type;
  }
});
