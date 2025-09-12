@props(["ratings" => null])

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
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ ( $ratings->where("rating", 5)->count() / count($ratings) * 100 ) }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 5)->count() }}</span>
        </div>
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">4 stars</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ ( $ratings->where("rating", 4)->count() / count($ratings) * 100 ) }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 4)->count() }}</span>
        </div>
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">3 stars</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ ( $ratings->where("rating", 3)->count() / count($ratings) * 100 ) }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 3)->count() }}</span>
        </div>
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">2 stars</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ ( $ratings->where("rating", 2)->count() / count($ratings) * 100 ) }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 2)->count() }}</span>
        </div>
        <div class="d-flex align-items-center mb-1">
            <span class="me-2">1 star</span>
            <div class="progress flex-grow-1" style="height:8px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ ( $ratings->where("rating", 1)->count() / count($ratings) * 100 ) }}%;"></div>
            </div>
            <span class="ms-2">{{ $ratings->where("rating", 1)->count() }}</span>
        </div>
        </div>
    </div>


    <div id="reviewList">
            <!-- Single Review -->

           
            @foreach ($ratings as $rating)
                <div class="d-flex mb-4">
                    <img src="assets/uploads/avatar1.jpg" class="rounded-circle me-3" style="width:60px;height:60px;" alt="User Avatar">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                        <h6 class="mb-0">{{ $rating->customer->full_name }}</h6>
                        <small class="text-muted">{{ $rating->updated_at->format('M d, Y') }}</small>
                        </div>
                        <div class="mb-2">
                        <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                        </div>
                        <p>{{ $rating->comment }}</p>
                    </div>
                </div>              
            @endforeach

            <!-- Pagination -->
            <nav aria-label="Review pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active">
                    <a class="page-link bg-light text-dark border-dark" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
    </div>
</div>

