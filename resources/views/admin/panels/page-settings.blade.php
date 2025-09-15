<x-layout-admin-panel>
    <div class="container-fluid py-4">
        <h4 class="mb-3"><i class="bi bi-file-earmark-text me-2"></i>Page Setting</h4>

        <ul class="nav nav-tabs" id="pageSettingsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">About Us</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab">FAQ</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">Contact</button>
            </li>
        </ul>

        <div class="tab-content border border-top-0 p-4 bg-white" id="pageSettingsTabContent">
               
            <div class="tab-pane fade show active" id="about" role="tabpanel">
                <div class="mb-3">
                <label class="form-label">Page Title</label>
                <input type="text" class="form-control" placeholder="Enter About Us title">
                </div>
                <div class="mb-3">
                <label class="form-label">Page Content</label>
                <textarea class="form-control" rows="4" placeholder="Enter About Us content..."></textarea>
                </div>
                <div class="mb-3">
                <label class="form-label">Current Banner Photo</label><br>
                <img src="https://via.placeholder.com/800x200.png?text=About+Us+Banner" alt="Banner" class="img-thumbnail mb-2" style="max-width:100%;">
                </div>
                <div class="mb-3">
                <label class="form-label">Change Banner Photo</label>
                <input type="file" class="form-control">
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

            
            <div class="tab-pane fade" id="faq" role="tabpanel">
                <div class="mb-3">
                <label class="form-label">Page Title</label>
                <input type="text" class="form-control" placeholder="Enter FAQ title">
                </div>
                <div class="mb-3">
                <label class="form-label">Current Banner Photo</label><br>
                <img src="https://via.placeholder.com/800x200.png?text=FAQ+Banner" alt="Banner" class="img-thumbnail mb-2" style="max-width:100%;">
                </div>
                <div class="mb-3">
                <label class="form-label">Change Banner Photo</label>
                <input type="file" class="form-control">
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
             
            <div class="tab-pane fade" id="contact" role="tabpanel">
                <div class="mb-3">
                <label class="form-label">Page Title</label>
                <input type="text" class="form-control" placeholder="Enter Contact page title">
                </div>
                <div class="mb-3">
                <label class="form-label">Current Banner Photo</label><br>
                <img src="https://via.placeholder.com/800x200.png?text=Contact+Banner" alt="Banner" class="img-thumbnail mb-2" style="max-width:100%;">
                </div>
                <div class="mb-3">
                <label class="form-label">Change Banner Photo</label>
                <input type="file" class="form-control">
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