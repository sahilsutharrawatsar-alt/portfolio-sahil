const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.site-header');
    const progress = document.querySelector('.scroll-progress');
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');

    const updateScrollUI = () => {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        const ratio = max > 0 ? window.scrollY / max : 0;
        header?.classList.toggle('is-scrolled', window.scrollY > 16);
        if (progress) progress.style.width = `${ratio * 100}%`;
    };

    updateScrollUI();
    window.addEventListener('scroll', updateScrollUI, { passive: true });

    menuToggle?.addEventListener('click', () => {
        const open = menuToggle.getAttribute('aria-expanded') !== 'true';
        menuToggle.setAttribute('aria-expanded', String(open));
        menuToggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        mobileMenu?.classList.toggle('is-open', open);
        document.body.classList.toggle('menu-open', open);
    });

    mobileMenu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
        menuToggle?.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.remove('is-open');
        document.body.classList.remove('menu-open');
    }));

    initTyping();
    initParticles();
    initCounters();
    initProjectTabs();
    initSkillMeters();
    initSpotlight();
    initProjectLighting();
    initActiveNav();
    initRipples();
    splitHeadings();
    initPointer();
    initMagnetic();
    initTilt();
    initHeroPortraitParallax();

    if (window.AOS) {
        AOS.init({ duration: 800, offset: 70, easing: 'ease-out-cubic', once: true, disable: reducedMotion });
    }

    if (!reducedMotion && window.gsap && window.ScrollTrigger) {
        gsap.registerPlugin(ScrollTrigger);
        gsap.from('.hero-reveal', { y: 34, opacity: 0, duration: 1, stagger: .11, ease: 'power3.out', delay: .12 });
        gsap.from('#hero-title .char', { yPercent: 115, opacity: 0, rotateX: -70, duration: .85, stagger: .015, ease: 'power4.out', delay: .35 });
        gsap.to('.hero-portrait', { yPercent: 8, ease: 'none', scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: 1 } });
        gsap.to('.timeline-line i', { height: '100%', ease: 'none', scrollTrigger: { trigger: '.timeline', start: 'top 70%', end: 'bottom 75%', scrub: true } });
        gsap.utils.toArray('[data-parallax]').forEach((item) => {
            const amount = Number(item.dataset.parallax) * 700;
            gsap.to(item, { y: amount, ease: 'none', scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true } });
        });
        gsap.utils.toArray('.project-card').forEach((card) => {
            gsap.from(card, { y: 80, opacity: 0, scale: .975, duration: 1, ease: 'power3.out', scrollTrigger: { trigger: card, start: 'top 84%', once: true } });
            gsap.to(card.querySelector('.project-preview'), { yPercent: -5, ease: 'none', scrollTrigger: { trigger: card, start: 'top bottom', end: 'bottom top', scrub: 1.2 } });
        });
        gsap.utils.toArray('.timeline-card').forEach((card) => {
            gsap.from(card, { x: 45, opacity: 0, duration: .9, ease: 'power3.out', scrollTrigger: { trigger: card, start: 'top 82%', once: true } });
        });
        gsap.utils.toArray('.section').forEach((section) => {
            gsap.from(section.querySelectorAll('.section-heading > *'), {
                y: 35,
                opacity: 0,
                stagger: .08,
                duration: .8,
                ease: 'power3.out',
                scrollTrigger: { trigger: section, start: 'top 78%', once: true },
            });
        });
        gsap.utils.toArray('[data-float-speed]').forEach((item) => {
            gsap.to(item, {
                y: Number(item.dataset.floatSpeed) * 1000,
                rotate: Number(item.dataset.floatSpeed) * 130,
                ease: 'none',
                scrollTrigger: { trigger: document.body, start: 'top top', end: 'bottom bottom', scrub: 1.5 },
            });
        });
    }
});

function initTyping() {
    const target = document.querySelector('#typed-role');
    if (!target) return;
    const roles = ['PHP Laravel Developer', 'Backend Engineer', 'REST API Developer', 'Full Stack Developer'];
    let role = 0;
    let character = roles[0].length;
    let deleting = true;

    const tick = () => {
        if (reducedMotion) {
            target.textContent = roles[0];
            return;
        }
        const value = roles[role];
        character += deleting ? -1 : 1;
        target.textContent = value.slice(0, character);
        let delay = deleting ? 45 : 75;
        if (character === 0) {
            deleting = false;
            role = (role + 1) % roles.length;
            delay = 350;
        } else if (character === value.length) {
            deleting = true;
            delay = 1600;
        }
        window.setTimeout(tick, delay);
    };
    window.setTimeout(tick, 1500);
}

function splitHeadings() {
    if (reducedMotion) return;
    document.querySelectorAll('.split-heading').forEach((heading) => {
        const walk = (node) => {
            Array.from(node.childNodes).forEach((child) => {
                if (child.nodeType === Node.TEXT_NODE) {
                    const fragment = document.createDocumentFragment();
                    [...child.textContent].forEach((character) => {
                        if (character === ' ') {
                            fragment.appendChild(document.createTextNode(' '));
                            return;
                        }
                        const span = document.createElement('span');
                        span.className = 'char';
                        span.textContent = character;
                        fragment.appendChild(span);
                    });
                    child.replaceWith(fragment);
                } else if (child.nodeType === Node.ELEMENT_NODE && child.tagName !== 'BR') {
                    walk(child);
                }
            });
        };
        walk(heading);
    });
}

function initProjectTabs() {
    document.querySelectorAll('[data-project-tabs]').forEach((tabs) => {
        const buttons = tabs.querySelectorAll('[role="tab"]');
        const panels = tabs.querySelectorAll('[role="tabpanel"]');
        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                buttons.forEach((item) => {
                    const active = item === button;
                    item.classList.toggle('is-active', active);
                    item.setAttribute('aria-selected', String(active));
                });
                panels.forEach((panel) => {
                    const active = panel.id === button.dataset.tab;
                    panel.hidden = !active;
                    panel.classList.toggle('is-active', active);
                });
            });
        });
    });
}

function initSkillMeters() {
    const meters = document.querySelectorAll('.skill-meter__track i');
    const observer = new IntersectionObserver((entries, instance) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.style.width = `${entry.target.dataset.level}%`;
            instance.unobserve(entry.target);
        });
    }, { threshold: .8 });
    meters.forEach((meter) => observer.observe(meter));
}

function initSpotlight() {
    if (window.matchMedia('(pointer: coarse)').matches) return;
    const spotlight = document.querySelector('.cursor-spotlight');
    if (!spotlight) return;
    window.addEventListener('mousemove', (event) => {
        spotlight.style.setProperty('--spotlight-x', `${event.clientX}px`);
        spotlight.style.setProperty('--spotlight-y', `${event.clientY}px`);
        spotlight.classList.add('is-visible');
    }, { passive: true });
    document.documentElement.addEventListener('mouseleave', () => spotlight.classList.remove('is-visible'));
}

function initProjectLighting() {
    if (window.matchMedia('(pointer: coarse)').matches) return;
    document.querySelectorAll('.project-card, .skill-card, .timeline-card, .services-grid article').forEach((card) => {
        card.addEventListener('mousemove', (event) => {
            const rect = card.getBoundingClientRect();
            card.style.setProperty('--mouse-x', `${event.clientX - rect.left}px`);
            card.style.setProperty('--mouse-y', `${event.clientY - rect.top}px`);
        });
    });
}

function initActiveNav() {
    const links = document.querySelectorAll('.desktop-nav a[href^="#"]');
    if (!links.length) return;
    const sections = Array.from(links)
        .map((link) => document.querySelector(link.getAttribute('href')))
        .filter(Boolean);

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            links.forEach((link) => {
                link.classList.toggle('is-active', link.getAttribute('href') === `#${entry.target.id}`);
            });
        });
    }, { rootMargin: '-35% 0px -55% 0px', threshold: 0 });

    sections.forEach((section) => observer.observe(section));
}

function initRipples() {
    document.querySelectorAll('.ripple-link, .button').forEach((item) => {
        item.addEventListener('pointermove', (event) => {
            const rect = item.getBoundingClientRect();
            item.style.setProperty('--ripple-x', `${event.clientX - rect.left}px`);
            item.style.setProperty('--ripple-y', `${event.clientY - rect.top}px`);
        }, { passive: true });
    });
}

function initCounters() {
    const counters = document.querySelectorAll('.counter');
    if (!counters.length) return;
    const observer = new IntersectionObserver((entries, instance) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const element = entry.target;
            const target = Number(element.dataset.target);
            const decimals = Number.isInteger(target) ? 0 : 1;
            if (reducedMotion) {
                element.textContent = target.toFixed(decimals);
            } else {
                const start = performance.now();
                const draw = (time) => {
                    const progress = Math.min((time - start) / 1400, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    element.textContent = (target * eased).toFixed(decimals);
                    if (progress < 1) requestAnimationFrame(draw);
                };
                requestAnimationFrame(draw);
            }
            instance.unobserve(element);
        });
    }, { threshold: .5 });
    counters.forEach((counter) => observer.observe(counter));
}

function initPointer() {
    if (window.matchMedia('(pointer: coarse)').matches) return;
    const dot = document.querySelector('.cursor-dot');
    const halo = document.querySelector('.cursor-halo');
    if (!dot || !halo) return;
    let mouseX = -50, mouseY = -50, haloX = -50, haloY = -50;
    window.addEventListener('mousemove', (event) => {
        mouseX = event.clientX;
        mouseY = event.clientY;
        dot.style.transform = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%)`;
    });
    const follow = () => {
        haloX += (mouseX - haloX) * .14;
        haloY += (mouseY - haloY) * .14;
        halo.style.transform = `translate(${haloX}px, ${haloY}px) translate(-50%, -50%)`;
        requestAnimationFrame(follow);
    };
    follow();
    document.querySelectorAll('a, button, .tilt-card').forEach((item) => {
        item.addEventListener('mouseenter', () => halo.classList.add('is-hovering'));
        item.addEventListener('mouseleave', () => halo.classList.remove('is-hovering'));
    });
}

function initMagnetic() {
    if (reducedMotion || window.matchMedia('(pointer: coarse)').matches) return;
    document.querySelectorAll('.magnetic').forEach((item) => {
        item.addEventListener('mousemove', (event) => {
            const rect = item.getBoundingClientRect();
            const x = (event.clientX - rect.left - rect.width / 2) * .18;
            const y = (event.clientY - rect.top - rect.height / 2) * .18;
            item.style.transform = `translate(${x}px, ${y}px)`;
        });
        item.addEventListener('mouseleave', () => { item.style.transform = ''; });
    });
}

function initTilt() {
    if (reducedMotion || window.matchMedia('(pointer: coarse)').matches) return;
    document.querySelectorAll('.tilt-card').forEach((card) => {
        card.addEventListener('mousemove', (event) => {
            const rect = card.getBoundingClientRect();
            const rotateY = ((event.clientX - rect.left) / rect.width - .5) * 3.5;
            const rotateX = ((event.clientY - rect.top) / rect.height - .5) * -3.5;
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
}

function initHeroPortraitParallax() {
    if (reducedMotion || window.matchMedia('(pointer: coarse)').matches) return;
    const portrait = document.querySelector('[data-portrait-parallax]');
    if (!portrait) return;

    portrait.addEventListener('mousemove', (event) => {
        const rect = portrait.getBoundingClientRect();
        const x = (event.clientX - rect.left) / rect.width - .5;
        const y = (event.clientY - rect.top) / rect.height - .5;
        portrait.style.setProperty('--portrait-x', `${x * 22}px`);
        portrait.style.setProperty('--portrait-y', `${y * 18}px`);
        portrait.style.setProperty('--portrait-tilt-x', `${y * -3.5}deg`);
        portrait.style.setProperty('--portrait-tilt-y', `${x * 4.5}deg`);
    }, { passive: true });

    portrait.addEventListener('mouseleave', () => {
        portrait.style.setProperty('--portrait-x', '0px');
        portrait.style.setProperty('--portrait-y', '0px');
        portrait.style.setProperty('--portrait-tilt-x', '0deg');
        portrait.style.setProperty('--portrait-tilt-y', '0deg');
    });
}

function initParticles() {
    const canvas = document.querySelector('#particle-canvas');
    if (!canvas || reducedMotion) return;
    const context = canvas.getContext('2d');
    let width = 0, height = 0, particles = [];
    const pointer = { x: -1000, y: -1000 };

    const resize = () => {
        const ratio = Math.min(window.devicePixelRatio || 1, 2);
        width = canvas.clientWidth;
        height = canvas.clientHeight;
        canvas.width = width * ratio;
        canvas.height = height * ratio;
        context.setTransform(ratio, 0, 0, ratio, 0, 0);
        const count = Math.min(75, Math.floor(width / 18));
        particles = Array.from({ length: count }, () => ({
            x: Math.random() * width,
            y: Math.random() * height,
            vx: (Math.random() - .5) * .16,
            vy: (Math.random() - .5) * .16,
            size: Math.random() * 1.25 + .35,
        }));
    };

    const draw = () => {
        context.clearRect(0, 0, width, height);
        particles.forEach((particle, index) => {
            particle.x += particle.vx;
            particle.y += particle.vy;
            if (particle.x < 0 || particle.x > width) particle.vx *= -1;
            if (particle.y < 0 || particle.y > height) particle.vy *= -1;
            const dx = pointer.x - particle.x;
            const dy = pointer.y - particle.y;
            const distance = Math.hypot(dx, dy);
            if (distance < 100) {
                particle.x -= dx * .0015;
                particle.y -= dy * .0015;
            }
            context.beginPath();
            context.fillStyle = index % 5 === 0 ? 'rgba(139,92,246,.7)' : 'rgba(0,229,255,.55)';
            context.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
            context.fill();
            particles.slice(index + 1).forEach((other) => {
                const lineDistance = Math.hypot(particle.x - other.x, particle.y - other.y);
                if (lineDistance < 85) {
                    context.beginPath();
                    context.strokeStyle = `rgba(0,229,255,${(1 - lineDistance / 85) * .065})`;
                    context.moveTo(particle.x, particle.y);
                    context.lineTo(other.x, other.y);
                    context.stroke();
                }
            });
        });
        requestAnimationFrame(draw);
    };

    canvas.addEventListener('mousemove', (event) => {
        const rect = canvas.getBoundingClientRect();
        pointer.x = event.clientX - rect.left;
        pointer.y = event.clientY - rect.top;
    });
    canvas.addEventListener('mouseleave', () => { pointer.x = -1000; pointer.y = -1000; });
    window.addEventListener('resize', resize);
    resize();
    draw();
}
