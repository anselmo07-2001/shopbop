<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />
    
    <div class="container-fluid py-4">

        <livewire:product-management-edit 
            :product="$product"
            :sizes="$sizes"
            :colors="$colors"
            :topCategories="$top_categories"
        />
    </div>
</x-layout-admin-panel>