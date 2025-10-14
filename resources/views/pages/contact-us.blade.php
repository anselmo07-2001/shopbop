<x-layout :metaTitle="$contact_settings->contact_meta_title" :metaKeywords="$contact_settings->contact_meta_keywords"
          :metaDescription="$contact_settings->contact_meta_description">

    <section class="bg-light py-5">
        
        <div class="container">
            <x-flash-message session_name="success" />
            <x-flash-message session_name="error" />  
            
            <!-- Title -->
            <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">{{ $contact_settings->contact_title }}</h2>
                <p class="text-muted fs-6">
                    {{ $contact_settings->contact_subtitle }}
                </p>
            </div>
            </div>

            <div class="row g-4">
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h4 class="fw-bold mb-3">Send us a Message</h4>
                <form method="POST" action="{{ route('sendMessage') }}">
                    <div class="mb-3">
                        <div class="g-recaptcha mb-3" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
                            <x-error-input-message field="g-recaptcha-response"/>
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        </div>

                    @csrf
                    <div class="mb-3">
                        <label for="full_name" class="form-label fw-semibold">Full Name</label>
                        <input name="full_name" id="full_name" type="text" value="{{ old('full_name') }}" 
                               class="form-control form-control-md rounded-3" placeholder="Enter your name">
                        <x-error-input-message field="full_name"/>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" 
                               class="form-control form-control-md rounded-3" placeholder="Enter your email">
                        <x-error-input-message field="email"/>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label fw-semibold">Phone Number</label>
                        <input id="phone_number" name="phone_number" type="tel" value="{{ old('phone_number') }}" 
                               class="form-control form-control-md rounded-3" placeholder="Enter your phone number">
                        <x-error-input-message field="phone_number"/>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label fw-semibold">Message</label>
                        <textarea id="message" name="message" class="form-control form-control-md rounded-3" rows="5" 
                                placeholder="Write your message">{{  old('message') }}</textarea>
                        <x-error-input-message field="message"/>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 rounded-3 fw-bold">
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
                <p class="mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i>{{ $contact_settings->contact_address }}</p>
                <p class="mb-2"><i class="bi bi-telephone-fill text-danger me-2"></i>{{ $contact_settings->contact_phone }}</p>
                <p class="mb-0"><i class="bi bi-envelope-fill text-danger me-2"></i>{{ $contact_settings->contact_email }}</p>
                </div>

                <!-- Map Placeholder -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <h4 class="fw-bold mb-3">Find Us on Map</h4>
                   <div class="bg-light d-flex align-items-center justify-content-center rounded-3" 
                        style="height: 250px; overflow: hidden;">     
                            {!! $contact_settings->contact_map_iframe !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</x-layout>