<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    
    <x-update-form 
        title='Edit Shipping Cost'
        :viewAllLink="route('admin.shopSetting.topLevelCategory.index')"
        :action="route('admin.shopSetting.topLevelCategory.update', $topLevelCategory->id)"
        method="PUT"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Top Category Name',
                'value' => $topLevelCategory->name,
                'name' => 'name',
                'labelFor' => 'top_category_name',
                'id' => 'top_category_name',    
            ],
            [
                'type' => 'select',
                'labelName' => 'Show on menu',
                'name' => 'show_on_menu',
                'labelFor' => 'show_on_menu',
                'id' => 'show_on_menu',
                'options' => [
                    [
                      'value' => 1,
                      'label' => 'Yes',
                      'selected' => $topLevelCategory->show_on_menu == 1 
                    ],
                    [
                      'value' => 0,
                      'label' => 'No',
                      'selected' => $topLevelCategory->show_on_menu == 0
                    ]
                ]
            ]
        ]"
    />
</x-layout-admin-panel>

