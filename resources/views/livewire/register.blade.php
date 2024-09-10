<div>
    <x-guest-layout>
        <div class="py-md-5 py-4">

            <div class="text-center mb-5">
                <h3>Register Account</h3>
                <p class="text-muted">Get your free Vhato account now.</p>
            </div>
            <div>
                <!-- Show flash messages -->
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            </div>

            <form class="needs-validation" wire:submit.prevent="submit">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" wire:model.defer="email" placeholder="Enter email">
                    @error('email')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror " wire:model.defer="username" id="username" placeholder="Enter username">
                    @error('username')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="float-end">
                        <a href="{{ route('forgot.password') }}" class="text-muted">Forgot password?</a>
                    </div>
                    <label for="password" class="form-label">Password</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="{{ $showPassword ? 'text' : 'password' }}" class="form-control pe-5 @error('password') is-invalid @enderror" placeholder="Enter Password" id="password" wire:model.defer="password">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" wire:click="togglePasswordVisibility"><i class="ri-eye-fill align-middle"></i></button>
                    </div>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <p class="mb-0">By registering you agree to the Vhato <a href="#" class="text-primary">Terms of Use</a></p>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
                </div>
                {{-- <div class="mt-4 text-center">
                <div class="signin-other-title">
                    <h5 class="fs-14 mb-4 title">Sign up using</h5>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div>
                            <button type="button" class="btn btn-soft-info w-100"><i class="mdi mdi-facebook"></i> Facebook</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <button type="button" class="btn btn-soft-danger w-100"><i class="mdi mdi-google"></i> Google</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            </form><!-- end form -->

            <div class="mt-5 text-center text-muted">
                <p>Already have an account ? <a href="{{ route('index') }}" class="fw-medium text-decoration-underline">Login</a></p>
            </div>
        </div>
    </x-guest-layout>
</div>