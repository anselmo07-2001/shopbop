@props(["field" => null])


@error($field)
    <div class="text-danger mt-1">{{ $message }}</div>
@enderror