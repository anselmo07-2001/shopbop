<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    
 
    <x-update-form 
        title='Edit Mid Level Category'
        :viewAllLink="route('admin.shopSetting.midLevelCategory.index')"
        :action="route('admin.shopSetting.midLevelCategory.update', $mid_level_category->id)"
        method="PUT"
        :inputs="[
            [
                'type' => 'select',
                'labelName' => 'Top Category Name',
                'name' => 'top_level_category_name',
                'labelFor' => 'top_level_category_name',
                'id' => 'top_level_category_name',
                'options' => collect([
                    [
                        'value' => '',
                        'label' => 'Select Top Level Category',
                        'selected' => false
                    ]
                ])->merge( 
                    $top_level_categories->map( fn($c) => [
                        'value' => $c->id,
                        'label' => $c->name,
                        'selected' => $mid_level_category->top_category_id === $c->id
                    ])
                )
            ],
            [
                'type' => 'text',
                'labelName' => 'Mid Category Name',
                'value' => $mid_level_category->name,
                'name' => 'mid_level_category_name',
                'labelFor' => 'mid_category_name',
                'id' => 'mid_category_name',    
            ]
        ]"
    />
</x-layout-admin-panel>

