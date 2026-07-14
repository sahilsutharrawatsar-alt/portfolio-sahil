@props(['eyebrow', 'title', 'copy' => null, 'align' => 'left'])

<header class="section-heading section-heading--{{ $align }}" data-aos="fade-up">
    <p class="eyebrow"><span>{{ $eyebrow }}</span></p>
    <h2>{{ $title }}</h2>
    @if ($copy)
        <p class="section-copy">{{ $copy }}</p>
    @endif
</header>
