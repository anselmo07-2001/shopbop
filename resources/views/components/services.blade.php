@props(["services" => []])

<div class="service bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Service Item -->
            @if(!empty($services) && count($services) > 0)
                @foreach ($services as $service)
                    <div class="col-6 col-md-4">
                        <div class="item text-center">
                            <div class="photo mb-3">
                                <img src="{{ asset('storage/services/' . $service->photo) }}" alt="{{ $service->title }}" width="150" class="img-fluid">
                            </div>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->content }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p>No services available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</div>