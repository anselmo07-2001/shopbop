<x-layout-admin-panel>
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
                <div class="mb-3">
                    <label class="form-label">Page Title</label>
                    <input type="text" class="form-control" placeholder="Enter About Us title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Page Content</label>
                    <textarea data-editor class="form-control" rows="4" placeholder="Enter About Us content..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" placeholder="Enter meta title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <textarea class="form-control" rows="2" placeholder="Enter meta keywords"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter meta description"></textarea>
                </div>

                <button class="btn btn-primary">Update</button>
            </div>

            <!-- FAQ -->
            <div class="tab-pane fade {{ $tab == 'faq' ? 'show active' : '' }}" id="faq" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Page Title</label>
                    <input type="text" class="form-control" placeholder="Enter FAQ title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" placeholder="Enter meta title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <textarea class="form-control" rows="2" placeholder="Enter meta keywords"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter meta description"></textarea>
                </div>

                <button class="btn btn-primary">Update</button>
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