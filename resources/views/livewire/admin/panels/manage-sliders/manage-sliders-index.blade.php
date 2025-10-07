<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="fa fa-images me-2"></i>Slider</h4>
            <a class="btn btn-dark" href="{{ route('admin.manageSliders.create') }}">
                <i class="bi bi-plus-circle me-1"></i> Add Sliders
            </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row mb-3 align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <label class="form-label me-2 mb-0">Show</label>
                    <select wire:model.live="perPage" class="form-select form-select-sm w-auto d-inline">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <span class="ms-2">entries</span>
                </div>
                <div class="col-md-6 text-end">
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="search" 
                        class="form-control form-control-sm w-auto d-inline" 
                        placeholder="Search by heading.."
                    >
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
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

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Photo</span>
                                </div>
                            </th>

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
                                    <span class="me-1">Subtitle</span>
                                    <button wire:click="sortBy('subtitle')" class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">Button Text</th>    
                            <th scope="col">Button Url</th>                            
                            <th scope="col">Position</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset("/carousel/" . $slider->image_path) }}" 
                                         alt="slider photo"
                                         style="width: 150px; height: 150px; object-fit: cover;" >
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->subtitle }}</td>
                                <td>{{ $slider->button_text }}</td>
                                <td>{{ $slider->button_link }}</td>
                                <td>{{ $slider->text_align }}</td>
                                <td class="">
                                    <a href="{{ route('admin.manageSliders.edit', $slider->id ) }}" 
                                       class="btn btn-sm btn-warning mb-2"><i class="fa fa-edit"></i> Edit</a>
                                    <x-delete-modal 
                                        id="{{ $slider->id }}" 
                                        name="{{ $slider->title }}" 
                                        action="{{ route('admin.manageSliders.destroy', $slider->id) }}"
                                    /> 
                                </td>
                            </tr>               
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-5 text-muted">
                                    <i class="fa-solid fa-bell-slash me-2"></i> No sliders found matching your criteria.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div> 


    <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Showing {{ $sliders->firstItem() }} to {{ $sliders->lastItem() }} of {{ $sliders->total() }} entries
        </small>
        
        <nav>
            {{ $sliders->links("pagination::livewire-bootstrap") }}
        </nav>
    </div>
</div>