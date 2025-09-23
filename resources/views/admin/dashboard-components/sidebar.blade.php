<nav class="col-md-2 col-lg-2 d-md-block bg-dark text-white p-3 min-vh-100  collapse show">
    <h4 class="text-white mb-4" style="margin-left: 0.5rem">ShopBop</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/dashboard') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.dashboard') }}">
                <i class="fa fa-home me-2"></i> Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/website-setting') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.websiteSetting') }}">
                <i class="fa fa-cog me-2"></i> Website Settings
          </a>
        </li>

        @php
          $shopActive = request()->routeIs("admin.shopSetting.*");
        @endphp
        <li class="nav-item">
          <a class="nav-link text-white mb-2 sidebar-link d-flex justify-content-between align-items-center hover-primary 
             {{ $shopActive ? 'active bg-primary rounded' : '' }}" data-bs-toggle="collapse" href="#shopSettingsMenu" 
              role="button" aria-expanded="{{ $shopActive ? 'true' : 'false' }}" aria-controls="shopSettingsMenu">
            
              <span><i class="fa fa-store me-2"></i> Shop Settings</span>
              <i class="fa fa-chevron-down small text-white chevron-icon"></i>
          </a>

          <div class="collapse ps-3 {{ $shopActive ? 'show' : '' }}" id="shopSettingsMenu">
              <ul class="nav flex-column small">
                  <li class="nav-item">
                      <a class="nav-link text-white mb-1 sidebar-link {{ request()->routeIs('admin.shopSetting.size.*') ? 'active bg-primary rounded' : '' }} hover-primary" 
                         href="{{ route('admin.shopSetting.size.index') }}">
                          <i class="fa fa-ruler me-2"></i> Size
                      </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white mb-1 sidebar-link {{ request()->routeIs('admin.shopSetting.color.*') ? 'active bg-primary rounded' : '' }} hover-primary" 
                       href="{{ route('admin.shopSetting.color.index') }}">
                      <i class="fa fa-palette me-2"></i> Color
                    </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white mb-1 sidebar-link {{ request()->routeIs('admin.shopSetting.country.*') ? 'active bg-primary rounded' : '' }} hover-primary" 
                         href="{{ route('admin.shopSetting.country.index') }}">
                        <i class="fa fa-flag me-2"></i> Country
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white mb-1 sidebar-link {{ request()->routeIs('admin.shopSetting.topLevelCatory.*') ? 'active bg-primary rounded' : '' }} hover-primary" 
                         href="{{ route('admin.shopSetting.shippingCost.index') }}">
                        <i class="fa fa-shipping-fast me-2"></i> Shipping Cost
                      </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white mb-1 sidebar-link {{ request()->is('admin/shop-setting/top-level-category') ? 'active bg-primary rounded' : '' }} hover-primary" 
                        href="{{ route('admin.shopSetting.topLevelCategory.index') }}">
                        <i class="fa fa-sitemap me-2"></i> Top Level Category
                     </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white mb-1 sidebar-link {{ request()->is('admin/shop-setting/mid-level-category') ? 'active bg-primary rounded' : '' }} hover-primary" 
                      href="{{ route('admin.shopSetting.midLevelCategory') }}">
                        <i class="fa fa-list-ul me-2"></i> Mid Level Category
                      </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white mb-1 sidebar-link {{ request()->is('admin/shop-setting/end-level-category') ? 'active bg-primary rounded' : '' }} hover-primary"
                       href="{{ route('admin.shopSetting.endLevelCategory') }}">
                      <i class="fa fa-list me-2"></i> End Level Category
                    </a>
                  </li>
              </ul>
          </div>
        </li>


        <!-- Products -->
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/product-management') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.productManagement') }}">
                <i class="fa fa-box me-2"></i> Product Management
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/order-management') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.orderManagement') }}">
                <i class="fa fa-tags me-2"></i>Order Management
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/manage-sliders') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.manageSliders') }}">
                <i class="fa fa-star me-2"></i>Manage Sliders
          </a>
        </li>

        <!-- Orders -->
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/services') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.services') }}">
                <i class="fa fa-shopping-cart me-2"></i>Services
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/faq') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.faq') }}">
                <i class="fa fa-truck me-2"></i>FAQ
          </a>
        </li>

        <!-- CMS -->
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/registered-customers') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.registeredCustomers') }}">
                <i class="fa fa-sliders-h me-2"></i>Registered Customers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/page-settings') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.pageSettings') }}">
                <i class="fa fa-file-alt me-2"></i>Page Settings
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/social-media') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.socialMedia') }}">
                <i class="bi bi-share me-2"></i>Social Media
          </a>
        </li>

        <!-- Users -->
        <li class="nav-item">
          <a class="nav-link text-white mb-2 {{ request()->is('admin/subscriber') ? 'active bg-primary rounded' : '' }} hover-primary" 
             href="{{ route('admin.subscriber') }}">
               <i class="fa fa-users me-2"></i>Subscriber
          </a>
        </li>

    </ul>
</nav>