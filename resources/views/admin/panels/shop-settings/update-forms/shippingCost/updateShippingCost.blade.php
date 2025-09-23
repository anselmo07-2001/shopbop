<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />    

    
    <x-update-form 
        title='Edit Shipping Cost'
        :viewAllLink="route('admin.shopSetting.shippingCost.index')"
        :action="route('admin.shopSetting.shippingCost.update', $shippingCost->id)"
        method="PUT"
        :inputs="[
            [
                'type' => 'text',
                'labelName' => 'Amount',
                'value' => $shippingCost->amount,
                'name' => 'amount',
                'labelFor' => 'amount',
                'id' => 'amount',
            ],
            [
                'type' => 'select',
                'labelName' => 'Country',
                'name' => 'country_id',
                'labelFor' => 'country_id',
                'id' => 'country_id',
                'options' => $countries->map(fn($c) => [
                    'value' => $c->id,
                    'label' => $c->country_name,
                    'selected' => $c->id === $shippingCost->country_id
                ])  
            ]
        ]"
    />
</x-layout-admin-panel>

