@props(['skill'])

<article class="skill-card tilt-card" data-aos="fade-up">
    <div class="skill-card__top">
        <span>{{ $skill['index'] }}</span>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
    </div>
    <h3>{{ $skill['title'] }}</h3>
    <p class="skill-focus">{{ $skill['focus'] }}</p>
    <div class="skill-meter" aria-label="{{ $skill['title'] }} is part of Sahil's professional skill set">
        <div class="skill-meter__label"><span>Professional use</span><strong>{{ $skill['level_label'] }}</strong></div>
        <div class="skill-meter__track" aria-hidden="true"><i data-level="{{ $skill['level'] }}"></i></div>
    </div>
    <div class="skill-tags">
        @foreach ($skill['items'] as $item)
            <span>{{ $item }}</span>
        @endforeach
    </div>
</article>
