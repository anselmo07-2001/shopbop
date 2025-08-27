<x-layout>
    <x-home-carousel/>
    
    <x-services :services="$services"/>

    <!-- Top Feature Product -->
    <x-product-slider header="Featured Products" subTitle="Our list of Top Featured Products"/>

    <!-- Top Feature Product -->
    <x-product-slider :hasBgLight="true" header="Latest Product" subTitle="Our list of recently added products" />

    <!-- Top Popular Product -->
    <x-product-slider header="Popular Products" subTitle="Popular products based on customer's choice" />

</x-layout>