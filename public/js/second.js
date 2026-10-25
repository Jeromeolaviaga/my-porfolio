(() => {
      const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      const hero = document.querySelector('.hero');
      const title = document.querySelector('.hero h1');
      const profile = document.querySelector('.profile');
      if (hero && title && !hero.querySelector('.motion-status')) {
        const status = document.createElement('div');
        status.className = 'motion-status';
        status.innerHTML = '<i></i><span>OPEN TO OPPORTUNITIES</span>';
        title.parentNode.insertBefore(status, title);
      }
      // Static subtitle: keep the title fixed and remove the typewriter effect.
      if (hero) {
        let subtitle = hero.querySelector('.motion-typed, .motion-static');
        if (!subtitle) {
          subtitle = document.createElement('p');
          hero.querySelector('.intro')?.before(subtitle);
        }
        subtitle.className = 'motion-static';
        subtitle.textContent = 'Building useful digital experiences';
        subtitle.setAttribute('aria-label', 'Computer Science Graduate');
        subtitle.style.cssText = 'display:block;margin:0 0 14px;font-weight:650;color:var(--neon-a,#7c5cff);font-size:clamp(14px,1.7vw,18px);border:0;padding:0;min-width:0;white-space:normal;animation:none;';
      }
      if (profile && !profile.querySelector('.profile-orbit-dot')) {
        const dot = document.createElement('span');
        dot.className = 'profile-orbit-dot';
        profile.appendChild(dot);
        const updateRadius = () => dot.style.setProperty('--orbit-radius', `${Math.max(profile.offsetWidth,profile.offsetHeight)/2 + 24}px`);
        updateRadius();
        window.addEventListener('resize', updateRadius, {
          passive: true
        });
      }
      if (!reduceMotion) {
        // Reveal page sections with a cinematic lift as they enter the viewport.
        const revealItems = [...document.querySelectorAll('.grid > section, .contact-section, .software-heading, .software-item, footer')];
        const observer = new IntersectionObserver(entries => entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('cinema-in');
            observer.unobserve(entry.target);
          }
        }), {
          threshold: .12,
          rootMargin: '0px 0px -35px 0px'
        });
        revealItems.forEach((el, i) => {
          el.classList.add('cinema-reveal');
          el.dataset.cinemaDelay = String(i % 4);
          observer.observe(el);
        });
        // Desktop cards subtly tilt toward the pointer.
        if (window.matchMedia('(pointer:fine)').matches) {
          document.querySelectorAll('.software-item,.item,.contact-item').forEach(card => {
            card.addEventListener('pointermove', e => {
              const r = card.getBoundingClientRect();
              const x = (e.clientX - r.left) / r.width,
                y = (e.clientY - r.top) / r.height;
              card.style.transform = `perspective(850px) rotateX(${(0.5-y)*5}deg) rotateY(${(x-0.5)*6}deg) translateY(-4px)`;
              card.style.setProperty('--shine-x', `${x*100}%`);
            });
            card.addEventListener('pointerleave', () => {
              card.style.transform = '';
            });
          });
          // Light, colorful click burst (kept short to avoid clutter).
          let lastBurst = 0;
          document.addEventListener('pointerdown', e => {
            const now = performance.now();
            if (now - lastBurst < 110) return;
            lastBurst = now;
            const ring = document.createElement('span');
            ring.className = 'click-burst';
            ring.style.left = e.clientX + 'px';
            ring.style.top = e.clientY + 'px';
            document.body.appendChild(ring);
            ring.addEventListener('animationend', () => ring.remove(), {
              once: true
            });
            for (let i = 0; i < 7; i++) {
              const p = document.createElement('span');
              p.className = 'click-particle';
              p.style.left = e.clientX + 'px';
              p.style.top = e.clientY + 'px';
              const a = (Math.PI * 2 * i / 7) + Math.random() * .25;
              const d = 24 + Math.random() * 42;
              p.style.setProperty('--bx', `${Math.cos(a)*d}px`);
              p.style.setProperty('--by', `${Math.sin(a)*d}px`);
              document.body.appendChild(p);
              p.addEventListener('animationend', () => p.remove(), {
                once: true
              });
            }
          }, {
            passive: true
          });
        }
      } else {
        document.querySelectorAll('.grid > section, .contact-section, .software-heading, .software-item, footer').forEach(el => el.classList.add('cinema-in'));
      }
    })();