<div class="card-body">
    <form wire:submit.prevent="store" enctype="multipart/form-data">
    <div class="row g-3">
        <!-- Top / Mid / End Categories -->
        <div class="col-12 col-sm-6 col-md-4">
            <label class="form-label">Top Level Category Name</label>
            <select class="form-select">
                <option selected disabled>Choose...</option>
                <option>Electronics</option>
                <option>Men</option>
                <option>Kids</option>
                <option>Health</option>
            </select>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <label class="form-label">Mid Level Category Name</label>
            <select class="form-select">
                <option selected disabled>Choose...</option>
                <option>Computers</option>
                <option>Shoes</option>
                <option>T-Shirt</option>
            </select>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <label class="form-label">End Level Category Name</label>
            <select class="form-select">
                <option selected disabled>Choose...</option>
                <option>Printers & Monitors</option>
                <option>Vitamins</option>
                <option>Components</option>
            </select>
        </div>

        <!-- Product Name -->
        <div class="col-12 col-md-6">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" placeholder="Enter product name">
        </div>

        <!-- Prices -->
        <div class="col-6 col-md-3">
            <label class="form-label">Old Price</label>
            <input type="text" class="form-control" placeholder="e.g. 200">
        </div>
        <div class="col-6 col-md-3">
            <label class="form-label">Current Price</label>
            <input type="text" class="form-control" placeholder="e.g. 180">
        </div>

        <!-- Quantity -->
        <div class="col-6 col-md-3">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control" placeholder="Enter stock qty">
        </div>

        <!-- Size -->
        <div class="col-6 col-md-3">
            <label class="form-label">Select Size</label>
            <select class="form-select">
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
                <option>XXL</option>
            </select>
        </div>

        <!-- Color -->
        <div class="col-6 col-md-3">
            <label class="form-label">Select Color</label>
            <select class="form-select">
                <option>Red</option>
                <option>Blue</option>
                <option>Black</option>
                <option>White</option>
                <option>Green</option>
            </select>
        </div>

        <!-- Feature Photo -->
        <div class="col-12 col-md-6">
            <label class="form-label">Feature Photo</label>
            <input type="file" class="form-control">
        </div>

        <!-- Other Photos -->
        <div class="col-12 col-md-6">
            <label class="form-label">Other Photos</label>
            <div class="input-group mb-2">
                <input type="file" class="form-control">
                <button class="btn btn-outline-success" type="button">Add Item</button>
                <button class="btn btn-outline-danger" type="button">Remove Item</button>
            </div>
        </div>

        <!-- Text Areas -->
        <div class="col-12 col-md-6">
            <label class="form-label">Description</label>
            <textarea class="form-control" data-editor id="description" wire:model.defer="description"></textarea>
        </div>

        <div class="col-12 col-md-6">
            <label class="form-label">Short Description</label>
            <textarea class="form-control" data-editor id="short_description" wire:model.defer="short_description"></textarea>
        </div>

        <div class="col-12 col-md-6">
            <label class="form-label">Feature</label>
            <textarea class="form-control" data-editor id="feature" wire:model.defer="feature"></textarea>
        </div>
        <div class="col-12 col-md-6">
            <label class="form-label">Condition</label>
            <textarea class="form-control" data-editor id="condition" wire:model.defer="condition"></textarea>
        </div>

        <div class="col-12 col-md-6">
            <label class="form-label">Return Policy</label>
            <textarea class="form-control" data-editor id="return_policy" wire:model.defer="return_policy"></textarea>
        </div>

        <!-- Featured / Active -->
        <div class="col-6 col-md-3">
            <label class="form-label">Is Featured?</label>
            <select class="form-select">
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        <div class="col-6 col-md-3">
            <label class="form-label">Is Active?</label>
            <select class="form-select">
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
    </div>

    <!-- Submit -->
    <div class="mt-4 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-2">
        <i class="bi bi-check-circle me-1"></i> Add Product
        </button>
    </div>
    </form>
</div>
        
