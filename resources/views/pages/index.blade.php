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

    
    <x-home-carousel :carousel="$carousel" :showHomeCarousel="$page_settings->show_welcome_product_section"/>
    
    <x-services :services="$services" :showServices="$page_settings->show_service_section" />

    
    <!-- Top Feature Product -->
    <x-product-slider 
        :header="$page_settings->featured_products_title" 
        :subTitle="$page_settings->featured_products_subtitle" 
        :products="$featured_products"
        :showSlider="$page_settings->show_featured_product_section" 
    />

    <!-- Top Latest Product -->
    <x-product-slider 
        :hasBgLight="true" 
        :header="$page_settings->latest_products_title" 
        :subTitle="$page_settings->latest_products_subtitle" 
        :products="$latest_products" 
        :showSlider="$page_settings->show_latest_product_section"
    />

    <!-- Top Popular Product -->
    <x-product-slider 
        :header="$page_settings->popular_products_title" 
        :subTitle="$page_settings->popular_products_subtitle" 
        :products="$popular_products" 
        :showSlider="$page_settings->show_popular_product_section"
    />

</x-layout>