<x-layout-admin-panel>
    <div class="container-fluid"> 
        <x-flash-message session_name="success" />
        <x-flash-message session_name="error" />    

        <main class="p-4">
            <h3 class="mb-4">Website Settings</h3>
                
            <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark {{ $active_tab === 'branding' ? 'active' : '' }} " id="logo-tab" 
                        data-bs-toggle="tab" data-bs-target="#logo" type="button" role="tab">Logo & Favicon</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark {{ $active_tab === 'footer' ? 'active' : '' }}" id="footer-tab" 
                        data-bs-toggle="tab" data-bs-target="#footer" type="button" role="tab">Footer</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark {{ $active_tab === 'message-settings' ? 'active' : '' }}" 
                        id="message-tab" data-bs-toggle="tab" data-bs-target="#message" type="button" role="tab">Message Settings</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark {{ $active_tab === 'products-display-limit' ? 'active' : '' }}" 
                        id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab">Products</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-dark {{ $active_tab === 'home-settings' ? 'active' : '' }}" 
                        id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab">Home Settings</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark {{ $active_tab === 'payments' ? 'active' : '' }}" 
                        id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab">Payment</button>
                </li>
            </ul>
   
            <div class="tab-content border border-top-0 p-4 bg-white" id="settingsTabContent">
                <!-- Logo & Favicon -->
                <div class="tab-pane fade {{ $active_tab === 'branding' ? 'show active' : '' }}" id="logo" role="tabpanel">
                    <form action="{{ route('admin.branding.update') }}?tab=branding" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Current Logo</label><br>
                            <img src="{{ asset('storage/branding/' . $global_page_settings->logo ) }}" alt="Logo" class="img-thumbnail mb-2" style="max-width:150px;">
                            <input name="logo" type="file" class="form-control">
                            @error('logo')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Current Favicon</label><br>
                            <img src="{{ asset('storage/branding/' . $global_page_settings->favicon ) }}" alt="Favicon" class="img-thumbnail mb-2" style="max-width:50px;">
                            <input name="favicon" type="file" class="form-control">
                            @error('favicon')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="tab-pane fade {{ $active_tab === 'footer' ? 'show active' : '' }}" id="footer" role="tabpanel">
                    <form action="{{ route('admin.footer.update') }}?tab=footer" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Newsletter Section</label>
                            <select name="show_newsletter" class="form-select">
                                <option {{ $page_settings->show_newsletter == 1 ? "selected" : "" }} value="1">On</option>
                                <option {{ $page_settings->show_newsletter == 0 ? "selected" : "" }} value="0">Off</option>
                            </select>
                            @error('show_newsletter')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Copyright</label>
                            <input name="footer_copyright" type="text" class="form-control" value="{{ $page_settings->footer_copyright }}">
                            @error('footer_copyright')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Address</label>
                            <input name="contact_address" type="text" class="form-control" value="{{ $page_settings->contact_address }}">
                            @error('contact_address')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Email</label>
                            <input name="contact_email" type="email" class="form-control" value="{{ $page_settings->contact_email }}">
                            @error('contact_email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Phone</label>
                            <input name="contact_phone" type="text" class="form-control" value="{{$page_settings->contact_phone}}">
                            @error('contact_phone')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Map (iframe)</label>
                            <textarea name="contact_map_iframe" class="form-control" rows="3">{{ $page_settings->contact_map_iframe }}</textarea>
                            @error('contact_map_iframe')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

                <!-- Message Settings -->
                <div class="tab-pane fade {{ $active_tab === 'message-settings' ? 'show active' : '' }}" id="message" role="tabpanel">
                    <form action="{{ route('admin.messageSettings.update') }}?tab=message-settings" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Contact Email Address</label>
                            <input name="contact_email" type="email" class="form-control" value="{{ $page_settings->contact_email }}">
                            @error('contact_email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Email Subject</label>
                            <input name="email_subject" type="text" class="form-control" value="{{ $page_settings->email_subject }}">
                            @error('email_subject')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Email Thank You Message</label>
                            <textarea name="email_thankyou_message" class="form-control" rows="3">{{ $page_settings->email_thankyou_message }}</textarea>
                            @error('email_thankyou_message')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Forgot Password Message</label>
                            <textarea name="forgot_password_message" class="form-control" rows="3">{{ $page_settings->forgot_password_message }}</textarea>
                            @error('forgot_password_message')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

                <!-- Products -->
                <div class="tab-pane fade {{ $active_tab === 'products-display-limit' ? 'show active' : '' }}" id="products" role="tabpanel">
                    <form action="{{ route('admin.productsDisplayLimit.update') }}?tab=products-display-limit" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Home Page Featured Products</label>
                            <input name="featured_products_limit" type="number" class="form-control" value="{{ $page_settings->featured_products_limit }}">
                            @error('featured_products_limit')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Home Page Latest Products</label>
                            <input name="latest_products_limit" type="number" class="form-control" value="{{ $page_settings->latest_products_limit }}">
                            @error('latest_products_limit')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Home Page Popular Products</label>
                            <input name="popular_products_limit" type="number" class="form-control" value="{{ $page_settings->popular_products_limit }}">
                            @error('latest_products_limit')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

                <!-- Home Settings -->
                <div class="tab-pane fade {{ $active_tab === 'home-settings' ? 'show active' : '' }}" id="home" role="tabpanel">
                    <form action="{{ route('admin.homeSettings.update') }}?tab=home-settings" method="post">
                        @csrf
                        <h5 class="mt-2">Section On/Off</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Service Section</label>
                                <select name="show_service_section" class="form-select">
                                    <option {{ $page_settings->show_service_section == 1  ? "selected" : "" }} value="1">On</option>
                                    <option {{ $page_settings->show_service_section == 0  ? "selected" : "" }} value="0">Off</option>
                                </select>
                                @error('show_service_section')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Welcome Section</label>
                                <select name="show_welcome_product_section" class="form-select">
                                    <option {{ $page_settings->show_welcome_product_section == 1  ? "selected" : "" }} value="1">On</option>
                                    <option {{ $page_settings->show_welcome_product_section == 0  ? "selected" : "" }} value="0">Off</option>
                                </select>
                                @error('show_welcome_product_section')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Featured Product Section</label>
                                <select name="show_featured_product_section" class="form-select">
                                    <option {{ $page_settings->show_featured_product_section == 1  ? "selected" : "" }} value="1">On</option>
                                    <option {{ $page_settings->show_featured_product_section == 0  ? "selected" : "" }} value="0">Off</option>
                                </select>
                                @error('show_featured_product_section')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Latest Product Section</label>
                                <select name="show_latest_product_section" class="form-select">
                                    <option {{ $page_settings->show_latest_product_section == 1  ? "selected" : "" }} value="1">On</option>
                                    <option {{ $page_settings->show_latest_product_section == 0  ? "selected" : "" }} value="0">Off</option>
                                </select>
                                @error('show_latest_product_section')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Popular Product Section</label>
                                <select name="show_popular_product_section" class="form-select">
                                    <option {{ $page_settings->show_popular_product_section == 1  ? "selected" : "" }} value="1">On</option>
                                    <option {{ $page_settings->show_popular_product_section == 0  ? "selected" : "" }} value="0">Off</option>
                                </select>
                                @error('show_popular_product_section')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <h5 class="mt-4">Meta Section</h5>
                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input name="meta_title" type="text" class="form-control" value="{{ $page_settings->meta_title }}">
                            @error('meta_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <input name="meta_keywords" type="text" class="form-control" value="{{ $page_settings->meta_keywords }}">
                            @error('meta_keywords')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $page_settings->meta_description }}</textarea>
                            @error('meta_description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <h5 class="mt-4">Featured Product Section</h5>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input name="featured_products_title" type="text" class="form-control" value="{{ $page_settings->featured_products_title }}">
                            @error('featured_products_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subtitle</label>
                            <input name="featured_products_subtitle" type="text" class="form-control" value="{{ $page_settings->featured_products_subtitle }}">
                            @error('featured_products_subtitle')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Latest Section -->
                        <h5 class="mt-4">Latest Product Section</h5>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input name="latest_products_title" type="text" class="form-control" value="{{ $page_settings->latest_products_title }}">
                            @error('latest_products_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subtitle</label>
                            <input name="latest_products_subtitle" type="text" class="form-control" value="{{ $page_settings->latest_products_subtitle }}">
                            @error('latest_products_subtitle')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Popular Section -->
                        <h5 class="mt-4">Popular Product Section</h5>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input name="popular_products_title" type="text" class="form-control" value="{{ $page_settings->popular_products_title }}">
                            @error('popular_products_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subtitle</label>
                            <input name="popular_products_subtitle" type="text" class="form-control" value="{{ $page_settings->popular_products_subtitle }}">
                            @error('popular_products_subtitle')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Newsletter -->
                        <h5 class="mt-4">Newsletter Section</h5>
                        <div class="mb-3">
                            <label class="form-label">Newsletter Text</label>
                            <input name="newsletter_title" type="text" class="form-control" value="{{ $page_settings->newsletter_title }}">
                            @error('newsletter_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>

                <!-- Payment -->
                <div class="tab-pane fade {{ $active_tab === 'payments' ? 'show active' : '' }}" id="payment" role="tabpanel">
                    <form action="{{ route('admin.payment.update') }}?payments" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Business Email</label>
                            <input name="business_email" type="email" class="form-control" value="{{ $page_settings->business_email }}">
                            @error('business_email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Information</label>
                            <textarea name="bank_detail" class="form-control" rows="3">{{ $page_settings->bank_detail }}</textarea>
                            @error('bank_detail')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>              
            </div>

        </main>
    </div>

</x-layout-admin-panel>