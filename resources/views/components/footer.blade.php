<!-- Newsletter Section -->

@if ($global_page_settings->show_newsletter)
  <section class="home-newsletter py-5 bg-dark">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6">
          <div class="text-center">
            <form action="#" method="post">
              <h2 class="mb-4 text-white">{{ $global_page_settings->newsletter_title }}</h2>
              <div class="input-group">
                <input type="email" class="form-control" placeholder="Enter your email" required>
                <button class="btn btn-warning" type="submit">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

<!-- Footer -->
<footer class="footer-bottom py-3 bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        © {{ date('Y') }} {{ $global_page_settings->footer_copyright }}
      </div>
    </div>
  </div>
</footer>