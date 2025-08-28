<div class="container my-5"> 
    <div class="mt-5">
        <h5>Add a Review</h5>
        <form>
            <div class="mb-3">
                <label for="reviewName" class="form-label">Name</label>
                <input type="text" class="form-control" id="reviewName" placeholder="Your name">
            </div>
            <div class="mb-3">
                <label for="reviewText" class="form-label">Comment</label>
                <textarea class="form-control" id="reviewText" rows="3" placeholder="Write your review"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Rating</label>
                <select class="form-select" aria-label="Rating select">
                <option selected>Choose a rating</option>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Good</option>
                <option value="3">3 - Average</option>
                <option value="2">2 - Poor</option>
                <option value="1">1 - Terrible</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
</div>