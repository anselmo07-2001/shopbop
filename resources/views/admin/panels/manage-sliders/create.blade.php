<x-layout-admin-panel>
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5><i class="fa fa-plus-square me-2"></i> Add Slide</h5>
                <a href="{{ route('admin.manageSliders.index') }}" class="btn btn-dark btn-md">
                    <i class="fa fa-arrow-left me-1"></i> View All
                </a>
        </div>

        <!-- Form -->
        <div class="card shadow-sm">
            <div class="card-body">
            <form method="POST" action="{{ route("admin.manageSliders.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input id="photo" name="photo" type="file" class="form-control" 
                           name="photo">
                    <x-error-input-message field="photo"/>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input id="title" name="title" type="text" class="form-control" 
                           placeholder="Enter title" value="{{ old('title', '') }}">
                    <x-error-input-message field="title"/>
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <textarea id="subtitle" name="subtitle" class="form-control" rows="3" 
                            placeholder="Enter subtitle">{{ old('subtitle', '') }}</textarea>
                    <x-error-input-message field="subtitle"/>
                </div>

                <div class="mb-3">
                    <label for="button_text" class="form-label">Button Text</label>
                    <input id="button_text" type="text" class="form-control" name="button_text" 
                           placeholder="Enter button text" value="{{ old('button_text', '') }}">
                    <x-error-input-message field="button_text"/>
                </div>

                <div class="mb-3">
                    <label for="button_url" class="form-label">Button URL</label>
                    <input id="button_url" type="text" class="form-control" name="button_url" 
                           placeholder="Enter button URL" value="{{ old('button_url', '') }}">
                    <x-error-input-message field="button_url" />
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <select class="form-select" name="position">
                        <option value="">-- Select Position --</option>
                        <option value="start" {{ old("position") == "start" ? "selected" : "" }}>Left</option>
                        <option value="center" {{ old("position") == "center" ? "selected" : "" }}>Center</option>
                        <option value="end" {{ old("position") == "end" ? "selected" : "" }}>Right</option>
                    </select>
                    <x-error-input-message field="position"/>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Submit
                    </button>
                </div>
            </form>
            </div>
        </div>   
    </div>
</x-layout-admin-panel>