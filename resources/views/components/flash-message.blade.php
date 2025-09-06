@props(["session_name" => null, "timer" => 5000])

@if(session($session_name))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, {{ $timer }} )"
        @class([
            "alert", 
            "text-center",
            "alert-success" => $session_name === "success",
            "alert-danger" => $session_name === "error"
        ])
        style="margin-bottom: 0"
    >
        {{ session($session_name) }}
    </div>
@endif