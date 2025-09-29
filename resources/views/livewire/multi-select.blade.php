

<div class="col-6 col-md-3">
    <label class="form-label">{{ $label }}</label>
    <select multiple class="form-select" 
            wire:model="selected">
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>           
        @endforeach
    </select>
</div>