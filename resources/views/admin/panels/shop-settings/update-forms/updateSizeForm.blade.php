<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    <x-update-form 
        title='Edit Size'
        :viewAllLink="route('admin.shopSetting.size')"
        :action="route('admin.sizeUpdate.update', $size->id)"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Size Name',
                'value' => $size->name,
                'name' => 'size_name',
                'labelFor' => 'size_name',
                'id' => 'size_name',
            ]
        ]"
    />
</x-layout-admin-panel>