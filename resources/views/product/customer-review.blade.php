@props(["ratings" => null, "product" => null])



<div class="container my-5">
    <div class="mb-4">
        <h4>Customer Reviews</h4>
        <div class="d-flex align-items-center mb-2">
        <h2 class="me-3 mb-0">{{ number_format($ratings->avg('rating'), 1, '.', '') }}</h2>
        <div>
            @php
                $avg_rating = round($ratings->avg('rating'), 1);
                $full_star = floor($avg_rating);
                $empty_star = 5 - $full_star;
            @endphp


            <div class="text-warning">
                @for ($i = 0; $i < $full_star; $i++)
                    &#9733;
                @endfor

                @for ($i = 0; $i < $empty_star; $i++)
                    &#9734;
                @endfor

            </div>
            <small class="text-muted">based on {{ count($ratings) }} reviews</small>
        </div>
        </div>

        <!-- Rating Breakdown -->



        <div class="mb-3">
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">5 stars</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ count($ratings) > 0 ? ($ratings->where('rating', 5)->count() / count($ratings) * 100) : 0 }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 5)->count() }}</span>
        </div>
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">4 stars</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ count($ratings) > 0 ? ($ratings->where('rating', 4)->count() / count($ratings) * 100) : 0 }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 4)->count() }}</span>
        </div>
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">3 stars</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ count($ratings) > 0 ? ($ratings->where('rating', 3)->count() / count($ratings) * 100) : 0 }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 3)->count() }}</span>
        </div>
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">2 stars</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ count($ratings) > 0 ? ($ratings->where('rating', 2)->count() / count($ratings) * 100) : 0 }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 2)->count() }}</span>
        </div>
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">1 star</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ count($ratings) > 0 ? ($ratings->where('rating', 1)->count() / count($ratings) * 100) : 0 }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 1)->count() }}</span>
        </div>
        </div>
    </div>

    <livewire:customer-comments :productId="$product->id"/>
        
</div>

