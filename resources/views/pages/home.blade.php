@extends('layouts.app')

@section('title', 'Sahil Suthar — Laravel Developer')

@section('content')
<div class="page-noise" aria-hidden="true"></div>
<div class="scroll-progress" aria-hidden="true"></div>
<div class="cursor-spotlight" aria-hidden="true"></div>
<div class="ambient-background" aria-hidden="true">
    <div class="aurora aurora--cyan"></div>
    <div class="aurora aurora--violet"></div>
    <div class="ambient-grid"></div>
    <span class="floating-tech floating-tech--laravel" data-float-speed="0.035">Laravel</span>
    <span class="floating-tech floating-tech--php" data-float-speed="-0.025">PHP</span>
    <span class="floating-tech floating-tech--mysql" data-float-speed="0.018">MySQL</span>
    <span class="floating-tech floating-tech--api" data-float-speed="-0.032">API</span>
</div>

<header class="site-header" id="top">
    <div class="container nav-wrap">
        <a class="brand magnetic" href="#top" aria-label="Sahil Suthar, home">
            <span class="brand-mark">S</span>
            <span>Sahil Suthar<small>Laravel Developer</small></span>
        </a>
        <nav class="desktop-nav" aria-label="Primary navigation">
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#experience">Experience</a>
            <a href="#projects">Projects</a>
        </nav>
        <a class="nav-cta magnetic" href="#contact"><span>Let’s talk</span><i></i></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
            <span></span><span></span>
        </button>
    </div>
    <nav class="mobile-menu" id="mobile-menu" aria-label="Mobile navigation">
        <a href="#about">About</a><a href="#skills">Skills</a><a href="#experience">Experience</a>
        <a href="#projects">Projects</a><a href="#contact">Contact</a>
    </nav>
</header>

<main id="main">
    <section class="hero" aria-labelledby="hero-title">
        <canvas id="particle-canvas" aria-hidden="true"></canvas>
        <div class="hero-orb hero-orb--one" data-parallax="0.08"></div>
        <div class="hero-orb hero-orb--two" data-parallax="-0.05"></div>
        <div class="container hero-grid">
            <div class="hero-copy">
                <div class="availability hero-reveal"><i></i> PHP Laravel Developer · 2.6+ years</div>
                <p class="hero-kicker hero-reveal">Hi, I’m {{ $person['name'] }}</p>
                <h1 id="hero-title" class="hero-reveal split-heading">
                    I turn complex<br>
                    requirements into<br>
                    <span>reliable Laravel solutions.</span>
                </h1>
                <p class="hero-intro hero-reveal">{{ $person['summary'] }}</p>
                <div class="hero-specialties hero-reveal" aria-label="Primary specialities">
                    <span>Backend Development</span>
                    <span>REST APIs</span>
                    <span>MySQL Optimization</span>
                </div>
                <div class="hero-actions hero-reveal">
                    <a class="button button--primary magnetic" href="{{ asset('assets/Sahil-Suthar-Resume.pdf') }}" download>
                        Download résumé
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v13m0 0 5-5m-5 5-5-5M5 21h14"/></svg>
                    </a>
                    <a class="button button--ghost magnetic" href="#projects">Explore projects</a>
                </div>
            </div>
            <div class="hero-console hero-reveal" data-parallax="0.035">
                <div class="console-glow"></div>
                <div class="profile-signature-card">
                    <div class="profile-monogram"><span>SS</span><i></i></div>
                    <div>
                        <strong>Sahil Suthar</strong>
                        <span>PHP Laravel Developer</span>
                    </div>
                    <small>2.6+ YRS</small>
                </div>
                <div class="console-window">
                    <div class="console-top">
                        <div><i></i><i></i><i></i></div>
                        <span>sahil.php</span>
                        <b>● PROFILE</b>
                    </div>
                    <div class="console-code" aria-label="Developer profile code">
                        <p><em>01</em><span class="code-violet">class</span> <span class="code-cyan">Developer</span> {</p>
                        <p><em>02</em>&nbsp;&nbsp;<span class="code-muted">public</span> string <span class="code-green">$name</span> =</p>
                        <p><em>03</em>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-gold">'Sahil Suthar'</span>;</p>
                        <p><em>04</em></p>
                        <p><em>05</em>&nbsp;&nbsp;<span class="code-muted">public</span> array <span class="code-green">$focus</span> = [</p>
                        <p><em>06</em>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-gold">'Laravel'</span>, <span class="code-gold">'REST APIs'</span>,</p>
                        <p><em>07</em>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-gold">'Business workflows'</span></p>
                        <p><em>08</em>&nbsp;&nbsp;];</p>
                        <p><em>09</em></p>
                        <p><em>10</em>&nbsp;&nbsp;<span class="code-violet">return</span> <span class="code-cyan">$this</span>->build();</p>
                        <p><em>11</em>}</p>
                    </div>
                    <div class="console-status">
                        <span><i></i> Experience in production</span>
                        <strong>Oct 2023 — May 2026</strong>
                    </div>
                </div>
                <div class="floating-pill floating-pill--api">REST API<small>Connected</small></div>
                <div class="floating-pill floating-pill--db">MySQL<small>Optimized</small></div>
            </div>
        </div>
        <div class="hero-bottom container">
            <span>Explore my journey</span>
            <div class="scroll-line"><i></i></div>
            <p class="typing-wrap">My focus: <strong id="typed-role">Laravel Development</strong><i></i></p>
        </div>
    </section>

    <section class="marquee" aria-label="Technology highlights">
        <div class="marquee-track">
            @foreach (['Laravel', 'PHP', 'REST APIs', 'MySQL', 'Sanctum', 'RBAC', 'AJAX', 'Git', 'Laravel', 'PHP', 'REST APIs', 'MySQL', 'Sanctum', 'RBAC', 'AJAX', 'Git'] as $item)
                <span>{{ $item }} <i>✦</i></span>
            @endforeach
        </div>
    </section>

    <section class="section about" id="about">
        <div class="container">
            <x-section-heading eyebrow="01 / About Me" title="A Laravel developer shaped by real projects, production issues, and business requirements." copy="My experience is rooted in building and maintaining applications that people and teams depend on—not isolated demos." />
            <div class="about-layout">
                <div class="about-statement" data-aos="fade-right">
                    <p class="about-lead">I’m Sahil Suthar, a PHP Laravel Developer with 2.6+ years of professional experience across government portals, enterprise applications, and booking workflows.</p>
                    <p>I work primarily with Laravel, PHP, MySQL, REST APIs, payment gateways, and third-party integrations. My day-to-day work includes backend development, admin panel development, database design, debugging, maintenance, and performance optimization.</p>
                    <p>I enjoy understanding complicated requirements, breaking them into clear modules, and writing clean code that remains practical to maintain after release.</p>
                    <div class="about-principles">
                        <span><i>01</i> Understand the workflow</span>
                        <span><i>02</i> Build for maintainability</span>
                        <span><i>03</i> Optimize where it matters</span>
                    </div>
                    <a href="#experience">Follow my professional journey <span>↘</span></a>
                </div>
                <div class="stats-grid">
                    @foreach ($stats as $stat)
                        <article data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                            <strong><span class="counter" data-target="{{ $stat['value'] }}">0</span>{{ $stat['suffix'] }}</strong>
                            <p>{{ $stat['label'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section skills" id="skills">
        <div class="container">
            <x-section-heading eyebrow="02 / My Expertise" title="The tools I use to take Laravel work from database design to deployment." copy="My strongest work is on the backend, supported by the frontend, database, integration, and delivery skills needed to complete production applications." />
            <div class="skills-grid">
                @foreach ($skills as $skill)
                    <x-skill-card :skill="$skill" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="section experience" id="experience">
        <div class="container">
            <x-section-heading eyebrow="03 / Professional Journey" title="From Laravel trainee to owning production backend work." copy="My experience has grown through hands-on development, integrations, debugging, optimization, deployment, and ongoing responsibility for live applications." />
            <div class="timeline">
                <div class="timeline-line"><i></i></div>
                @foreach ($experience as $job)
                    <article class="timeline-item" data-aos="fade-up">
                        <div class="timeline-dot"></div>
                        <div class="timeline-meta">
                            <span>{{ $job['period'] }}</span>
                            <b>{{ $loop->first ? 'Professional role' : 'Foundation role' }}</b>
                        </div>
                        <div class="timeline-card">
                            <div class="timeline-title">
                                <div>
                                    <h3>{{ $job['role'] }}</h3>
                                    <p>{{ $job['company'] }} · {{ $job['location'] }}</p>
                                </div>
                                <span>0{{ $loop->iteration }}</span>
                            </div>
                            <ul>
                                @foreach ($job['responsibilities'] as $responsibility)
                                    <li>{{ $responsibility }}</li>
                                @endforeach
                            </ul>
                            <div class="tech-list">
                                @foreach ($job['stack'] as $technology)<span>{{ $technology }}</span>@endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section projects" id="projects">
        <div class="container">
            <x-section-heading eyebrow="04 / Projects I Worked On" title="Real applications where backend decisions directly shaped the user experience." copy="Each project reflects the kind of work I handle: multi-role workflows, data-heavy modules, integrations, booking logic, and reliable Laravel backends." />
            <div class="projects-list">
                @foreach ($projects as $project)
                    <x-project-card :project="$project" :index="$loop->index" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="section services" id="services">
        <div class="container">
            <x-section-heading eyebrow="05 / What I Do" title="The Laravel responsibilities I’m trusted to handle." copy="I contribute across the full backend lifecycle—from understanding requirements and structuring data to fixing production issues." />
            <div class="services-grid">
                @foreach ($services as $service)
                    <article data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 80 }}">
                        <span>{{ $service['number'] }}</span>
                        <h3>{{ $service['title'] }}</h3>
                        <p>{{ $service['copy'] }}</p>
                        <i>↗</i>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section credentials" id="education">
        <div class="container credentials-grid">
            <div>
                <x-section-heading eyebrow="06 / Education" title="Formal learning alongside professional development." />
            </div>
            <div class="education-list">
                @foreach ($education as $item)
                    <article data-aos="fade-up">
                        <span>0{{ $loop->iteration }}</span>
                        <div><h3>{{ $item['course'] }}</h3><p>{{ $item['school'] }} · {{ $item['location'] }}</p></div>
                        <time>{{ $item['period'] }}</time>
                    </article>
                @endforeach
            </div>
        </div>
        <div class="container career-strip" data-aos="zoom-in">
            <div><strong>10+</strong><span>Production applications delivered</span></div>
            <div><strong>Government + Enterprise</strong><span>Professional client environments</span></div>
            <div><strong>Full lifecycle</strong><span>Development to production support</span></div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="contact-orb" aria-hidden="true"></div>
        <div class="container contact-inner">
            <p class="eyebrow"><span>07 / Contact</span></p>
            <h2>Looking for a Laravel developer<br><span>who understands the complete workflow?</span></h2>
            <p>I’m open to discussing Laravel development, backend systems, APIs, integrations, maintenance, and roles where dependable delivery matters.</p>
            <div class="contact-actions">
                <a class="button button--primary magnetic" href="mailto:{{ $person['email'] }}?subject=Laravel%20project%20enquiry">Email me <span>↗</span></a>
                <a class="button button--ghost magnetic" href="tel:{{ $person['phone_href'] }}">Call {{ $person['phone'] }}</a>
            </div>
            <div class="contact-details">
                <a href="mailto:{{ $person['email'] }}">{{ $person['email'] }}</a>
                <span>{{ $person['location'] }}</span>
            </div>
        </div>
    </section>
</main>

<footer class="site-footer">
    <div class="container">
        <a class="brand" href="#top"><span class="brand-mark">S</span><span>Sahil Suthar<small>Laravel Developer</small></span></a>
        <p>A personal record of my Laravel journey, work, and technical growth.</p>
        <div><span>© {{ date('Y') }} Sahil Suthar</span><a href="#top">Back to top ↑</a></div>
    </div>
</footer>

<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Person',
    'name' => $person['name'],
    'jobTitle' => $person['role'],
    'email' => 'mailto:'.$person['email'],
    'telephone' => $person['phone'],
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Nohar', 'addressRegion' => 'Rajasthan', 'addressCountry' => 'IN'],
    'url' => url('/'),
    'knowsAbout' => ['Laravel', 'PHP', 'REST APIs', 'MySQL', 'CodeIgniter', 'JavaScript', 'Payment Gateway Integration'],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endsection
