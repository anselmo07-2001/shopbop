<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    <x-update-form 
        title="Color Name"
        :viewAllLink="route('admin.shopSetting.color.index')"
        :action="route('admin.shopSetting.color.store')"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Add Name',
                'value' => '',
                'name' => 'color_name',
                'labelFor' => 'color_name',
                'id' => 'color_name',    
            ]
        ]"
    />
</x-layout-admin-panel>