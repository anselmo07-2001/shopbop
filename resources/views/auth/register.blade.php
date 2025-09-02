<x-layout>
    <section class="d-flex align-items-center justify-content-center bg-light py-4 mb-5">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h4 class="text-center mb-4 fw-semibold">Customer Register</h4>

                <form method="POST" action="{{ route("register.store") }}">
                    @csrf
                    <div class="row g-4">
                        <!-- Full Name -->
                        <div class="col-md-6">
                        <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="text" name="full_name" class="form-control form-control-lg" id="fullname" placeholder="Enter your full name" required>
                        </div>

                        <!-- Company Name -->
                        <div class="col-md-6">
                        <label for="company" class="form-label">Company Name</label>
                        <input style="font-size: 14px;" type="text" name="company_name" class="form-control form-control-lg" id="company" placeholder="Enter your company name">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter your email" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="tel" name="phone_number" class="form-control form-control-lg" id="phone" placeholder="Enter your phone number" required>
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="text" name="address" class="form-control form-control-lg" id="address" placeholder="Enter your address" required>
                        </div>

                        <!-- Country -->
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                            <select name="country" id="country" class="form-control form-control-lg" required style="font-size: 14px; color:#212529;">
                                <option value="">-- Select Country --</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- City -->
                        <div class="col-md-6">
                        <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="text" name="city" class="form-control form-control-lg" id="city" placeholder="Enter your city" required>
                        </div>

                        <!-- State -->
                        <div class="col-md-6">
                        <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="text" name="state" class="form-control form-control-lg" id="state" placeholder="Enter your state" required>
                        </div>

                        <!-- Zipcode -->
                        <div class="col-md-6">
                        <label for="zipcode" class="form-label">Zipcode <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="text" name="zip" class="form-control form-control-lg" id="zipcode" placeholder="Enter your zipcode" required>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter password" required>
                        </div>

                        <!-- Retype Password -->
                        <div class="col-md-6">
                        <label for="confirmPassword" class="form-label">Retype Password <span class="text-danger">*</span></label>
                        <input style="font-size: 14px;" type="password" name="password_confirmation" class="form-control form-control-lg" id="confirmPassword" placeholder="Confirm password" required>
                        </div>

                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-dark btn-lg">Register</button>
                    </div>
                </form>

               
                <div class="text-center my-3 text-muted">or</div>
      
                <div class="text-center">
                    <span class="small">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></span>
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</x-layout>
