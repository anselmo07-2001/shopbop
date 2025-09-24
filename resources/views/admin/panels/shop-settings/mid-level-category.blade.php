<x-layout-admin-panel>
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-diagram-3 me-2"></i>Mid Level Categories</h4>
            <a href="{{ route('admin.shopSetting.midLevelCategory.create') }}" class="btn btn-dark">
            <i class="bi bi-plus-circle me-1"></i> Add New
            </a>
        </div>
           
        <livewire:mid-level-category-table/>
    
    </div>
</x-layout-admin-panel>