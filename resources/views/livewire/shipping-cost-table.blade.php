<div class="card shadow-sm mb-4">
    <div class="card-header bg-light">
        <h5 class="mb-0"><i class="bi bi-table"></i> View Shipping Costs</h5>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Country Name</th>
            <th scope="col">Country Amount</th>
            <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries_shipping_cost as $shipping_cost)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $shipping_cost->country->country_name }}</td>
                    <td>${{ $shipping_cost->amount }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>     
            @endforeach
        </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
                <div>
                    Showing {{ $countries_shipping_cost->firstItem() }} to {{ $countries_shipping_cost->lastItem() }} of {{ $countries_shipping_cost->total() }} result
                </div>

                <div>
                    {{ $countries_shipping_cost->links("pagination::livewire-bootstrap") }}
                </div>
        </div>
    </div>
    <div class="alert alert-danger mt-3 mb-0" role="alert">
        <i class="bi bi-exclamation-triangle"></i>
        If a country does not exist in the above list, the following "Rest of the World" shipping cost will be applied.
    </div>
    </div>
</div>
