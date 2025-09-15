<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>  
    <link rel="icon" type="image/png" href="assets/uploads/favicon.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $metaTitle ?? 'ShopBop - Home' }}</title>
    <meta name="keywords" content="{{ $metaKeywords ?? 'content' }}">
    <meta name="description" content="{{ $metaDescription ?? 'online ecommerce' }}">
  </head>
  
<body class="bg-light">
  <div class="container-fluid">
    <div class="row">
      <x-sidebar />
      <main class="col-md-10 col-lg-10 p-4 bg-light">
        <x-admin-panel-header/>
        {{ $slot }}
      </main>
    </div>
 </div>
</body>
</html>