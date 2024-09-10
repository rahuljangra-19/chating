<x-guest-layout>
    <div class="py-md-5 py-4 text-center">

        <div class="avatar-xl mx-auto">
            <div class="avatar-title bg-primary-subtle text-primary  text-primary h1 rounded-circle">
                <i class="bx bxs-user"></i>
            </div>
        </div>
        <div class="mt-4 pt-2">
            <h5>You are Logged Out</h5>
            <p class="text-muted fs-15">Thank you for using <span class="fw-semibold text-reset">Vhato</span></p>
            <div class="mt-4">
                <a href="{{ route('index') }}" class="btn btn-primary w-100 waves-effect waves-light">Sign In</a>
            </div>
        </div>
    </div>
</x-guest-layout>