<x-layout>
    <section class="bg-light py-5">
        <div class="container">
            <!-- Title -->
            <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Contact Us</h2>
                <p class="text-muted fs-6">
                Have questions? We’d love to hear from you!  
                Fill out the form below or reach us through our office details.
                </p>
            </div>
            </div>

            <div class="row g-4">
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h4 class="fw-bold mb-3">Send us a Message</h4>
                <form>
                    <div class="mb-3">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" class="form-control form-control-lg rounded-3" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                    <label class="form-label fw-semibold">Email Address</label>
                    <input type="email" class="form-control form-control-lg rounded-3" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                    <label class="form-label fw-semibold">Phone Number</label>
                    <input type="tel" class="form-control form-control-lg rounded-3" placeholder="Enter your phone number">
                    </div>
                    <div class="mb-3">
                    <label class="form-label fw-semibold">Message</label>
                    <textarea class="form-control form-control-lg rounded-3" rows="5" placeholder="Write your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg w-100 rounded-3 fw-bold">
                    Send Message
                    </button>
                </form>
                </div>
            </div>

            <!-- Office Info + Map -->
            <div class="col-lg-6">
                <!-- Office Info -->
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
                <h4 class="fw-bold mb-3">Our Office</h4>
                <p class="mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i>{{ $page_settings->contact_address }}</p>
                <p class="mb-2"><i class="bi bi-telephone-fill text-danger me-2"></i>{{ $page_settings->contact_phone }}</p>
                <p class="mb-0"><i class="bi bi-envelope-fill text-danger me-2"></i>{{ $page_settings->contact_email }}</p>
                </div>

                <!-- Map Placeholder -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <h4 class="fw-bold mb-3">Find Us on Map</h4>
                   <div class="bg-light d-flex align-items-center justify-content-center rounded-3" 
                        style="height: 250px; overflow: hidden;">     
                            {!! $page_settings->contact_map_iframe !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</x-layout>