<div class="card-body">
    <form wire:submit.prevent="store" enctype="multipart/form-data">
    
    <div class="row g-3">
        <!-- Top / Mid / End Categories -->
        <div class="col-12 col-sm-6 col-md-4">
            <label class="form-label">Top Level Category Name</label>
            <select wire:model="selected_topCategory" class="form-select" wire:change="loadMidCategories">
                <option value="" selected >Choose...</option>
                @foreach ($topCategories as $topCategory)
                    <option value="{{ $topCategory->id }}">{{ $topCategory->name }}</option>       
                @endforeach
            </select>
            <x-error-input-message field="selected_topCategory" />
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <label class="form-label">Mid Level Category Name</label>
            <select wire:model="selected_midCategory" class="form-select" wire:change="loadEndCategories">
                <option value="" selected>Choose...</option>
                @foreach ($midCategories as $midCategory)
                    <option value="{{ $midCategory->id }}">{{ $midCategory->name }}</option>
                @endforeach
            </select>
            <x-error-input-message field="selected_midCategory" />
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <label class="form-label">End Level Category Name</label>
            <select wire:model="selected_endCategory" class="form-select">
                <option value="" selected>Choose...</option>
                @foreach ($endCategories as $endCategory)
                    <option value="{{ $endCategory->id }}">{{ $endCategory->name }}</option>
                @endforeach
            </select>
            <x-error-input-message field="selected_endCategory" />
        </div>

        <!-- Product Name -->
        <div class="col-12 col-md-6">
            <label class="form-label" for="product_name">Product Name</label>
            <input wire:model.defer="product_name" id="product_name" type="text" class="form-control" placeholder="Enter product name">
            <x-error-input-message field="product_name" />
        </div>

        <!-- Prices -->
        <div class="col-6 col-md-3">
            <label class="form-label" for="original_price">Original Price</label>
            <input wire:model.defer="original_price" id="original_price" type="number" class="form-control" placeholder="e.g. 200">
            <x-error-input-message field="original_price" />
        </div>
        <div class="col-6 col-md-3">
            <label class="form-label" for="current_price">Current Price</label>
            <input wire:model.defer="current_price" id="current_price" type="number" class="form-control" placeholder="e.g. 180">
            <x-error-input-message field="current_price" />
        </div>

        <!-- Quantity -->
        <div class="col-6 col-md-3">
            <label class="form-label" for="quantity">Quantity</label>
            <input wire:model.defer="quantity" id="quantity" type="number" class="form-control" placeholder="Enter stock qty">
            <x-error-input-message field="quantity" />
        </div>

        <!-- Size -->
        <div class="col-6 col-md-3">
            <label class="form-label">Select Size</label>     
            <div wire:ignore>
                <select wire:model.defer="selected_sizes" data-tom-select multiple class="form-select">
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
            <x-error-input-message field="selected_sizes" />
        </div>

        <!-- Color -->
        <div class="col-6 col-md-3" >
            <label class="form-label">Select Color</label>
            <div wire:ignore>
                <select data-tom-select multiple class="form-select" 
                        wire:model.defer="selected_colors">
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" >{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <x-error-input-message field="selected_colors" />
        </div> 

        {{-- <livewire:multi-select :options="$sizes" prefix="size" label="Select Sizes"  :selected="$selected_sizes"  />
        <livewire:multi-select :options="$colors" prefix="color" label="Select Colors"  :selected="$selected_colors" /> --}}

        
        <!-- Feature Photo -->
        <div class="col-12 col-md-6">
            <label for="feature_photo" class="form-label">Feature Photo</label>
            <input id="feature_photo" type="file" class="form-control" wire:model="feature_photo">
            <x-error-input-message field="feature_photo" />

            @if ($feature_photo)
                <div class="mt-3">
                    <p class="text-muted">Preview:</p>
                    <img src="{{ $feature_photo->temporaryUrl() }}"
                        class="rounded border"
                        style="width: 200px; height: 200px; object-fit: cover;">
                </div>
            @endif
        </div>

        <!-- Other Photos -->
        <div class="col-12 col-md-6">
            <label class="form-label">Other Photos</label>

            <!-- File inputs -->   
            <div class="mb-2">
                @foreach ($other_photos_input_files as $file)

                    @php
                        $inputId = $file["id"];
                        $photo = $other_photos[$inputId] ?? null;
                    @endphp


                    <div class="input-group mb-2" wire:key="photo-input-{{ $file['id'] }}">
                        <input type="file" class="form-control" wire:model="other_photos.{{ $file['id'] }}" name="photos[]">
                        <button class="btn btn-outline-danger" wire:click="removeItem({{ $file['id'] }})" type="button">Remove</button>
                    </div>

                    @if ($photo && method_exists($photo, "temporaryUrl"))
                        <div class="mb-2">
                            <p class="text-muted">Preview:</p>
                            <img src="{{ $photo->temporaryUrl() }}"
                                class="rounded border"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                    @endif

                    @endforeach
                <x-error-input-message field="other_photos" />
            </div>

            <div class="d-flex justify-content-start">
                <button wire:click="addItem" class="btn btn-outline-success" type="button">Add Item</button>
            </div>
        </div>

        <!-- Text Areas -->
        <div class="col-12 col-md-6"e>
            <label class="form-label">Description</label>
            <div wire:ignore>
                <textarea class="form-control" data-editor id="description" wire:model.defer="description"></textarea>
            </div>
            <x-error-input-message field="description" />
        </div>

        <div class="col-12 col-md-6">
            <label class="form-label">Short Description</label>
            <div wire:ignore>
                <textarea class="form-control" data-editor id="short_description" wire:model.defer="short_description"></textarea>
            </div>
            <x-error-input-message field="short_description" />
        </div>

        <div class="col-12 col-md-6">
            <label class="form-label">Feature</label>
            <div wire:ignore>
                <textarea class="form-control" data-editor id="feature" wire:model.defer="feature"></textarea>
            </div>
            <x-error-input-message field="feature" />
        </div>
        <div class="col-12 col-md-6">
            <label class="form-label">Condition</label>
            <div wire:ignore>
                <textarea class="form-control" data-editor id="condition" wire:model.defer="condition"></textarea>
            </div>
            <x-error-input-message field="condition" />
        </div>

        <div class="col-12 col-md-6">
            <label class="form-label">Return Policy</label>
            <div wire:ignore>
                <textarea class="form-control" data-editor id="return_policy" wire:model.defer="return_policy"></textarea>
            </div>
            <x-error-input-message field="return_policy" />
        </div>

        <!-- Featured / Active -->
        <div class="col-6 col-md-3">
            <label for="is_featured" class="form-label">Is Featured?</label>
            <select id="is_featured" wire:model.defer="is_featured" class="form-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <x-error-input-message field="is_featured" />
        </div>

        <div class="col-6 col-md-3">
            <label for="is_active" class="form-label">Is Active?</label>
            <select id="is_active" wire:model.defer="is_active" class="form-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <x-error-input-message field="is_active" />
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
        
