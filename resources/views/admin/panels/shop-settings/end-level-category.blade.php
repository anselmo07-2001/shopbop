<x-layout-admin-panel>
    <div class="container-fluid py-4">
        <x-flash-message session_name="success" />
        <x-flash-message session_name="error" />    

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-diagram-3-fill me-2"></i>End Level Categories</h4>
            <a href="{{ route('admin.shopSetting.endLevelCategory.create') }}" class="btn btn-dark">
            <i class="bi bi-plus-circle me-1"></i> Add New
            </a>
        </div>
                    
        <livewire:end-level-category-table/>
           
    </div>
</x-layout-admin-panel>