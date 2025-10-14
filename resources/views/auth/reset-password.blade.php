<x-layout metaTitle="ShopBop - Reset Password">    

    <div class="container mt-5 card shadow-sm rounded-4 p-5">
        <h3 class="mb-3">Reset Password</h3>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ request('email') }}">

            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="password" 
                      class="form-control mt-2" required style="font-size: 14px;">
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control mt-2" required style="font-size: 14px;">

                <x-error-input-message field="email"/>
                <x-error-input-message field="password"/>
            </div>
            
            <button type="submit" class="btn btn-success">Reset Password</button>
        </form>
    </div>

</x-layout>