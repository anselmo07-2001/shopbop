<x-layout-admin-panel>
    <div class="container-fluid py-4">
        <x-flash-message session_name="success" />
        <x-flash-message session_name="error" />    
     
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-arrows-fullscreen me-2"></i>Manage Sizes</h4>
            <button class="btn btn-dark">
                <i class="bi bi-plus-circle me-1"></i> Add New
            </button>
        </div>
               
        <div class="card shadow-sm border-0">
            <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <form method="GET" action="{{ route('admin.shopSetting.size') }}">
                        <label for="perPage" class="form-label me-2">Show</label>
                        <select name="perPage" id="perPage" class="form-select form-select-sm w-auto d-inline"
                                onchange="this.form.submit()">
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        <span class="ms-2">entries</span>
                    </form>
                </div>

                <div class="col-md-6 text-end">
                    <input type="text" class="form-control form-control-sm w-auto d-inline" placeholder="Search...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                    <th scope="col">
                        # 
                        <button class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up"></i>
                        </button>
                    </th>
                    <th scope="col">
                        Size Name 
                        <button class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up"></i>
                        </button>
                    </th>
                    <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sizes as $size)         
                        <tr>
                            <td>{{ $sizes->firstItem() + $loop->index }}</td>
                            <td>{{ $size->name }}</td>
                            <td class="text-center">  
                                <a href="{{ route('admin.sizeUpdateForm', $size->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>                            
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>                       
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="d-flex justify-content-between align-items-center my-3">
                <div>
                    Showing {{ $sizes->firstItem() }} to {{ $sizes->lastItem() }} of {{ $sizes->total() }} results
                </div>
                <div>
                    {{ $sizes->appends(['perPage' => $perPage])->links('pagination::custom') }}
                </div>
            </div>

            </div>
        </div>
    
    </div>
</x-layout-admin-panel>