<x-layout>
    @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 5000 )" 
            class="alert alert-success text-center"
            style="margin-bottom: 0"
        >
            {{ session('success') }}
        </div>
    @endif

    <x-home-carousel :carousel="$carousel"/>
    
    <x-services :services="$services"/>

    <!-- Top Feature Product -->
    <x-product-slider header="Featured Products" subTitle="Our list of Top Featured Products" :products="$featured_products"/>

    <!-- Top Latest Product -->
    <x-product-slider :hasBgLight="true" header="Latest Product" subTitle="Our list of recently added products" :products="$latest_products"/>

    <!-- Top Popular Product -->
    <x-product-slider header="Popular Products" subTitle="Popular products based on customer's choice" :products="$popular_products"/>

</x-layout>