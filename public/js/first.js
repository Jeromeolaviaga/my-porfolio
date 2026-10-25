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


    // Scroll progress indicator
    const progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress';
    progressBar.setAttribute('aria-hidden', 'true');
    document.body.appendChild(progressBar);

    function updateScrollProgress() {
      const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
      const progress = maxScroll > 0 ? (window.scrollY / maxScroll) * 100 : 0;
      progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
    }
    window.addEventListener('scroll', updateScrollProgress, {
      passive: true
    });
    window.addEventListener('resize', updateScrollProgress);
    updateScrollProgress();

    // Reveal sections and cards gently as they enter the viewport
    const revealTargets = document.querySelectorAll(
      '.hero, section, .software-item, .contact-item, footer'
    );
    revealTargets.forEach((element, index) => {
      element.classList.add('js-reveal');
      if (element.classList.contains('software-item')) {
        element.style.transitionDelay = `${(index % 4) * 65}ms`;
      }
    });

    if ('IntersectionObserver' in window) {
      const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.12,
        rootMargin: '0px 0px -35px 0px'
      });
      revealTargets.forEach(element => revealObserver.observe(element));
    } else {
      revealTargets.forEach(element => element.classList.add('is-visible'));
    }

    // Soft cursor spotlight (desktop only)
    if (window.matchMedia('(pointer: fine)').matches) {
      window.addEventListener('pointermove', event => {
        document.body.style.setProperty('--pointer-x', `${event.clientX}px`);
        document.body.style.setProperty('--pointer-y', `${event.clientY}px`);
      }, {
        passive: true
      });
    }

    // Lightweight click ripple for buttons and interactive cards
    document.querySelectorAll('.theme-toggle, .software-item, .contact-item').forEach(element => {
      element.classList.add('ripple-host');
      element.addEventListener('pointerdown', event => {
        if (event.button !== 0) return;
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height) * 1.35;
        const ripple = document.createElement('span');
        ripple.className = 'ripple-dot';
        ripple.style.width = `${size}px`;
        ripple.style.height = `${size}px`;
        ripple.style.left = `${event.clientX - rect.left - size / 2}px`;
        ripple.style.top = `${event.clientY - rect.top - size / 2}px`;
        element.appendChild(ripple);
        ripple.addEventListener('animationend', () => ripple.remove(), {
          once: true
        });
      });
    });

    // Animated floating particles with gentle connecting lines
    (() => {
      const canvas = document.getElementById('motionCanvas');
      if (!canvas || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
      const ctx = canvas.getContext('2d');
      if (!ctx) return;
      let width = 0,
        height = 0,
        particles = [],
        frame = 0;
      const pointer = {
        x: -1000,
        y: -1000
      };
      const count = () => Math.min(75, Math.max(35, Math.floor(width / 19)));

      function resize() {
        const dpr = Math.min(window.devicePixelRatio || 1, 2);
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = Math.floor(width * dpr);
        canvas.height = Math.floor(height * dpr);
        canvas.style.width = width + 'px';
        canvas.style.height = height + 'px';
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        particles = Array.from({
          length: count()
        }, () => ({
          x: Math.random() * width,
          y: Math.random() * height,
          vx: (Math.random() - .5) * .42,
          vy: (Math.random() - .5) * .42,
          r: Math.random() * 2 + .7,
          phase: Math.random() * Math.PI * 2
        }));
      }

      function draw() {
        ctx.clearRect(0, 0, width, height);
        particles.forEach((p, i) => {
          p.x += p.vx;
          p.y += p.vy;
          p.phase += .018;
          if (p.x < -10) p.x = width + 10;
          if (p.x > width + 10) p.x = -10;
          if (p.y < -10) p.y = height + 10;
          if (p.y > height + 10) p.y = -10;
          const glow = .35 + (Math.sin(p.phase) + 1) * .25;
          ctx.beginPath();
          ctx.arc(p.x, p.y, p.r + Math.sin(p.phase) * .35, 0, Math.PI * 2);
          ctx.fillStyle = `rgba(94, 112, 235, ${glow})`;
          ctx.fill();
          for (let j = i + 1; j < particles.length; j++) {
            const q = particles[j],
              dx = p.x - q.x,
              dy = p.y - q.y;
            const distance = Math.hypot(dx, dy);
            if (distance < 115) {
              ctx.beginPath();
              ctx.moveTo(p.x, p.y);
              ctx.lineTo(q.x, q.y);
              ctx.strokeStyle = `rgba(112, 127, 225, ${(1 - distance / 115) * .16})`;
              ctx.lineWidth = .7;
              ctx.stroke();
            }
          }
          const dx = p.x - pointer.x,
            dy = p.y - pointer.y,
            distance = Math.hypot(dx, dy);
          if (distance < 130) {
            p.x += dx / Math.max(distance, 1) * .25;
            p.y += dy / Math.max(distance, 1) * .25;
          }
        });
        frame = requestAnimationFrame(draw);
      }
      window.addEventListener('resize', resize, {
        passive: true
      });
      window.addEventListener('pointermove', e => {
        pointer.x = e.clientX;
        pointer.y = e.clientY;
      }, {
        passive: true
      });
      document.addEventListener('visibilitychange', () => {
        if (document.hidden) cancelAnimationFrame(frame);
        else draw();
      });
      resize();
      draw();
    })();


    // Visible cursor glow + small spark trail on desktop
    if (window.matchMedia('(pointer: fine)').matches && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      const glow = document.createElement('div');
      glow.className = 'cursor-glow';
      document.body.appendChild(glow);
      let lastSpark = 0;
      window.addEventListener('pointermove', (event) => {
        glow.style.left = event.clientX + 'px';
        glow.style.top = event.clientY + 'px';
        const now = performance.now();
        if (now - lastSpark > 42) {
          lastSpark = now;
          const spark = document.createElement('span');
          spark.className = 'cursor-spark';
          spark.style.left = event.clientX + 'px';
          spark.style.top = event.clientY + 'px';
          spark.style.setProperty('--dx', ((Math.random() - .5) * 70) + 'px');
          spark.style.setProperty('--dy', ((Math.random() - .5) * 70) + 'px');
          document.body.appendChild(spark);
          spark.addEventListener('animationend', () => spark.remove(), {
            once: true
          });
        }
      }, {
        passive: true
      });
    }

    // More noticeable entrance timing for sections when they scroll into view
    document.querySelectorAll('section').forEach((section, index) => {
      section.style.transitionDuration = '.95s';
      section.style.transitionDelay = `${(index % 3) * 120}ms`;
    });