<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    <x-update-form 
        title="Size Name"
        :viewAllLink="route('admin.shopSetting.size.index')"
        :action="route('admin.shopSetting.size.store')"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Add Name',
                'value' => '',
                'name' => 'size_name',
                'labelFor' => 'size_name',
                'id' => 'size_name',    
            ]
        ]"
    />
</x-layout-admin-panel>