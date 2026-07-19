<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#050816">
    <title>@yield('title', 'Sahil Suthar — Laravel Developer')</title>
    <meta name="description" content="@yield('description', 'Laravel and PHP Developer with 2.6+ years of experience building production-grade web applications, APIs, integrations, and database-driven systems.')">
    <meta name="author" content="Sahil Suthar">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Sahil Suthar — Laravel Developer">
    <meta property="og:description" content="Laravel and PHP Developer with 2.6+ years of professional experience.">
    <meta property="og:image" content="{{ asset('assets/images/og-card.svg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Sahil Suthar — Laravel Developer">
    <meta name="twitter:description" content="Scalable Laravel applications, REST APIs, integrations, and optimized database systems.">
    <meta name="twitter:image" content="{{ asset('assets/images/og-card.svg') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700;800;900&family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/portfolio.css') }}">
    @endif
    @stack('head')
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <div class="cursor-dot" aria-hidden="true"></div>
    <div class="cursor-halo" aria-hidden="true"></div>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @if (! file_exists(public_path('build/manifest.json')) && ! file_exists(public_path('hot')))
        <script src="{{ asset('assets/js/portfolio.js') }}" defer></script>
    @endif
</body>
</html>
