<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />

    <div class="container-fluid py-4">
        <h4 class="mb-3"><i class="bi bi-file-earmark-text me-2"></i>Page Setting</h4>

        <ul class="nav nav-tabs" id="pageSettingsTab" role="tablist">

            <li class="nav-item" role="presentation">
                <a href="{{ route('admin.pageSettings.index', ['tab' => 'about_us']) }}" 
                   class="nav-link text-dark {{ $tab == 'about_us' ? 'active' : '' }}" id="about-tab" role="tab">About Us</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('admin.pageSettings.index', ['tab' => 'faq']) }}" 
                   class="nav-link text-dark {{ $tab == 'faq' ? 'active' : '' }}" id="faq-tab" role="tab">FAQ</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('admin.pageSettings.index', ['tab' => 'contact']) }}" 
                   class="nav-link text-dark {{ $tab == 'contact' ? 'active' : '' }}" id="contact-tab" role="tab">Contact</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content border border-top-0 p-4 bg-white" id="pageSettingsTabContent">

            <div class="tab-pane fade {{ $tab == 'about_us' ? 'show active' : '' }}" id="about" role="tabpanel">
                <form method="POST" action="{{ route('admin.pageSettings.updateAboutUs') }}">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="about_us_title" class="form-label">Page Title</label>
                        <input id="about_us_title" name="about_us_title" type="text" class="form-control" 
                               placeholder="Enter About Us title" value="{{ old('about_us_title', $page_settings->about_us_title ?? '') }}">
                        <x-error-input-message field="about_us_title"/>
                    </div>

                    <div class="mb-3">
                        <label for="about_us_content" class="form-label">Page Content</label>
                        <textarea id="about_us_content" name="about_us_content" 
                                  data-editor class="form-control" rows="4" 
                                  placeholder="Enter About Us content...">{{ old('about_us_content', $page_settings->about_us_content ?? '') }}</textarea>
                        <x-error-input-message field="about_us_content"/>
                    </div>

                    <div class="mb-3">
                        <label for="about_us_meta_title" class="form-label">Meta Title</label>
                        <input id="about_us_meta_title" name="about_us_meta_title" type="text" 
                               class="form-control" placeholder="Enter meta title"
                               value="{{ old('about_us_meta_title', $page_settings->about_us_meta_title ?? '') }}">
                        <x-error-input-message field="about_us_meta_title"/>
                    </div>

                    <div class="mb-3">
                        <label for="about_us_meta_keywords" class="form-label">Meta Keywords</label>
                        <textarea id="about_us_meta_keywords" name="about_us_meta_keywords" class="form-control" rows="2" 
                                 placeholder="Enter meta keywords" >{{ old('about_us_meta_keywords', $page_settings->about_us_meta_keywords ?? '') }}</textarea>
                        <x-error-input-message field="about_us_meta_keywords"/>
                    </div>

                    <div class="mb-3">
                        <label for="about_us_meta_description" class="form-label">Meta Description</label>
                        <textarea id="about_us_meta_description" name="about_us_meta_description" for="about_us_meta_description" class="form-control" rows="3" 
                              placeholder="Enter meta description">{{ old('about_us_meta_description', $page_settings->about_us_meta_description ?? '') }}</textarea>
                        <x-error-input-message field="about_us_meta_description"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

            <!-- FAQ -->
            <div class="tab-pane fade {{ $tab == 'faq' ? 'show active' : '' }}" id="faq" role="tabpanel">
                <form method="POST" action="{{ route("admin.pageSettings.updateFAQ") }}">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="faq_title" class="form-label">Page Title</label>
                        <input id="faq_title" name="faq_title" type="text" class="form-control" 
                            placeholder="Enter FAQ title" value="{{ old('faq_title', $page_settings->faq_title) }}">
                        <x-error-input-message field="faq_title"/> 
                    </div>

                    <div class="mb-3">
                        <label for="faq_subtitle" class="form-label">Page Subtitle</label>
                        <input id="faq_subtitle" name="faq_subtitle" type="text" 
                            class="form-control" placeholder="Enter FAQ title" 
                            value="{{ old('faq_title', $page_settings->faq_subtitle) }}">
                        <x-error-input-message field="faq_subtitle"/>
                    </div>

                    <div class="mb-3">
                        <label for="faq_meta_title" class="form-label">Meta Title</label>
                        <input id="faq_meta_title" name="faq_meta_title" type="text" class="form-control" 
                            placeholder="Enter meta title" value="{{ old('faq_meta_title', $page_settings->faq_meta_title) }}">
                        <x-error-input-message field="faq_meta_title"/>
                    </div>

                    <div class="mb-3">
                        <label for="faq_meta_keywords" class="form-label">Meta Keywords</label>
                        <textarea id="faq_meta_keywords" name="faq_meta_keywords" class="form-control" rows="2"  
                            placeholder="Enter meta keywords">{{ old('faq_meta_keywords', $page_settings->faq_meta_keywords) }}</textarea>
                        <x-error-input-message field="faq_meta_keywords"/>
                    </div>

                    <div class="mb-3">
                        <label for="faq_meta_description" class="form-label">Meta Description</label>
                        <textarea id="faq_meta_description" name="faq_meta_description" class="form-control" rows="3" 
                            placeholder="Enter meta description">{{ old('faq_meta_description', $page_settings->faq_meta_description) }}</textarea>
                        <x-error-input-message field="faq_meta_description"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                <form>        
            </div>

            <!-- Contact -->
            <div class="tab-pane fade {{ $tab == 'contact' ? 'show active' : '' }}" id="contact" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Page Title</label>
                    <input type="text" class="form-control" placeholder="Enter Contact page title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" placeholder="Enter meta title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" placeholder="Enter meta keywords">
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <input type="text" class="form-control" placeholder="Enter meta description">
                </div>

                <button class="btn btn-primary">Update</button>
            </div>

        </div>
    </div>
</x-layout-admin-panel>