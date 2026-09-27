<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Library - Cinema & Theaters</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header class="site-header">
    <div class="container header-inner">
      <a class="logo-link" href="#">
        <img src="assets/logo.png" alt="Logo" class="logo-image">
      </a>


      <nav class="desktop-nav">
        <a class="nav-link" href="#home">HOME</a>
        <a class="nav-link" href="#" data-disabled="true">OUR SCREENS</a>
        <a class="nav-link" href="#" data-disabled="true">SCHEDULE</a>
        <a class="nav-link" href="#library">MOVIE LIBRARY</a>
        <a class="nav-link" href="#contact">LOCATION & CONTACT</a>
      </nav>


      <button id="mobile-menu-btn" class="mobile-menu-toggle" aria-label="Toggle Navigation Menu">
        <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>


    <div id="mobile-dropdown" class="mobile-dropdown">
      <a class="mobile-dropdown-link" href="#home">HOME</a>
      <a class="mobile-dropdown-link" href="#" data-disabled="true">OUR SCREENS</a>
      <a class="mobile-dropdown-link" href="#" data-disabled="true">SCHEDULE</a>
      <a class="mobile-dropdown-link" href="#library">MOVIE LIBRARY</a>
      <a class="mobile-dropdown-link" href="#contact">LOCATION & CONTACT</a>
    </div>
  </header>


  <section class="hero-section" id="home">
    <div class="hero-image-wrapper">
      <img src="assets/hero.png" alt="Dark Cinema Auditorium" class="hero-image">
      <div class="hero-overlay"></div>
    </div>
  </section>


  <section class="container library-intro" id="library">
    <div class="library-intro-content">
      <h1 class="library-title">Movie Library</h1>
      <p class="library-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
    </div>
  </section>


  <section class="container movie-collection">
    <div class="collection-header">
      <h2 class="collection-title">Collect your favourites</h2>
      <div class="search-wrapper">
        <svg class="search-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <input type="text" id="movie-search" class="search-input" placeholder="Search title and add to grid" autocomplete="off">
        <div id="search-results" class="search-results">

        </div>
      </div>
    </div>

    <div class="movie-grid" id="movie-grid">
      <article class="movie-card">
        <div class="movie-img-wrapper">
          <img src="assets/batman.png" alt="Batman Returns" class="movie-img">
          <button type="button" class="remove-btn" aria-label="Remove Batman Returns" data-id="default-1">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div class="movie-content">
          <h3 class="movie-title">Batman Returns</h3>
          <p class="movie-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut...</p>
        </div>
      </article>

      <article class="movie-card">
        <div class="movie-img-wrapper">
          <img src="assets/wildwildwest.png" alt="Wild Wild West" class="movie-img">
          <button type="button" class="remove-btn" aria-label="Remove Wild Wild West" data-id="default-2">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div class="movie-content">
          <h3 class="movie-title">Wild Wild West</h3>
          <p class="movie-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut...</p>
        </div>
      </article>

      <article class="movie-card">
        <div class="movie-img-wrapper">
          <img src="assets/spiderman.png" alt="The Amazing Spiderman" class="movie-img">
          <button type="button" class="remove-btn" aria-label="Remove The Amazing Spiderman" data-id="default-3">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div class="movie-content">
          <h3 class="movie-title">The Amazing Spiderman</h3>
          <p class="movie-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut...</p>
        </div>
      </article>
    </div>
  </section>


  <section class="contact-section" id="contact">
    <div class="container">
      <div class="contact-header">
        <h2 class="contact-title">How to reach us</h2>
        <p class="contact-desc">Lorem ipsum dolor sit amet, consetetur.</p>
      </div>

      <div class="contact-grid">

        <form id="contact-form" class="contact-form">
          <div class="form-row">
            <div class="form-group">
              <label for="first-name" class="form-label">First Name *</label>
              <input type="text" id="first-name" name="first-name" class="cinema-input" required>
            </div>
            <div class="form-group">
              <label for="last-name" class="form-label">Last Name *</label>
              <input type="text" id="last-name" name="last-name" class="cinema-input" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="email" class="form-label">Email *</label>
            <input type="email" id="email" name="email" class="cinema-input" required>
          </div>
          
          <div class="form-group">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="tel" id="telephone" name="telephone" class="cinema-input">
          </div>
          
          <div class="form-group">
            <label for="message" class="form-label">Message *</label>
            <textarea id="message" name="message" class="cinema-input" rows="4" required></textarea>
          </div>
          
          <p class="form-notice">*required fields</p>
          
          <div class="terms-group">
            <input type="checkbox" id="terms" name="terms" class="terms-checkbox" required>
            <label for="terms" class="terms-label">I agree to the <a href="#">Terms & Conditions</a></label>
          </div>
          
          <div class="submit-wrapper">
            <button type="submit" class="submit-btn" id="submit-btn">Submit</button>
          </div>

          <div id="form-message" class="form-message"></div>
        </form>


        <div class="map-container">
          <iframe 
            src="https://maps.google.com/maps?q=eBEYONDS+Digital+Marketing&t=&z=15&ie=UTF8&iwloc=&output=embed" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </section>


  <footer class="site-footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-address">
          <p class="company-name">IT Group</p>
          <p>C. Salvador de Madariaga, 1</p>
          <p>28027 Madrid</p>
          <p>Spain</p>
        </div>
        <div class="footer-social">
          <span>Follow us on</span>
          <a href="#" aria-label="Twitter">
            <svg class="social-icon" viewBox="0 0 24 24">
              <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.936 9.936 0 0024 4.59z"></path>
            </svg>
          </a>
          <a href="#" aria-label="YouTube">
            <svg class="social-icon" viewBox="0 0 24 24">
              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="footer-bottom">
        <div>Copyright © 2022 IT Hotels. All rights reserved.</div>
        <div>Photos by <a href="https://unsplash.com" target="_blank" rel="noopener noreferrer">Felix Mooneeram</a> & <a href="https://unsplash.com" target="_blank" rel="noopener noreferrer">Serge Kutuzov</a> on <a href="https://unsplash.com" target="_blank" rel="noopener noreferrer">Unsplash</a></div>
      </div>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>
