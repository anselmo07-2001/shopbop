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

  
    <section class="flex-grow-1 d-flex align-items-start justify-content-center pt-5 position-relative"
            style="background: url('{{ asset('photo/admin-panel.jpg') }}') no-repeat center center / cover;">
    
        <div class="position-absolute top-0 start-0 w-100 h-100" 
            style="backdrop-filter: blur(6px); background-color: rgba(0, 102, 204, 0.2);">
        </div>

        <div class="container position-relative">
            <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card shadow border-0 rounded-4 mt-5"
                    style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(4px);">
                    <div class="card-body p-4">
                        <h4 class="text-center mb-4 fw-semibold">Admin Panel</h4>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login.admin')}}">
                            @if($errors->any())
                                <div class="alert alert-danger mb-3">
                                {{ $errors->first() }}
                                </div>
                            @endif
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input style="font-size: 14px;" name="email" type="email" 
                                    class="form-control form-control-lg" id="email" 
                                    placeholder="Enter your email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input style="font-size: 14px;" name="password" type="password" 
                                    class="form-control form-control-lg" id="password" 
                                    placeholder="Enter your password">
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark btn-lg">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


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
