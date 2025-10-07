<div class="container-fluid py-4">
   <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="mb-0"><i class="fa-solid fa-screwdriver-wrench"></i> Services</h4>
      <a class="btn btn-dark" href="admin-service-add.html">
            <i class="bi bi-plus-circle me-1"></i> Add Service
      </a>
   </div>

   <div class="row mb-3">
      <div class="col-md-6 d-flex align-items-center">
            <label class="form-label me-2 mb-0">Show</label>
            <select wire:model.live="perPage" class="form-select form-select-sm w-auto">
               <option value="10">10</option>
               <option value="25">25</option>
               <option value="50">50</option>
               <option value="2">2</option>
            </select>
            <span class="ms-2">entries</span>
      </div>
      <div class="col-md-6 text-end">
            <input type="text" wire:model.live.debounce.300ms="search" 
                   class="form-control form-control-sm w-auto d-inline" placeholder="Search...">
      </div>
   </div>

   <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
               <tr>
                  <th scope="col">
                     <div class="d-flex align-items-center">
                        <span class="me-1">#</span>
                        <button wire:click="sortBy('id')" class="btn btn-sm btn-link p-0 text-secondary">
                              <i class="bi bi-arrow-down-up"></i>
                        </button>
                     </div>
                  </th>
                  <th>Photo</th>
                  <th scope="col">
                     <div class="d-flex align-items-center">
                        <span class="me-1">Title</span>
                        <button wire:click="sortBy('title')" class="btn btn-sm btn-link p-0 text-secondary">
                              <i class="bi bi-arrow-down-up"></i>
                        </button>
                     </div>
                  </th>
                  <th scope="col">
                     <div class="d-flex align-items-center">
                        <span class="me-1">Content</span>
                        <button wire:click="sortBy('content')" class="btn btn-sm btn-link p-0 text-secondary">
                              <i class="bi bi-arrow-down-up"></i>
                        </button>
                     </div>
                  </th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($services as $service)
                  <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>
                        <img src="{{ asset('services/' . $service->photo) }}" alt="Slider" class="img-thumbnail" width="80">
                     </td>
                     <td>{{ $service->title }}</td>
                     <td>{{ $service->content }}</td>
                     <td>
                           <a href="#" class="btn btn-sm btn-primary">Edit</a>
                           <a href="#" class="btn btn-sm btn-danger">Delete</a>
                     </td>
                  </tr>     
               @empty
                  <tr>
                     <td colspan="8" class="text-center p-5 text-muted">
                        <i class="fa-solid fa-bell-slash me-2"></i> No services found matching your criteria.
                     </td>
                  </tr>
               @endforelse
            </tbody>
      </table>
   </div>
 
   <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} entries
        </small>
        
        <nav>
            {{ $services->links("pagination::livewire-bootstrap") }}
        </nav>
    </div>
</div>