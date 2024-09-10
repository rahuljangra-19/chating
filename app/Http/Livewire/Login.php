<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember_me;
    public $showPassword = false;

    protected $rules = [
        'email' => 'required|string',
        'password' => 'required|min:6',
    ];

    public function submit()
    {
        $this->validate();
        $login = $this->email;
        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([$type => $this->email, 'password' => $this->password], $this->remember_me)) {
            // Flash a success message to the session
            session()->flash('message', 'Login successful!');

            // Redirect to the dashboard
            return redirect()->route('dashboard');
        } else {
            // Flash an error message to the session
            session()->flash('error', 'These credentials do not match our records.');
        }
    }


    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }


    public function render()
    {
        return view('livewire.login');
    }
}
