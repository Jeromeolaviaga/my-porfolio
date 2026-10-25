<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Portfolio | Computer Science</title>
  <link rel="stylesheet" href="{{ asset('css/darkmode.css') }}">
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tech_icons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fix_overlapping.css') }}">
  <link rel="stylesheet" href="{{ asset('css/float_mess.css') }}">
  <link rel="stylesheet" href="{{ asset('css/float_galaxy.css') }}">
  <link rel="stylesheet" href="{{ asset('css/m_polished.css') }}">
  <link rel="stylesheet" href="{{ asset('css/subtle.css') }}">
  <link rel="stylesheet" href="{{ asset('css/premium.css') }}">
  <style>
    /* Dark Mode Button */
    /*  PROFILE */
    /* TECHNOLOGY ICONS */
    /* FIX HTML/CSS LOGOS OVERLAPPING TEXT */
    /* Messenger floating icon - all screen sizes */
    /* FLOATING MESSENGER BUTTON */
    /* ===== Modern Galaxy Portfolio Upgrade ===== */
    /* ===== Minimal, polished portfolio theme ===== */
    /* ===== Subtle interactive motion effects ===== */
    /* PREMIUM MOTION UPGRADE: visible aurora, glow, orbit and 3D movement */
  </style>



  <style id="floating-controls-position-fix">
    /* Keep floating controls anchored to the browser viewport while scrolling */
    body {
      perspective: none !important;
    }

    body a.messenger-float {
      position: fixed !important;
      right: 26px !important;
      bottom: 26px !important;
      top: auto !important;
      left: auto !important;
      width: 68px !important;
      height: 68px !important;
      min-width: 68px !important;
      max-width: 68px !important;
      min-height: 68px !important;
      max-height: 68px !important;
      z-index: 100000 !important;
    }

    body a.messenger-float svg {
      width: 39px !important;
      height: 39px !important;
      min-width: 39px !important;
      max-width: 39px !important;
      min-height: 39px !important;
      max-height: 39px !important;
      flex: 0 0 39px !important;
    }

    body .theme-toggle {
      position: fixed !important;
      top: 22px !important;
      right: 26px !important;
      bottom: auto !important;
      left: auto !important;
      z-index: 100001 !important;
    }

    @media (max-width: 600px) {
      body a.messenger-float {
        right: 16px !important;
        bottom: 17px !important;
        width: 62px !important;
        height: 62px !important;
        min-width: 62px !important;
        max-width: 62px !important;
        min-height: 62px !important;
        max-height: 62px !important;
      }

      body a.messenger-float svg {
        width: 35px !important;
        height: 35px !important;
        min-width: 35px !important;
        max-width: 35px !important;
        min-height: 35px !important;
        max-height: 35px !important;
        flex: 0 0 35px !important;
      }

      body .theme-toggle {
        top: 14px !important;
        right: 15px !important;
      }
    }
  </style>


  <style id="static-hero-text-fix">
    /* Keep the hero text and underline completely still. */
    .hero h1,
    .hero .intro,
    .hero .accent {
      animation: none !important;
      transform: none !important;
      transition: none !important;
      letter-spacing: inherit !important;
    }

    .hero h1,
    .hero .intro {
      opacity: 1 !important;
      filter: none !important;
    }

    /* Prevent the entire portfolio panel from shifting on load. */
    .portfolio {
      animation: none !important;
      transform: none !important;
    }
  </style>

</head>

<body>
  <div class="cinematic-lights" aria-hidden="true"><span></span><span></span><span></span></div>
  <canvas id="motionCanvas" aria-hidden="true"></canvas>

  <button id="themeToggle" class="theme-toggle"
    aria-label="Toggle dark mode">
    <span class="theme-icon">
      <svg id="themeIcon" viewBox="0 0 24 24" fill="none">
        <path d="M20.2 15.2A8.5 8.5 0 0 1 8.8 3.8
        8.5 8.5 0 1 0 20.2 15.2Z"
          stroke="currentColor" stroke-width="1.8"
          stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </span>
    <span id="themeLabel">Dark Mode</span>
  </button>
  <main class="portfolio">

    <header class="hero">
      <div>
        <h1>Hello, I am <span class="accent">Jerome Olaviaga</span></h1>

        <p class="intro">
          A Computer Science graduate interested in technology, and creating useful digital solutions.
          I enjoy learning new skills and improving my work
          through practice and collaboration.
        </p>



        <div class="contact-section">
          <h2>Contact</h2>

          <div class="contact-list">

            <!-- Email -->
            <a href="mailto:olaviagajerome45@gmail.com"
              class="contact-item">
              <span class="contact-icon">
                <svg viewBox="0 0 24 24">
                  <rect x="3" y="5" width="18" height="14" rx="3" />
                  <path d="m4 7 8 6 8-6" />
                </svg>
              </span>
              <span>olaviagajerome45@gmail.com</span>
            </a>

            <!-- Phone -->
            <a href="tel:+63952397169" class="contact-item">
              <span class="contact-icon">
                <svg viewBox="0 0 24 24">
                  <path d="M5 3h4l2 5-3 2a15 15 0 0 0 6 6l2-3 5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 5a2 2 0 0 1 2-2Z" />
                </svg>
              </span>
              <span>09452397169</span>
            </a>

            <!-- Location -->
            <div class="contact-item">
              <span class="contact-icon">
                <svg viewBox="0 0 24 24">
                  <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" />
                  <circle cx="12" cy="10" r="2.5" />
                </svg>
              </span>
              <span>Cabuyao, Laguna, Philippines</span>
            </div>

            <!-- Instagram -->
            <a href="https://www.instagram.com/jeromeolaviaga3/"
              target="_blank"
              rel="noopener noreferrer"
              class="contact-item">
              <span class="contact-icon">
                <svg viewBox="0 0 24 24">
                  <rect x="3" y="3" width="18" height="18" rx="5" />
                  <circle cx="12" cy="12" r="4" />
                  <circle cx="18" cy="6" r="1"
                    fill="#faf9f5" stroke="none" />
                </svg>
              </span>
              <span>jeromeolaviaga</span>
            </a>
            <!-- GitHub -->
            <a href="https://github.com/Jeromeolaviaga"
              target="_blank"
              rel="noopener noreferrer"
              class="contact-item">
              <span class="contact-icon">
                <svg viewBox="0 0 24 24">
                  <rect x="3" y="3" width="18" height="18" rx="5" />
                  <circle cx="12" cy="12" r="4" />
                  <circle cx="18" cy="6" r="1"
                    fill="#faf9f5" stroke="none" />
                </svg>
              </span>
              <span>GitHub</span>
            </a>
          </div>
        </div>

      </div>


      <div class="profile profile-hover">
        <img
          src="{{ asset('image/ito.jpeg') }}"
          alt="Jerome Olaviaga"
          class="profile-default">

        <img
          src="{{ asset('image/what.jpg') }}"
          alt="Jerome Olaviaga alternate photo"
          class="profile-alternate">
      </div>

    </header>

    <div class="grid">
      <section>
        <h2>Education</h2>
        <div class="item">
          <strong>Bachelor of Science in Computer Science</strong>
          <p class="muted">Westbridge Intitute of Technology INC</p>
          <p class="muted">April 2026</p>
        </div>
      </section>

      <section>
        <h2>Soft Skills</h2>
        <div class="tags">
          <span class="tag">Problem Solving</span>
          <span class="tag">Teamwork</span>
          <span class="tag">Communication</span>
          <span class="tag">Willingness to Learn</span>
        </div>
      </section>
    </div>

    <section>
      <h2>Featured Projects</h2>

      <div class="item">
        <strong>RFID Attendance Monitoring System From Westbridge Institute of Technology</strong>
        <p class="muted">
          An academic project involving attendance records,
          database integration, and data processing.
        </p>
      </div>

      <div class="item">
        <strong>Web-Based Augmented Reality System: A Thesis on Product Visualization and Intelligent Recommendations for Simeon Home Furniture</strong>
        <p class="muted">
          An academic project focused on furniture visualization,
          product browsing, and personalized recommendations.
        </p>
      </div>


    </section>




    <section class="software-section">
      <div class="software-heading">
        <p class="software-subtitle">MY TECH STACK</p>
        <h2>Tools &amp; Technologies</h2>
        <p class="software-description">
          Tools and technologies I've used throughout my studies
          and personal projects.
        </p>
      </div>

      <div class="software-grid">

        <div class="software-item">
          <div class="software-icon html-css-icon">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3">
          </div>
          <div class="software-info">
            <h3>HTML / CSS</h3>
            <p>Structure and styling for web pages.</p>
          </div>
        </div>

        <div class="software-item">
          <div class="software-icon">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel">
          </div>
          <div class="software-info">
            <h3>Laravel</h3>
            <p>Framework for building web applications.</p>
          </div>
        </div>

        <div class="software-item">
          <div class="software-icon">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP">
          </div>
          <div class="software-info">
            <h3>PHP</h3>
            <p>Server-side web development.</p>
          </div>
        </div>

        <div class="software-item">
          <div class="software-icon">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma">
          </div>
          <div class="software-info">
            <h3>Figma / UI Design</h3>
            <p>Designing and prototyping interfaces.</p>
          </div>
        </div>

        <div class="software-item">
          <div class="software-icon">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL">
          </div>
          <div class="software-info">
            <h3>MySQL</h3>
            <p>Database management and data storage.</p>
          </div>
        </div>

        <div class="software-item">
          <div class="software-icon github-icon">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub">
          </div>
          <div class="software-info">
            <h3>GitHub</h3>
            <p>Code version control and collaboration.</p>
          </div>
        </div>

      </div>
    </section>



    <!-- Messenger Contact Button -->



    <a href="https://www.facebook.com/jerome.olaviaga"
      target="_blank"
      rel="noopener noreferrer"
      class="messenger-float"
      aria-label="Contact me on Facebook"
      title="Contact me">

      <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 40 40"
        aria-hidden="true">

        <defs>
          <linearGradient id="messengerGradient"
            x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#00D3FF" />
            <stop offset="48%" stop-color="#087CFF" />
            <stop offset="100%" stop-color="#A033FF" />
          </linearGradient>
        </defs>

        <circle cx="20" cy="20" r="20"
          fill="url(#messengerGradient)" />

        <path fill="#FFFFFF"
          d="M20 6.5C12.35 6.5 6.5 12.05 6.5 19.35c0 3.8 1.65 7.05 4.55 9.2v4.95l4.7-2.6c1.35.4 2.8.65 4.25.65 7.65 0 13.5-5.55 13.5-12.2S27.65 6.5 20 6.5Z" />

        <path fill="#087CFF"
          d="m9.8 23.2 7.2-7.65 4.05 4.05 7.4-4.05-7.2 7.65-4.05-4.05-7.4 4.05Z" />
      </svg>

    </a>





    <footer>
      © 2026 Jerome Olaviaga · Personal Portfolio
    </footer>




  </main>


  <script src="{{ asset('js/first.js') }}"></script>

  <script src="{{ asset('js/second.js') }}"></script>


  <script id="float-controls-viewport-fix">
    document.addEventListener('DOMContentLoaded', () => {
      const messenger = document.querySelector('a.messenger-float');
      const themeToggle = document.querySelector('.theme-toggle');
      if (messenger && messenger.parentElement !== document.body) document.body.appendChild(messenger);
      if (themeToggle && themeToggle.parentElement !== document.body) document.body.appendChild(themeToggle);
    });
  </script>

</body>

</html>