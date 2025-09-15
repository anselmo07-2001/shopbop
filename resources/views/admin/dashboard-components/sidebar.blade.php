<nav class="col-md-2 col-lg-2 d-md-block bg-dark text-white p-3 min-vh-100">
    <h4 class="text-white mb-4">eCommerce PHP</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/dashboard') ? 'active bg-primary rounded' : '' }}" 
             href="{{ route('admin.dashboard') }}">
                <i class="fa fa-home me-2"></i> Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/website-setting') ? 'active bg-primary rounded' : '' }}" 
             href="{{ route('admin.websiteSetting') }}">
                <i class="fa fa-cog me-2"></i> Website Settings
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/shop-setting') ? 'active bg-primary rounded' : '' }}" 
             href="admin-shopSettings.html">
                <i class="fa fa-store me-2"></i> Shop Settings
          </a>
        </li>

        <!-- Products -->
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/product-management') ? 'active bg-primary rounded' : '' }}" 
             href="{{ route('admin.productManagement') }}">
                <i class="fa fa-box me-2"></i> Product Management
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white mb-2" 
             href="admin-orderManagement.html">
                <i class="fa fa-tags me-2"></i>Order Management
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mb-2" 
             href="admin-manageSliders.html">
                <i class="fa fa-star me-2"></i>Manage Sliders
          </a>
        </li>

        <!-- Orders -->
        <li class="nav-item">
          <a class="nav-link text-white mb-2" 
             href="admin-services.html">
                <i class="fa fa-shopping-cart me-2"></i>Services
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mb-2" 
             href="admin-faq.html">
                <i class="fa fa-truck me-2"></i>FAQ
          </a>
        </li>

        <!-- CMS -->
        <li class="nav-item">
          <a class="nav-link text-white mb-2" 
             href="admin-registeredCustomer.html">
                <i class="fa fa-sliders-h me-2"></i>Registered Customers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mb-2" 
             href="admin-pageSetting.html">
                <i class="fa fa-file-alt me-2"></i>Page Settings
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mb-2" 
             href="admin-socialMedia.html">
                <i class="bi bi-share me-2"></i>Social Media
          </a>
        </li>

        <!-- Users -->
        <li class="nav-item">
          <a class="nav-link text-white mb-2" 
             href="admin-subscriber.html">
               <i class="fa fa-users me-2"></i>Subscriber
          </a>
        </li>

    </ul>
</nav>