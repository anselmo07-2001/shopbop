<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    <x-update-form 
        title="Country Name"
        :viewAllLink="route('admin.shopSetting.country.index')"
        :action="route('admin.shopSetting.country.store')"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Add Name',
                'value' => '',
                'name' => 'country_name',
                'labelFor' => 'country_name',
                'id' => 'country_name',    
            ]
        ]"
    />
</x-layout-admin-panel>