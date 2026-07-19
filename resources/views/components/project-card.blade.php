@props(['project', 'index'])

<article class="project-card project-card--{{ $project['tone'] }} tilt-card" style="--project-position: {{ $index }}">
    <div class="project-visual" aria-hidden="true">
        <div class="project-visual__spotlight"></div>
        <div class="project-visual__bar">
            <i></i><i></i><i></i>
            <span>{{ parse_url($project['url'], PHP_URL_HOST) }}</span>
        </div>
        <div class="project-visual__canvas project-preview">
            <div class="mock-sidebar"></div>
            <div class="mock-content">
                <div class="mock-title"></div>
                <div class="mock-row"><span></span><span></span><span></span></div>
                <div class="mock-panel"><i></i><i></i><i></i><i></i></div>
            </div>
        </div>
        <div class="project-metrics">
            @foreach ($project['metrics'] as $metric)
                <div><strong>{{ $metric['value'] }}</strong><span>{{ $metric['label'] }}</span></div>
            @endforeach
        </div>
        <span class="project-index">0{{ $index + 1 }}</span>
    </div>
    <div class="project-body">
        <p class="project-type">{{ $project['type'] }}</p>
        <h3>{{ $project['name'] }}</h3>
        <p>{{ $project['description'] }}</p>
        <div class="project-tabs" data-project-tabs>
            <div class="project-tablist" role="tablist" aria-label="{{ $project['name'] }} details">
                <button class="is-active" type="button" role="tab" aria-selected="true" data-tab="challenge-{{ $index }}">Challenge</button>
                <button type="button" role="tab" aria-selected="false" data-tab="solution-{{ $index }}">Solution</button>
                <button type="button" role="tab" aria-selected="false" data-tab="features-{{ $index }}">Features</button>
            </div>
            <div class="project-tabpanels">
                <div class="project-tabpanel is-active" id="challenge-{{ $index }}" role="tabpanel"><p>{{ $project['challenge'] }}</p></div>
                <div class="project-tabpanel" id="solution-{{ $index }}" role="tabpanel" hidden><p>{{ $project['solution'] }}</p></div>
                <div class="project-tabpanel" id="features-{{ $index }}" role="tabpanel" hidden>
                    <ul class="feature-list" aria-label="Project features">
                        @foreach ($project['features'] as $feature)<li>{{ $feature }}</li>@endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="project-footer">
            <div class="tech-list">
                @foreach ($project['stack'] as $technology)
                    <span>{{ $technology }}</span>
                @endforeach
            </div>
            <a class="project-link" href="{{ $project['url'] }}" target="_blank" rel="noreferrer" aria-label="Visit {{ $project['name'] }}">
                Live Demo
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
            </a>
        </div>
    </div>
</article>
