@props(["title" => "", "viewAllLink" => "#", "inputs" => [], 
        "action" => "#"])

<div class="card shadow-sm">
    
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>{{ $title }}</h5>
      <a href="{{ $viewAllLink }}" class="btn btn-sm btn-dark">
        <i class="bi bi-list-ul me-1"></i> View All
      </a>
    </div>

    <div class="card-body">
      <form action="{{ $action }}" method="POST">
        @csrf
        @method("PUT")
        @foreach ($inputs as $input)
            <div class="mb-3 row">
            <label for="{{ $input['labelFor'] }}" class="col-sm-2 col-form-label fw-bold">{{ $input["labelName"] }}</label>
            <div class="col-sm-10">
                <input type="{{ $input['type'] }}" class="form-control" id="{{ $input['id'] }}" name="{{ $input['name'] }}" value="{{ $input["value"] }}" required>
                @error($input['name'])
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            </div>     
        @endforeach
        <div class="d-flex justify-content-start">
          <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle me-1"></i> Update
          </button>
        </div>
      </form>
    </div>

</div>

