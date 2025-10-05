@props(["carousel" => [], "showHomeCarousel" => false])


@if($showHomeCarousel)
    <div id="bootstrap-touch-slider" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($carousel as $index => $item)
            <button 
                type="button" 
                data-bs-target="#bootstrap-touch-slider" 
                data-bs-slide-to="{{ $index }}" 
                class="{{ $index === 0 ? 'active' : '' }}" 
                aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                aria-label="Slide {{ $index + 1 }}">
            </button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach ($carousel as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" 
                style="background-image:url('{{ asset('storage/carousel/' . $item->image_path) }}');
                    background-size:cover;
                    background-position:center;">
                <div class="bs-slider-overlay"></div>
                <div class="container h-100 d-flex justify-content-{{ $item->text_align }} align-items-center">
                    <div class="slide-text text-{{ $item->text_align }} text-white">
                        <h1 data-animation="animated zoomInLeft" class="display-1">{{ $item->title }}</h1>
                        <p data-animation="animated fadeInLeft" class="fs-4">{{ $item->subtitle }}</p>
                        <a href="{{ $item->button_link }}" class="btn btn-danger" data-animation="animated fadeInLeft">{{ $item->button_text }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endif