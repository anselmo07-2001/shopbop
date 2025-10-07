<x-layout-admin-panel>
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5><i class="fa fa-plus-square me-2"></i> Add FAQ</h5>
            <a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> View All
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.faq.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" class="form-control" 
                               name="title" placeholder="Enter FAQ title" value="{{ old("title", "") }}">
                        <x-error-input-message field="title"/>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea data-editor id="content" class="form-control" name="content"
                                 rows="4" placeholder="Enter FAQ content">{{ old("content", "") }}</textarea>
                        <x-error-input-message field="content"/>
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