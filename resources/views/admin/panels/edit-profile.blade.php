<x-layout-admin-panel>
    <div class="container-fluid">
        <x-flash-message session_name="success" />
        <x-flash-message session_name="error" />

        <h4 class="mb-4"><i class="fa-solid fa-user-pen"></i> Edit Profile</h4>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        Update Information
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.manageProfile.updateProfile') }}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" name="name" type="text" class="form-control" 
                                       value="{{ old('name', auth()->user()->full_name ?? '') }}">
                                <x-error-input-message field="name"/>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="admin@example.com"
                                       value="{{ old('email', auth()->user()->email ?? '') }}" >
                                <x-error-input-message field="email"/>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone</label>
                                <input id="phone_number" name="phone_number" type="text" class="form-control" placeholder="+1234567890"
                                       value="{{ old('phone_number', auth()->user()->phone_number ?? '') }}" >
                                <x-error-input-message field="phone_number"/>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Update Information</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-6 d-flex flex-column gap-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        Update Password
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.manageProfile.updatePassword') }}" >
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input id="current_password" name="current_password" type="password" class="form-control">
                                <x-error-input-message field="current_password"/>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input id="new_password" name="new_password" type="password" class="form-control">
                                <x-error-input-message field="new_password"/>
                            </div>
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                                <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="form-control">
                                <x-error-input-message field="new_password_confirmation"/>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout-admin-panel>