<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    <x-update-form 
        title='Edit Country'
        :viewAllLink="route('admin.shopSetting.country.index')"
        :action="route('admin.shopSetting.country.update', $country->id)"
        method="PUT"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Country Name',
                'value' => $country->country_name,
                'name' => 'country_name',
                'labelFor' => 'country_name',
                'id' => 'country_name',
            ]
        ]"
    />
</x-layout-admin-panel>