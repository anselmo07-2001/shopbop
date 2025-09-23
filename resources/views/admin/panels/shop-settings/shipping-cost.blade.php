<x-layout-admin-panel>
    <div class="container-fluid">
        <x-flash-message session_name="success" />
        <x-flash-message session_name="error" />   

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add Shipping Cost</h5>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('admin.shopSetting.shippingCost.store') }}">
                @csrf
                <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="country" class="form-label">Select Country <span class="text-danger">*</span></label>
                    <select name="country_id" id="country" class="form-select">
                        <option selected disabled>Select a country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>          
                        @endforeach
                    </select>
                    @error("country_id")
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter amount">
                    @error("amount")
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success px-4">Add</button>
                </div>
                
                </div>
            </form>
            </div>
        </div>

        <livewire:shipping-cost-table/>
             
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="bi bi-globe"></i> Shipping Cost (Rest of the world)</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.shopSetting.shippingCostsAll.update') }}">
                    @csrf
                    @method("PUT")
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label for="restAmount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input name="amount" type="number" id="restAmount" class="form-control" placeholder="Enter amount" value="{{ $shipping_cost_all->amount }}">
                        </div>
                        @error("amount")
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary px-4">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</x-layout-admin-panel>