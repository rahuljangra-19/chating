<div>
    <x-guest-layout>
        <x-slot name="title">Login
        </x-slot> 
        <div class="py-md-5 py-4">
            <div class="text-center mb-5">
                <h3>Welcome Back !</h3>
                <p class="text-muted">Sign in to continue to Vhato.</p>
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
            <form wire:submit.prevent="submit">
                @csrf
                <div class="mb-3">
                    <label for="email">Email or Username</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" wire:model.defer="email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
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

                <div class="form-check form-check-info fs-16">
                    <input class="form-check-input" type="checkbox" id="remember-check" wire:model="remember_me">
                    <label class="form-check-label fs-14" for="remember-check">
                        Remember me
                    </label>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary w-100" type="submit">Log In</button>
                </div>
                <div class="mt-4 text-center">
                    <div class="signin-other-title">
                        <h5 class="fs-14 mb-4 title">Sign in with</h5>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div>
                                <a href="{{ url('login/google') }}" class="btn btn-soft-danger w-100"><i class="mdi mdi-google"></i> </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <a href="{{ url('login/facebook') }}"  class="btn btn-soft-info w-100"><i class="mdi mdi-facebook"></i> </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <a href="{{ url('login/instagram') }}" class="btn btn-soft-danger w-100"><i class="mdi mdi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form><!-- end form -->

            <div class="mt-5 text-center text-muted">
                <p>Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-decoration-underline"> Register</a></p>
            </div>
        </div>
    </x-guest-layout>
</div>