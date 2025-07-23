@php 
    $animationClass = $direction === 'right' ? 'wptb-slide-to-right' : 'wptb-slide-to-left';
@endphp

<div class="wptb-marquee" id="{{ $uniqueId }}">
    <div class="wptb-text-marquee1 {{ $animationClass }}">
        <div class="wptb-item--container">
            <div class="wptb-item--inner">
                @foreach($headings as $heading)
                    <h4 class="wptb-item--text" style="color: {{ $heading->color }}; background: {{ $heading->background }};">
                        <span class="wptb-text-backdrop">{{ $heading->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                            <path d="M25 15.3958L20 0.083252L15 15.3958L0 20.4999L15 25.6041L20 40.9166L25 25.6041L40 20.4999L25 15.3958ZM20 23.9707C18.2 23.9707 16.6 22.5416 16.6 20.4999C16.6 18.6624 18 17.0291 20 17.0291C21.8 17.0291 23.4 18.4583 23.4 20.4999C23.4 22.3374 21.8 23.9707 20 23.9707Z" fill="currentColor" fill-opacity="0.6"/>
                        </svg>
                    </h4>
                @endforeach
            </div>
            
            {{-- Duplicate for seamless looping --}}
            <div class="wptb-item--inner">
                @foreach($headings as $heading)
                    <h4 class="wptb-item--text" style="color: {{ $heading->color }}; background: {{ $heading->background }};">
                        <span class="wptb-text-backdrop">{{ $heading->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                            <path d="M25 15.3958L20 0.083252L15 15.3958L0 20.4999L15 25.6041L20 40.9166L25 25.6041L40 20.4999L25 15.3958ZM20 23.9707C18.2 23.9707 16.6 22.5416 16.6 20.4999C16.6 18.6624 18 17.0291 20 17.0291C21.8 17.0291 23.4 18.4583 23.4 20.4999C23.4 22.3374 21.8 23.9707 20 23.9707Z" fill="currentColor" fill-opacity="0.6"/>
                        </svg>
                    </h4>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .wptb-slide-to-right {
        animation: slideRight var(--marquee-speed) linear infinite;
    }
    .wptb-slide-to-left {
        animation: slideLeft var(--marquee-speed) linear infinite;
    }
    @keyframes slideRight {
        from { transform: translateX(0); }
        to { transform: translateX(-50%); }
    }
    @keyframes slideLeft {
        from { transform: translateX(-50%); }
        to { transform: translateX(0); }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const marquee = document.getElementById('{{ $uniqueId }}');
        if (marquee) {
            marquee.querySelector('.wptb-text-marquee1').style.setProperty(
                '--marquee-speed', 
                '{{ $speed }}'
            );
        }
    });
</script>
@endpush