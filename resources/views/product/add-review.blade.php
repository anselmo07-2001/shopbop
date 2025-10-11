@props(["reviewed" => null, "product_id" => null])

<div class="container my-5"> 
    <div class="mt-5">
        <h5>{{ $reviewed ? "Update your review" : "Add a Review" }}</h5>
        <form method="POST" action="{{ $reviewed ? route('ratings.update', $reviewed->id ) : route('ratings.store')  }}">
            @csrf
            @if ($reviewed)
                @method("PUT")
                <input type="hidden" name="id" value="{{ $reviewed->id }}">
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your name" 
                       value="{{ $reviewed ? $reviewed->customer->full_name : auth("customer")->user()->full_name  }}" readonly >
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Write your review"
                    >{{ old("comment", $reviewed?->comment) }}</textarea>
                <x-error-input-message field="comment"/>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select id="rating" name="rating" class="form-select" aria-label="Rating select">
                    <option {{ $reviewed ?? "selected" }}>Choose a rating</option>
                    <option value="5" {{ old("rating", $reviewed?->rating ?? "" ) == 5 ? "selected" : "" }} >5 - Excellent</option>
                    <option value="4" {{ old("rating", $reviewed?->rating ?? "" ) == 4 ? "selected" : "" }} >4 - Good</option>
                    <option value="3" {{ old("rating", $reviewed?->rating ?? "" ) == 3 ? "selected" : "" }} >3 - Average</option>
                    <option value="2" {{ old("rating", $reviewed?->rating ?? "" ) == 2 ? "selected" : "" }} >2 - Poor</option>
                    <option value="1" {{ old("rating", $reviewed?->rating ?? "" ) == 1 ? "selected" : "" }} >1 - Terrible</option>
                </select>
                <x-error-input-message field="rating"/>
            </div>

            <!-- Product Id -->
            <input type="hidden" name="productId" value="{{ $product_id }}"/>

            <button type="submit" class="btn btn-primary">{{ $reviewed ? "Update Review" : "Submit Review" }}</button>
        </form>
    </div>
</div>