<div>
    <x-guest-layout>
        <x-slot name="title">Login
        </x-slot>
        <div class="py-md-5 py-4">
            <div class="text-center mb-5">
                <h3>Welcome !</h3>
                <p class="text-muted">Please complete your Profile.</p>
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
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror " wire:model="image">
                    @error('image') <span class="error">{{ $message }}</span> @enderror
                    @if ($image)
                    Photo Preview:
                    <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="back_image" class="form-label">Back Image</label>
                    <input type="file" class="form-control @error('back_image') is-invalid @enderror" wire:model="back_image">
                    @error('back_image') <span class="error">{{ $message }}</span> @enderror
                    @if ($back_image)
                    Photo Preview:
                    <img src="{{ $back_image->temporaryUrl() }}" class="img-thumbnail">
                    @endif
                </div>

                @if(!$user->email)

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" wire:model.defer="email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                @endif

                @if($user->loginType == 2)
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="{{ $showPassword ? 'text' : 'password' }}" class="form-control pe-5 @error('password') is-invalid @enderror" placeholder="Enter Password" id="password" wire:model.defer="password">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" wire:click="togglePasswordVisibility"><i class="ri-eye-fill align-middle"></i></button>
                    </div>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
                @endif

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone" wire:model.defer="phone">
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="tel" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Enter location eg: city,state,country" wire:model.defer="location">
                    @error('location') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="about" class="form-label">About</label>
                    <textarea class="form-control @error('about') is-invalid @enderror" id="about" placeholder="about you ..." wire:model.defer="about"></textarea>
                    @error('about') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary w-100" type="submit">Update</button>
                </div>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelector('input[type="file"]').addEventListener('change', () => {
                    // Your custom JavaScript function here
                    console.log('File changed!');
                });
            });

        </script>
    </x-guest-layout>
</div>
