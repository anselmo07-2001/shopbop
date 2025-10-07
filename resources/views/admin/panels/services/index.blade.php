<x-layout-admin-panel>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />

    <div class="container-fluid py-4">
        <livewire:admin.panels.services.services-management-index />
    </div>
</x-layout-admin-panel>