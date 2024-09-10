<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $email;
    public $username; 
    public $password;
    public $showPassword = false;

    protected $rules = [
        'email' => ['required', 'unique:users,email'],
        'username' => ['required'],
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'The email address is required.',
        'email.exists' => 'The email address does not exist in our records.',
        'password.required' => 'The password is required.',
        'password.min' => 'The password must be at least 6 characters.',
    ];

    public function submit()
    {
        $this->validate();

        $user = new User();
        $user->name = $this->username;
        $user->nickname = generateNickname($this->username);
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->image = config('user.user.image');
        $user->back_image = config('user.user.back_image');
        $user->save();
        session()->flash('message', 'User successfully registered.');

        Auth::login($user);
        if (Auth::check()) {
            return redirect()->route('profile');
        }
    }


    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.register');
    }
}
