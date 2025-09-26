<x-layout-admin-panel>
     
 
    <livewire:update-form-livewire 
        title="Edit End Level Category"
        method="PUT"
        :end_level_category_name="$endLevelCategory->name"
        :topCategoryId="$endLevelCategory->midCategory->topCategory->id"
        :midCategoryId="$endLevelCategory->midCategory->id"
        :endCategoryId="$endLevelCategory->id"
    />
</x-layout-admin-panel>


