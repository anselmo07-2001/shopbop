<x-layout :metaTitle="$pageSetting->about_us_meta_title" :metaKeywords="$pageSetting->about_us_meta_keywords"
          :metaDescription="$pageSetting->about_us_meta_description">
    <section class="bg-light py-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">{{ $pageSetting->about_us_title }}</h2>
                </div>
            </div>

           {!! $pageSetting->about_us_content !!}
           
        </div>
    </section>
</x-layout>