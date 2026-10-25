<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Portfolio | Computer Science</title>

  <style>
    /* Dark Mode Button */
    .theme-toggle {
      position: fixed;
      top: 22px;
      right: 24px;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 7px 17px 7px 7px;
      border: 1px solid #d8d2c6;
      border-radius: 50px;
      background: #faf9f5;
      color: #292a2e;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: 0.3s ease;
      z-index: 1000;
    }

    .theme-toggle:hover {
      transform: translateY(-2px);
    }

    .theme-icon {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #292a2e;
      color: #f6e6b5;
    }

    .theme-icon svg {
      width: 18px;
      height: 18px;
    }

    /* Keep the outside beige */
    body.dark-mode {
      background: #e9e6df !important;
      color: #252522;
    }

    /* Darken only the portfolio card */
    body.dark-mode .portfolio {
      background: #242424 !important;
      color: #f0eee8;
    }

    /* Text inside the card */
    body.dark-mode .portfolio h1,
    body.dark-mode .portfolio h2,
    body.dark-mode .portfolio strong {
      color: #f0eee8;
    }

    body.dark-mode .portfolio p,
    body.dark-mode .portfolio .muted,
    body.dark-mode .portfolio .intro,
    body.dark-mode .portfolio .software-name {
      color: #c5c3bc;
    }

    body.dark-mode .portfolio .accent {
      color: #65b8b0;
    }

    body.dark-mode .portfolio .item,
    body.dark-mode .portfolio footer {
      border-color: #454545;
    }

    body.dark-mode .portfolio .tag {
      background: #303b39;
      color: #a8d8d0;
      border-color: #438c87;
    }

    body.dark-mode .theme-toggle {
      background: #292a2e;
      color: #f4f0e8;
      border-color: #45464b;
    }

    body.dark-mode .theme-icon {
      background: #f6e6b5;
      color: #292a2e;
    }

    @media (max-width: 600px) {
      .theme-toggle {
        top: 14px;
        right: 14px;
      }
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: #e9e6df;
      color: #252522;
      font-family: Arial, sans-serif;
      padding: 24px;
      line-height: 1.6;
    }

    .portfolio {
      max-width: 1000px;
      margin: auto;
      padding: 48px;
      background: #faf9f5;
      border-radius: 20px;
    }

    h1,
    h2 {
      font-family: Georgia, serif;
    }

    h1 {
      font-size: clamp(32px, 5vw, 54px);
      line-height: 1.2;
    }

    h2 {
      font-size: 28px;
      margin-bottom: 14px;
    }

    .accent {
      color: #438c87;
    }

    .hero {
      display: grid;
      grid-template-columns: 1.3fr 0.7fr;
      gap: 35px;
      align-items: center;
      margin-bottom: 48px;
    }

    .intro {
      margin-top: 20px;
      color: #62625d;
    }

    /*  PROFILE */

    /* PROFILE IMAGE HOVER */
    .profile {
      width: 300px;
      height: 290px;
      border-radius: 50%;
      overflow: hidden;
      position: relative;
    }

    .profile img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      border-radius: 50%;
      transition: opacity 0.35s ease, transform 0.4s ease;
    }

    .profile-default {
      opacity: 1;
    }

    .profile-alternate {
      opacity: 0;
    }

    .profile-hover:hover .profile-default {
      opacity: 0;
    }

    .profile-hover:hover .profile-alternate {
      opacity: 1;
      transform: scale(1.04);
    }


    section {
      margin-bottom: 38px;
    }

    .grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
    }

    .item {
      border-bottom: 1px solid #dedbd2;
      padding: 12px 0;
    }

    .muted {
      color: #77766f;
      font-size: 14px;
    }

    .tags {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .tag {
      border: 1px solid #8cb8b1;
      color: #326f69;
      border-radius: 30px;
      padding: 8px 15px;
      font-size: 14px;
    }


    /* Contact Section */
    .contact-section {
      margin-top: 32px;
    }

    .contact-section h2 {
      font-family: Georgia, serif;
      font-size: 28px;
      margin-bottom: 14px;
      color: #252522;
    }

    /* Two-column contact layout */
    .contact-list {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 12px 18px;
    }

    /* Each contact item */
    .contact-item {
      display: flex;
      align-items: center;
      gap: 9px;
      min-width: 0;
      color: #326f69;
      font-size: 12px;
      line-height: 1.4;
      text-decoration: none;
      transition: color 0.2s ease;
    }

    .contact-item:hover {
      color: #252522;
    }

    /* Circular icon background */
    .contact-icon {
      width: 25px;
      height: 25px;
      min-width: 25px;
      border-radius: 50%;
      background: #252522;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s ease;
    }

    .contact-item:hover .contact-icon {
      background: #438c87;
    }

    /* SVG icons */
    .contact-icon svg {
      width: 14px;
      height: 14px;
      fill: none;
      stroke: #faf9f5;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    /* Prevent long email from overflowing */
    .contact-item>span:last-child {
      overflow-wrap: anywhere;
    }

    /* Responsive layout for mobile */
    @media (max-width: 650px) {
      .contact-list {
        grid-template-columns: 1fr;
        gap: 12px;
      }

      .contact-item {
        font-size: 13px;
      }
    }


    footer {
      border-top: 1px solid #dedbd2;
      padding-top: 20px;
      color: #77766f;
      font-size: 13px;
      text-align: center;
    }

    @media (max-width: 650px) {
      body {
        padding: 10px;
      }

      .portfolio {
        padding: 25px 20px;
      }

      .hero,
      .grid {
        grid-template-columns: 1fr;
      }

      .profile {
        min-height: 200px;
      }
    }




    /* TECHNOLOGY ICONS */
    @import url("https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css");

    /* SECTION HEADING */
    .software-section {
      margin-top: 45px;
    }

    .software-heading {
      margin-bottom: 27px;
    }

    .software-subtitle {
      color: #438c87;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 2.5px;
      margin-bottom: 5px;
    }

    .software-heading h2 {
      font-family: Georgia, serif;
      font-size: clamp(27px, 3vw, 36px);
      margin-bottom: 10px;
    }

    .software-description {
      color: #77766f;
      font-size: 14px;
      line-height: 1.7;
      max-width: 500px;
    }

    /* THREE-COLUMN GRID */
    .software-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 16px;
    }

    /* TECHNOLOGY CARDS */
    .software-item {
      display: flex;
      align-items: center;
      gap: 13px;
      min-width: 0;
      padding: 20px 16px;
      border: 1px solid #dedbd2;
      border-radius: 17px;
      background: #faf9f5;
      transition: transform 0.25s ease,
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
    }

    .software-item:hover {
      transform: translateY(-4px);
      border-color: #a5c6c0;
      box-shadow: 0 10px 25px rgba(37, 37, 34, 0.07);
    }

    /* ICONS */
    .software-icon {
      width: 48px;
      min-width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 35px;
    }

    .software-icon i {
      font-size: 36px;
    }


    /* FIX HTML/CSS LOGOS OVERLAPPING TEXT */
    .software-item .software-icon.html-css-icon {
      display: flex !important;
      flex: 0 0 48px !important;
      width: 48px !important;
      min-width: 48px !important;
      max-width: 48px !important;
      height: 48px !important;
      gap: 2px !important;
      overflow: hidden !important;
      align-items: center !important;
      justify-content: center !important;
    }

    .software-item .software-icon.html-css-icon img {
      display: block !important;
      flex: 0 0 21px !important;
      width: 21px !important;
      min-width: 21px !important;
      max-width: 21px !important;
      height: 28px !important;
      object-fit: contain !important;
      margin: 0 !important;
    }

    .software-item .software-info {
      flex: 1 1 0 !important;
      min-width: 0 !important;
      overflow-wrap: anywhere;
    }

    /* FIX HTML/CSS LOGOS OVERLAPPING TEXT */
    .software-item .software-icon.html-css-icon {
      display: flex !important;
      flex: 0 0 48px !important;
      width: 48px !important;
      min-width: 48px !important;
      max-width: 48px !important;
      height: 48px !important;
      gap: 2px !important;
      overflow: hidden !important;
      align-items: center !important;
      justify-content: center !important;
    }

    .software-item .software-icon.html-css-icon img {
      display: block !important;
      flex: 0 0 28px !important;
      width: 28px !important;
      min-width: 28px !important;
      max-width: 28px !important;
      height: 34px !important;
      object-fit: contain !important;
      margin: 0 !important;
    }

    .software-item .software-info {
      flex: 1 1 0 !important;
      min-width: 0 !important;
      overflow-wrap: anywhere;
    }


    .github-icon {
      color: #252522;
    }

    /* TEXT */
    .software-info {
      flex: 1;
      min-width: 0;
    }

    .software-info h3 {
      color: #292a2e;
      font-family: Arial, sans-serif;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 7px;
    }

    .software-info p {
      color: #77766f;
      font-size: 11px;
      line-height: 1.7;
      overflow-wrap: anywhere;
    }

    /* ARROW */
    .software-arrow {
      width: 27px;
      min-width: 27px;
      height: 27px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      background: #e2eae7;
      color: #438c87;
      font-size: 17px;
      transition: transform 0.25s ease,
        background 0.25s ease;
    }

    .software-item:hover .software-arrow {
      transform: translate(2px, -2px);
      background: #438c87;
      color: #ffffff;
    }

    /* DARK MODE */
    body.dark-mode .software-item {
      background: #242626;
      border-color: #454949;
    }

    body.dark-mode .software-item:hover {
      border-color: #65b8b0;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    body.dark-mode .software-heading h2,
    body.dark-mode .software-info h3 {
      color: #f0eee8;
    }

    body.dark-mode .software-description,
    body.dark-mode .software-info p {
      color: #bcbdb8;
    }

    body.dark-mode .github-icon {
      color: #f0eee8;
    }

    body.dark-mode .software-arrow {
      background: #303b39;
      color: #8fd0c7;
    }






    /* Messenger floating icon - all screen sizes */


    /* FLOATING MESSENGER BUTTON */
    body a.messenger-float {
      position: fixed !important;
      right: 22px !important;
      bottom: 22px !important;
      top: auto !important;
      left: auto !important;

      width: 60px !important;
      height: 60px !important;
      min-width: 60px !important;
      max-width: 60px !important;
      min-height: 60px !important;
      max-height: 60px !important;

      display: flex !important;
      align-items: center !important;
      justify-content: center !important;

      padding: 0 !important;
      margin: 0 !important;
      background: #ffffff !important;
      border: 1px solid rgba(0, 106, 255, 0.12) !important;
      border-radius: 50% !important;
      box-shadow: 0 4px 14px rgba(0, 80, 200, 0.22) !important;

      text-decoration: none !important;
      line-height: 1 !important;
      z-index: 99999 !important;

      transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }

    /* ICON SIZE */
    body a.messenger-float svg {
      width: 34px !important;
      height: 34px !important;
      min-width: 34px !important;
      max-width: 34px !important;
      min-height: 34px !important;
      max-height: 34px !important;
      display: block !important;
      flex: 0 0 34px !important;
    }

    /* HOVER EFFECT */
    body a.messenger-float:hover {
      transform: translateY(-3px) scale(1.05) !important;
      box-shadow: 0 7px 18px rgba(0, 80, 200, 0.3) !important;
    }

    @media (max-width: 600px) {
      body a.messenger-float {
        right: 15px !important;
        bottom: 15px !important;
      }
    }


    /* RESPONSIVE */
    @media (max-width: 900px) {
      .software-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 560px) {
      .software-grid {
        grid-template-columns: 1fr;
      }

      .software-item {
        padding: 17px 15px;
      }





    }
  </style>


</head>

<body>

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
          A Computer Science graduate interested in technology,
          web development, and creating useful digital solutions.
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
                  <path fill="#faf9f5" stroke="none"
                    d="M12 2a10 10 0 0 0-3.16 19.49c.5.09.68-.22.68-.48v-1.7c-2.78.6-3.37-1.18-3.37-1.18-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.9 1.53 2.36 1.09 2.94.83.09-.65.35-1.09.64-1.34-2.22-.25-4.56-1.11-4.56-4.95 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02A9.56 9.56 0 0 1 12 6.97c.85 0 1.7.11 2.5.34 1.91-1.29 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.85-2.34 4.7-4.57 4.95.36.31.68.92.68 1.85v2.6c0 .26.18.57.69.48A10 10 0 0 0 12 2Z" />
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


  <script>
    const themeToggle = document.getElementById('themeToggle');
    const themeLabel = document.getElementById('themeLabel');
    const themeIcon = document.getElementById('themeIcon');

    const moonIcon = `
        <path d="M20.2 15.2A8.5 8.5 0 0 1 8.8 3.8
        8.5 8.5 0 1 0 20.2 15.2Z"
        stroke="currentColor" stroke-width="1.8"
        stroke-linecap="round" stroke-linejoin="round"/>
    `;

    const sunIcon = `
        <circle cx="12" cy="12" r="4"
        stroke="currentColor" stroke-width="1.8"/>
        <path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42
        m11.3 11.3 1.42 1.42M2 12h2m16 0h2
        M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"
        stroke="currentColor" stroke-width="1.8"
        stroke-linecap="round"/>
    `;

    function updateThemeButton(isDark) {
      themeLabel.textContent = isDark ? 'Light Mode' : 'Dark Mode';
      themeIcon.innerHTML = isDark ? sunIcon : moonIcon;
    }

    const savedTheme = localStorage.getItem('portfolio-theme');
    document.body.classList.toggle('dark-mode', savedTheme === 'dark');
    updateThemeButton(savedTheme === 'dark');

    themeToggle.addEventListener('click', function() {
      document.body.classList.toggle('dark-mode');

      const isDark = document.body.classList.contains('dark-mode');

      localStorage.setItem('portfolio-theme', isDark ? 'dark' : 'light');
      updateThemeButton(isDark);
    });
  </script>



</body>

</html>