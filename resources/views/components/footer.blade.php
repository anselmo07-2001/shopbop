<!-- Newsletter Section -->
<section class="home-newsletter py-5 bg-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <div class="text-center">
          <form action="#" method="post">
            <h2 class="mb-4 text-white">Subscribe to our Newsletter</h2>
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