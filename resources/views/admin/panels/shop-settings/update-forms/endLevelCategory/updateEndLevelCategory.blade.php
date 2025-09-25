<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    
 
    <x-update-form 
        title='Edit Mid Level Category'
        :viewAllLink="route('admin.shopSetting.endLevelCategory.index')"
        :action="route('admin.shopSetting.endLevelCategory.update', $end_level_category->id)"
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
                        'label' => 'Select Mid Level Category',
                        'selected' => false
                    ]
                ])->merge( 
                    $top_level_categories->map( fn($t) => [
                        'value' => $t->id,
                        'label' => $t->name,
                        'selected' => $end_level_category->midCategory->topCategory->id === $t->id
                    ])
                )
            ],
            [
                'type' => 'select',
                'labelName' => 'Mid Category Name',
                'name' => 'mid_level_category_name',
                'labelFor' => 'mid_level_category_name',
                'id' => 'mid_level_category_name',
                'options' => collect([
                    [
                        'value' => '',
                        'label' => 'Select Mid Level Category',
                        'selected' => false
                    ]
                ])->merge( 
                    $mid_level_categories->map( fn($m) => [
                        'value' => $m->id,
                        'label' => $m->name,
                        'selected' => $end_level_category->mid_category_id === $m->id
                    ])
                )
            ],
            [
                'type' => 'text',
                'labelName' => 'End Category Name',
                'value' => $end_level_category->name,
                'name' => 'end_level_category_name',
                'labelFor' => 'end_category_name',
                'id' => 'end_category_name',    
            ]
        ]"
    />
</x-layout-admin-panel>

