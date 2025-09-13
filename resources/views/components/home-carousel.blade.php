@props(["carousel" => []])


<div id="bootstrap-touch-slider" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>


    <div class="carousel-inner">
        <!-- Slide 1 -->
        @foreach ($carousel as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" 
                style="background-image:url('{{ asset('storage/carousel/' . $item->image_path ) }}'); 
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

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

   
</div>