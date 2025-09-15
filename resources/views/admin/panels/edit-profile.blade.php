<x-layout-admin-panel>
    <div class="container-fluid">
        <h2 class="mb-4">Edit Profile</h2>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        Update Information
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" value="Administrator">
                            </div>
                            <div class="mb-3 text-center">
                            <img src="https://via.placeholder.com/100" class="rounded-circle mb-2" alt="Avatar">
                            <p class="small text-muted">Current Avatar</p>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="admin@example.com">
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" placeholder="+1234567890">
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" value="Admin" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Information</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-6 d-flex flex-column gap-4">

                <!-- Top: Update Photo -->
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                    Update Photo
                    </div>
                    <div class="card-body">
                    <form>
                        <div class="mb-3">
                        <label class="form-label">Upload New Avatar</label>
                        <input type="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-secondary w-100">Update Photo</button>
                    </form>
                    </div>
                </div>

                <!-- Bottom: Update Password -->
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        Update Password
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout-admin-panel>