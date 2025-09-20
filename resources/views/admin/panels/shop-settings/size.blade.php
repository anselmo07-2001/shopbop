<x-layout-admin-panel>
    <div class="container-fluid py-4">
        <x-flash-message session_name="success" />
        <x-flash-message session_name="error" />    
     
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-arrows-fullscreen me-2"></i>Manage Sizes</h4>
            <a href="{{ route('admin.addSizeForm') }}" class="btn btn-dark">
                <i class="bi bi-plus-circle me-1"></i> Add New
            </a>
        </div>
               
        <livewire:size-table/>
    
    </div>
</x-layout-admin-panel>