<x-layout-admin-panel>
   <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-box-seam me-2"></i>Products</h4>
            <a class="btn btn-dark" href="admin-productManagement-add.html">
                <i class="bi bi-plus-circle me-1"></i> Add Product
            </a>
        </div>
   
        <livewire:product-management-table/>
        
    </div>
</x-layout-admin-panel>