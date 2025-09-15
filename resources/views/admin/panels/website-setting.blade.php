<x-layout-admin-panel>
    <div class="container-fluid">              
        <main class="p-4">
            <h3 class="mb-4">Website Settings</h3>
                
            <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo" type="button" role="tab">Logo & Favicon</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="footer-tab" data-bs-toggle="tab" data-bs-target="#footer" type="button" role="tab">Footer</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="message-tab" data-bs-toggle="tab" data-bs-target="#message" type="button" role="tab">Message Settings</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab">Products</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab">Home Settings</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="banner-tab" data-bs-toggle="tab" data-bs-target="#banner" type="button" role="tab">Banner</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab">Payment</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="scripts-tab" data-bs-toggle="tab" data-bs-target="#scripts" type="button" role="tab">Head & Body Scripts</button>
                </li>
            </ul>
   
            <div class="tab-content border border-top-0 p-4 bg-white" id="settingsTabContent">

                <!-- Logo & Favicon -->
                <div class="tab-pane fade show active" id="logo" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Current Logo</label><br>
                    <img src="assets/uploads/logo.png" alt="Logo" class="img-thumbnail mb-2" style="max-width:150px;">
                    <input type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Favicon</label><br>
                    <img src="assets/uploads/favicon.png" alt="Favicon" class="img-thumbnail mb-2" style="max-width:50px;">
                    <input type="file" class="form-control">
                </div>
                <button class="btn btn-primary">Update</button>
                </div>

                <!-- Footer -->
                <div class="tab-pane fade" id="footer" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Newsletter Section</label>
                    <select class="form-select">
                    <option>On</option>
                    <option>Off</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Copyright</label>
                    <input type="text" class="form-control" value="© 2025 ShopBop. All rights reserved.">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Address</label>
                    <input type="text" class="form-control" value="123 Main St, City, Country">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Email</label>
                    <input type="email" class="form-control" value="support@shopbop.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Phone</label>
                    <input type="text" class="form-control" value="+1 234 567 890">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Map (iframe)</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-primary">Update</button>
                </div>

                <!-- Message Settings -->
                <div class="tab-pane fade" id="message" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Contact Email Address</label>
                    <input type="email" class="form-control" value="support@shopbop.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Email Subject</label>
                    <input type="text" class="form-control" value="Thank you for contacting us">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Email Thank You Message</label>
                    <textarea class="form-control" rows="3">We appreciate your message. Our team will get back to you soon.</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Forgot Password Message</label>
                    <textarea class="form-control" rows="3">Please use the link below to reset your password.</textarea>
                </div>
                <button class="btn btn-primary">Update</button>
                </div>

                <!-- Products -->
                <div class="tab-pane fade" id="products" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Home Page Featured Products</label>
                    <input type="number" class="form-control" value="8">
                </div>
                <div class="mb-3">
                    <label class="form-label">Home Page Latest Products</label>
                    <input type="number" class="form-control" value="6">
                </div>
                <div class="mb-3">
                    <label class="form-label">Home Page Popular Products</label>
                    <input type="number" class="form-control" value="6">
                </div>
                <button class="btn btn-primary">Update</button>
                </div>

                <!-- Home Settings -->
                <div class="tab-pane fade" id="home" role="tabpanel">

                <!-- Section On/Off -->
                <h5 class="mt-2">Section On/Off</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label class="form-label">Service Section</label>
                    <select class="form-select"><option>On</option><option>Off</option></select>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label class="form-label">Welcome Section</label>
                    <select class="form-select"><option>On</option><option>Off</option></select>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label class="form-label">Featured Product Section</label>
                    <select class="form-select"><option>On</option><option>Off</option></select>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label class="form-label">Latest Product Section</label>
                    <select class="form-select"><option>On</option><option>Off</option></select>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label class="form-label">Popular Product Section</label>
                    <select class="form-select"><option>On</option><option>Off</option></select>
                    </div>
                </div>

                <!-- Meta Section -->
                <h5 class="mt-4">Meta Section</h5>
                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" value="ShopBop - Best Online Store">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" value="fashion, clothes, shopbop, ecommerce">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea class="form-control" rows="3">Welcome to ShopBop, your #1 online fashion store.</textarea>
                </div>

                <!-- Featured Section -->
                <h5 class="mt-4">Featured Product Section</h5>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" value="Featured Products">
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" class="form-control" value="Our top picks just for you">
                </div>

                <!-- Latest Section -->
                <h5 class="mt-4">Latest Product Section</h5>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" value="Latest Products">
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" class="form-control" value="Check out our newest arrivals">
                </div>

                <!-- Popular Section -->
                <h5 class="mt-4">Popular Product Section</h5>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" value="Popular Products">
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" class="form-control" value="Most loved by our customers">
                </div>

                <!-- Newsletter -->
                <h5 class="mt-4">Newsletter Section</h5>
                <div class="mb-3">
                    <label class="form-label">Newsletter Text</label>
                    <input type="text" class="form-control" value="Subscribe to our Newsletter">
                </div>

                <button class="btn btn-primary">Update</button>
                </div>

                <!-- Banner Settings -->
                <div class="tab-pane fade" id="banner" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Login Page Banner</label>
                    <input type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Register Page Banner</label>
                    <input type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Checkout Page Banner</label>
                    <input type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cart Page Banner</label>
                    <input type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Category Page Banner</label>
                    <input type="file" class="form-control">
                </div>
                <button class="btn btn-primary">Update</button>
                </div>

                <!-- Payment -->
                <div class="tab-pane fade" id="payment" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Business Email</label>
                    <input type="email" class="form-control" value="payments@shopbop.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Bank Information</label>
                    <textarea class="form-control" rows="3">Bank: ABC Bank, Account: 123456789</textarea>
                </div>
                <button class="btn btn-primary">Update</button>
                </div>

                <!-- Scripts -->
                <div class="tab-pane fade" id="scripts" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Code before &lt;/head&gt; tag</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Code after &lt;body&gt; tag</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Code before &lt;/body&gt; tag</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-primary">Update</button>
                </div>
            </div>

        </main>
    </div>

</x-layout-admin-panel>