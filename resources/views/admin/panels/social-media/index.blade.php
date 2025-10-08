<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />

    <div class="container-fluid py-4">
        <div class="mb-3">
            <h5 class="fw-bold"><i class="bi bi-share me-2"></i> Social Media</h5>
            <p class="text-muted small mb-4">
                Manage your social links below. Leave any field blank if you don’t want it to appear on your website.
            </p>
        </div>

        <form method="POST" action="{{ route('admin.socialMedia.update') }}">
            @csrf
            @method("PUT")
            @foreach ($socials as $social)
                <x-text-input-social-media-url
                    :id="$social->name"
                    :name="$social->name"
                    :icon="$social->icon"
                    :social_name="$social->name"
                    :url="$social->url"
                />                   
            @endforeach
                   
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Save Social Links
                </button>
            </div>
        </form>

    </div>
</x-layout-admin-panel>