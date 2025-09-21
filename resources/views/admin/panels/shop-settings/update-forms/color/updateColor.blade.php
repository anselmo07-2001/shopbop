<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    <x-update-form 
        title='Edit Color'
        :viewAllLink="route('admin.shopSetting.color.index')"
        :action="route('admin.shopSetting.color.update', $color->id)"
        method="PUT"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Color Name',
                'value' => $color->name,
                'name' => 'color_name',
                'labelFor' => 'color_name',
                'id' => 'color_name',
            ]
        ]"
    />
</x-layout-admin-panel>