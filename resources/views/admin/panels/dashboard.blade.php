<x-layout-admin-panel>

  <h2 class="mb-4">Dashboard</h2>
  <div class="row g-4">
      
      <!-- Card Example -->
      <div class="col-md-3">
        <div class="card text-bg-primary text-center">
          <div class="card-body">
            <i class="fa fa-cart-shopping fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_products }}</h4>
            <p class="mb-0">Products</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-bg-danger text-center">
          <div class="card-body">
            <i class="fa fa-clipboard-list fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_pending_orders }}</h4>
            <p class="mb-0">Pending Orders</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-bg-success text-center">
          <div class="card-body">
            <i class="fa fa-check-circle fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_completed_orders }}</h4>
            <p class="mb-0">Completed Orders</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-bg-info text-center">
          <div class="card-body">
            <i class="fa fa-truck fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_completed_shipping }}</h4>
            <p class="mb-0">Completed Shipping</p>
          </div>
        </div>
      </div>

      <!-- More Cards -->
      <div class="col-md-3">
        <div class="card text-bg-warning text-center">
          <div class="card-body">
            <i class="fa fa-box-open fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_pending_shipping }}</h4>
            <p class="mb-0">Pending Shipping</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-bg-danger text-center">
          <div class="card-body">
            <i class="fa fa-user-friends fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_active_customers }}</h4>
            <p class="mb-0">Active Customers</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-bg-warning text-center">
          <div class="card-body">
            <i class="fa fa-user-plus fa-2x mb-2"></i>
            <h4 class="fw-bold">6</h4>
            <p class="mb-0">Subscribers</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-bg-success text-center">
          <div class="card-body">
            <i class="fa fa-map-marker-alt fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_available_shippings }}</h4>
            <p class="mb-0">Available Shippings</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-bg-success text-center">
          <div class="card-body">
            <i class="fa-solid fa-layer-group fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_top_categories }}</h4>
            <p class="mb-0">Top Categories</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-bg-info text-center">
          <div class="card-body">
            <i class="fa-solid fa-diagram-project fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_mid_categories }}</h4>
            <p class="mb-0">Mid Categories</p>
          </div>
        </div>
      </div>

      <!-- More Cards -->
      <div class="col-md-3">
        <div class="card text-bg-warning text-center">
          <div class="card-body">
            <i class="fa-solid fa-box-open fa-2x mb-2"></i>
            <h4 class="fw-bold">{{ $total_end_categories }}</h4>
            <p class="mb-0">End Categories</p>
          </div>
        </div>
      </div>

  </div>

</x-layout-admin-panel>

