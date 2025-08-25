<x-layout>
    <section class="d-flex align-items-center justify-content-center bg-light py-4 mb-5">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h4 class="text-center mb-4 fw-semibold">Customer Register</h4>

                <!-- Register Form -->
                <form>
                <div class="row g-4"><!-- increased gap for spacing -->

                    <!-- Full Name -->
                    <div class="col-md-6">
                    <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" id="fullname" placeholder="Enter your full name" required>
                    </div>

                    <!-- Company Name -->
                    <div class="col-md-6">
                    <label for="company" class="form-label">Company Name</label>
                    <input type="text" class="form-control form-control-lg" id="company" placeholder="Enter your company name">
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control form-control-lg" id="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control form-control-lg" id="phone" placeholder="Enter your phone number" required>
                    </div>

                    <!-- Address -->
                    <div class="col-12">
                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" id="address" placeholder="Enter your address" required>
                    </div>

                    <!-- Country -->
                    <div class="col-md-6">
                    <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" id="country" placeholder="Enter your country" required>
                    </div>

                    <!-- City -->
                    <div class="col-md-6">
                    <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" id="city" placeholder="Enter your city" required>
                    </div>

                    <!-- State -->
                    <div class="col-md-6">
                    <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" id="state" placeholder="Enter your state" required>
                    </div>

                    <!-- Zipcode -->
                    <div class="col-md-6">
                    <label for="zipcode" class="form-label">Zipcode <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" id="zipcode" placeholder="Enter your zipcode" required>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Enter password" required>
                    </div>

                    <!-- Retype Password -->
                    <div class="col-md-6">
                    <label for="confirmPassword" class="form-label">Retype Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control form-control-lg" id="confirmPassword" placeholder="Confirm password" required>
                    </div>

                </div>

                <!-- Submit button -->
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-dark btn-lg">Register</button>
                </div>
                </form>

                <!-- Divider -->
                <div class="text-center my-3 text-muted">or</div>

                <!-- Login Redirect -->
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
