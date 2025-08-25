<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/uploads/favicon.png">

    {{-- Load compiled CSS & JS via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>ShopBop - Home</title>
    <meta name="keywords" content="content">
    <meta name="description" content="online ecommerce">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script> -->


    </head>
<body>
    
    <x-header/>
        {{ $slot }}
    <x-footer/>




</body>
</html>