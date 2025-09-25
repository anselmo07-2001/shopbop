<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    <x-update-form 
        title="Add Mid Level Category Name"
        :viewAllLink="route('admin.shopSetting.endLevelCategory.index')"
        :action="route('admin.shopSetting.endLevelCategory.store')"
        :inputs="[
            [
                'type' => 'select',
                'labelName' => 'Top Level Category Name',
                'name' => 'top_level_category_name',
                'labelFor' => 'top_level_category_name',
                'id' => 'top_level_category_name',
                'options' => collect([
                    [
                        'value' => '',
                        'label' => 'Select Top Level Category',
                        'selected' => true
                    ]
                ])->merge( 
                    $top_level_categories->map( fn($c) => [
                        'value' => $c->id,
                        'label' => $c->name,
                        'selected' => false
                    ])
                )
            ],
            [
                'type' => 'select',
                'labelName' => 'Mid Level Category Name',
                'name' => 'mid_level_category_name',
                'labelFor' => 'mid_level_category_name',
                'id' => 'mid_level_category_name',
                'options' => collect([
                    [
                        'value' => '',
                        'label' => 'Select Mid Level Category',
                        'selected' => true
                    ]
                ])->merge( 
                    $mid_level_categories->map( fn($c) => [
                        'value' => $c->id,
                        'label' => $c->name,
                        'selected' => false
                    ])
                )
            ],
            [
                'type' => 'text',
                'labelName' => 'End Category Name',
                'value' => '',
                'name' => 'end_level_category_name',
                'labelFor' => 'end_level_category_name',
                'id' => 'end_level_category_name',    
            ],
        ]"
    />
</x-layout-admin-panel>
