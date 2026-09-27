# Movie Library

A responsive movie library website built using HTML5, CSS3, JavaScript, PHP, and the TVMaze API.

## Features

- Responsive layout for desktop, tablet, and mobile
- Movie search using the TVMaze API
- Add movies to the library
- Remove movies from the library
- Duplicate movie prevention
- Contact form with client-side validation
- Server-side form validation using PHP
- Contact form submissions stored in JSON
- Confirmation email to the submitted email address
- Admin email notifications
- Google Maps location embed
- Responsive navigation with mobile menu

## Project Structure

/
├── index.php
├── style.css
├── script.js
├── README.md
├── assets/
│   ├── hero.png
│   ├── batman.png
│   ├── wildwildwest.png
│   └── spiderman.png
├── backend/
│   ├── submit.php
│   └── messages.json
└── config/
    └── email-config.php

## Technologies

- HTML5
- CSS3
- JavaScript
- PHP
- TVMaze API
- JSON

## Running the Project

### Requirements

- PHP 7.4 or later
- Modern web browser

### PHP Built-in Server

Open a terminal in the project directory and run:

    php -S localhost:8000

Then open:

    http://localhost:8000

### XAMPP / MAMP / WAMP

Place the project folder inside the appropriate web server directory and access it through the local server URL.

## Contact Form

The contact form uses both client-side and server-side validation.

Valid submissions are stored in:

    backend/messages.json

The backend also attempts to send:

- A confirmation email to the user
- An admin notification email containing the submitted form details

Email delivery through PHP's mail() function depends on the mail server configuration of the environment. On a local development machine, email delivery may require additional mail server configuration.

## Movie API

Movie searches use the TVMaze API:

https://api.tvmaze.com

Search results can be added to the movie library and removed using the controls provided on each movie card.