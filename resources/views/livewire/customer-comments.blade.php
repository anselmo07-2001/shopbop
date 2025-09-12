<div wire:key="reviewList" id="reviewList"> 
    
    @foreach ($comments as $comment)
        <div class="d-flex mb-4">
            <img src="assets/uploads/avatar1.jpg" class="rounded-circle me-3" style="width:60px;height:60px;" alt="User Avatar">
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-center mb-1">
                <h6 class="mb-0">{{ $comment->customer->full_name }}</h6>
                <small class="text-muted">{{ $comment->updated_at->format('M d, Y') }}</small>
                </div>
                <div class="mb-2">
                <span class="text-warning">
                    @php
                        $full_star = $comment->rating;
                        $empty_star = 5 - $full_star;
                    @endphp

                    @for ($i = 0; $i < $full_star; $i++)
                        &#9733;
                    @endfor

                    @for ($i = 0; $i < $empty_star; $i++)
                        &#9734;
                    @endfor
                </span>
                </div>
                <p>{{ $comment->comment }}</p>
            </div>
        </div>                     
    @endforeach
           

    <!-- Pagination -->
    <nav aria-label="Page navigation" class="mt-4">
        {{ $comments->links('vendor.pagination.livewire-bootstrap') }}
    </nav>
</div>
