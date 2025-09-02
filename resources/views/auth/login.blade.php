<x-layout>
    <section class="d-flex align-items-center justify-content-center bg-light py-4 mb-5">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4 fw-semibold">Customer Login</h4>
                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login.customer')}}">
                        @if($errors->any())
                            <div class="alert alert-danger mb-3">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        @csrf
                    <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input style="font-size: 14px;" name="email" type="email" 
                                   class="form-control form-control-lg" id="email" 
                                   placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input style="font-size: 14px;" name="password" type="password" class="form-control form-control-lg" 
                                   id="password" placeholder="Enter your password">
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <!-- Forgot password -->
                        <div class="mb-3 text-end">
                            <a href="#" class="text-decoration-none small">Forgot Password?</a>
                        </div>

                        <!-- Submit button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark btn-lg">Login</button>
                        </div>
                    </form>

                    <!-- Divider -->
                    <div class="text-center my-3 text-muted">or</div>

                    <!-- Signup link -->
                    <div class="text-center">
                        <span class="small">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign Up</a></span>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</x-layout>
