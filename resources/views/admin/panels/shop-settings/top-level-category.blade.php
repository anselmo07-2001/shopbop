<x-layout-admin-panel>
     <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-list-nested me-2"></i>Top Level Categories</h4>
            <button class="btn btn-dark">
            <i class="bi bi-plus-circle me-1"></i> Add New
            </button>
        </div>
                
        <livewire:top-level-category-table/>

    </div>
</x-layout-admin-panel>