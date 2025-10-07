<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5><i class="fa fa-plus-square me-2"></i> Add Service</h5>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> View All
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.services.update', $service->id ) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <div class="mb-2">
                            <p class="text-secondary">Preview</p>
                            <img id="photoPreview" 
                                src="{{ asset('services/' . $service->photo) }}" 
                                alt="Image preview" 
                                style="width: 150px; height: 150px; object-fit: cover;" >
                        </div>
                        <hr>
                        <label for="photo" class="form-label">Photo</label>
                        <input id="photo" type="file" class="form-control" name="photo">
                        <x-error-input-message field="photo"/>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" class="form-control" 
                               name="title" placeholder="Enter service title" value="{{ old('title', $service->title ?? '') }}">
                        <x-error-input-message field="title"/>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea id="content" class="form-control" name="content" rows="3" 
                                    placeholder="Enter service description">{{ old('content',  $service->content ?? '') }}</textarea>
                        <x-error-input-message field="content"/>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin-panel>