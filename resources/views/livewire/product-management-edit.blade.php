<div class="card-body">
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-12 col-sm-6 col-md-4">
                <label class="form-label">Top Level Category Name</label>
                <select wire:model="selected_topCategory" class="form-select" wire:change="loadMidCategories()" >
                    <option value="" selected >Choose...</option>
                    @foreach ($topCategories as $topCategory)
                        <option value="{{ $topCategory->id }}" 
                                {{ $product->endCategory->midCategory->topCategory->id == $topCategory->id ? "selected" : ""}} >
                            {{ $topCategory->name }}
                        </option>       
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <label class="form-label">Mid Level Category Name</label>
                <select wire:model="selected_midCategory" class="form-select" wire:change="loadEndCategories()">
                    <option selected value="">Choose...</option>
                    @foreach ($midCategories as $midCategory)
                        <option value="{{ $midCategory->id }}"
                                {{ $product->endCategory->midCategory->id == $midCategory->id ? "selected" : ""}}
                            >{{ $midCategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <label class="form-label">End Level Category Name</label>
                <select wire:model="selected_endCategory" class="form-select">
                    <option selected value="">Choose...</option>
                    @foreach ($endCategories as $endCategory)
                        <option value="{{ $endCategory->id }}"
                                {{ $product->endCategory->id == $endCategory->id ? "selected" : ""}}
                            >{{ $endCategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Product Name -->
            <div class="col-12 col-md-6">
                <label for="product_name" class="form-label">Product Name</label>
                <input id="product_name" wire:model.defer="product_name" type="text" class="form-control" 
                       placeholder="Enter product name">
            </div>

            <!-- Prices -->
            <div class="col-6 col-md-3">
                <label for="original_price" class="form-label">Original Price</label>
                <input id="original_price" wire:model.defer="original_price" type="number" class="form-control">
            </div>

            <div class="cola-6 col-md-3">
                <label for="current_price" class="form-label">Current Price</label>
                <input id="current_price" wire:model.defer="current_price" type="number" class="form-control">
            </div>

            <!-- Quantity -->
            <div class="col-6 col-md-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input id="quantity" wire:model.defer="quantity" type="number" class="form-control">
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
            </div> 

            <!-- Feature Photo -->
            <div class="col-12 col-md-6">
                <label for="feature_photo" class="form-label">Feature Photo</label>
                <input id="feature_photo" type="file" class="form-control" wire:model="feature_photo">

                @if ($feature_photo)
                    <div class="mt-3">
                        <p class="text-muted">Preview:</p>
                        <img src="{{ $feature_photo->temporaryUrl() }}"
                            class="rounded border"
                            style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                @elseif ($current_feature_photo)
                    <div class="mt-3">
                        <p class="text-muted">Current Photo:</p>
                        <img src="{{ asset('products/' . $current_feature_photo) }}"
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
                            $existingsPhoto = $file["path"] ?? "";
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
                        @elseif ($existingsPhoto)
                            <div class="mt-2">
                                <p class="text-muted">Current Photo:</p>
                                <img src="{{ asset('gallery/' . $existingsPhoto) }}"
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
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">Short Description</label>
                <div wire:ignore>
                    <textarea class="form-control" data-editor id="short_description" wire:model.defer="short_description"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">Feature</label>
                <div wire:ignore>
                    <textarea class="form-control" data-editor id="feature" wire:model.defer="feature"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">Condition</label>
                <div wire:ignore>
                    <textarea class="form-control" data-editor id="condition" wire:model.defer="condition"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">Return Policy</label>
                <div wire:ignore>
                    <textarea class="form-control" data-editor id="return_policy" wire:model.defer="return_policy"></textarea>
                </div>
            </div>

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