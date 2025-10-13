<x-layout metaTitle="ShopBop - Forgot Password">    
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm border-1 rounded-4">
                <div class="card-body p-4">
                    <h4 class="text-center mb-3">Forgot Your Password?</h4>
                    <p class="text-muted text-center mb-4">
                        Enter your email address and we’ll send you a link to reset your password.
                    </p>

                    {{-- Status message --}}
                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Error message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Forgot password form --}}
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="Enter your email"
                                required
                                autofocus
                                style="font-size: 14px;"
                            >
                            <x-error-input-message field="email"/>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-md">
                            <i class="bi bi-envelope me-1"></i> Send Reset Link
                        </button>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none">
                                <i class="bi bi-arrow-left"></i> Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

    
