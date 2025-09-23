<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    <x-update-form 
        title="Add Top Level Category Name"
        :viewAllLink="route('admin.shopSetting.topLevelCategory.index')"
        :action="route('admin.shopSetting.topLevelCategory.store')"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Top Category Name',
                'value' => '',
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
                      'selected' => false
                    ],
                    [
                      'value' => 0,
                      'label' => 'No',
                      'selected' => true
                    ]
                ]
            ]
        ]"
    />
</x-layout-admin-panel>

{{-- $countries->map(fn($c) => [
                    'value' => $c->id,
                    'label' => $c->country_name,
                    'selected' => $c->id === $shippingCost->country_id
                ])   --}}