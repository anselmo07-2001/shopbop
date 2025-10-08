@props(["id" => "", "icon" => "", "social_name" => "", "name" => "", "url" => ""])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label"><i class="{{ $icon }} me-1"></i> {{ $social_name }}</label>
    <input id="{{ $id }}" 
           name="{{ $name }}" 
           type="text" 
           class="form-control"
           value="{{ old($name, $url) }}"
           placeholder="Enter {{ $social_name }} URL">
    <x-error-input-message :field="$name"/>
</div>