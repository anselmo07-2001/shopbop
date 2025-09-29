<x-layout-admin-panel>
    <div class="container-fluid py-4">

        <livewire:product-add
            :sizes="$sizes"
            :colors="$colors"
            :topCategories="$top_categories"
        />
    </div>
</x-layout-admin-panel>