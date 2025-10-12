<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="icon" type="image/png" href="assets/uploads/favicon.png">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>{{ $metaTitle ?? 'ShopBop - Login' }}</title>
        <meta name="keywords" content="{{ $metaKeywords ?? 'content' }}">
        <meta name="description" content="{{ $metaDescription ?? 'online ecommerce' }}">
    </head>
    <body class="d-flex flex-column min-vh-100"> 

        <div class="bg-dark border-bottom py-2">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-md-6">
                    <ul class="list-inline mb-0">
                    <li class="list-inline-item text-white"><i class="fas fa-phone"></i> {{ $global_page_settings->contact_phone }}</li>
                    <li class="list-inline-item text-white"><i class="fas fa-envelope"></i> {{ $global_page_settings->contact_email }}</li>
                    </ul>
                </div>
                <div class="col-md-6 text-md-end mt-2 mt-md-0">
                    <ul class="list-inline mb-0">
                    @foreach ($socials as $social)
                        @if (in_array($social->name, ["Facebook", "X", "YouTube", "Instagram", "WhatsApp"] ))
                        <li class="list-inline-item">
                            <a href="{{ $social->url }}"><i class="{{ $social->icon }} text-white"></i></a>
                        </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
                </div>
            </div>
        </div>

        <x-flash-message session_name="success" />
        <x-flash-message session_name="error" />  

    <div class="container text-center mt-5">
        <div class="card p-5">
        <div class="icon mb-3">✅</div>
        <h2 class="mb-3 text-success">{{ $message }}</h2>

        @if (str_contains($message, 'confirmed'))
            <p class="text-muted">
                You’ve successfully confirmed your email address!  
                Expect our latest news, updates, and offers in your inbox soon.
            </p>
        @else
            <p class="text-muted">
                It looks like you’ve already verified this email.  
                Thanks for staying connected with us!
            </p>
        @endif

        <a href="{{ url('/') }}" class="btn btn-success mt-3 px-4">
            Back to Home
        </a>
        </div>
    </div>    
    


    <footer class="footer-bottom py-3 bg-dark text-white mt-auto">
        <div class="container">
        <div class="row">
            <div class="col-12 text-center">
            © {{ date('Y') }} {{ $global_page_settings->footer_copyright }}
            </div>
        </div>
        </div>
    </footer>

    </body>
</html>
