<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads, ImageTrait;

    private $user;
    public $email;
    public $phone;
    public $location;
    public $password;
    public $about;
    public $showPassword = false;
    public $image;
    public $back_image;

    protected $rules = [
        'email' => ['nullable', 'unique:users,email'],
        'location' => ['required'],
        'phone' => ['required', 'integer'],
        'password' => 'nullable|min:6',
        'image' => 'image|max:1024', // 1MB Max
        'back_image' => 'image|max:1024', // 1MB Max
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

        $user = User::find(Auth::id());
        if ($this->email) {
            $user->email = $this->email;
        }

        if ($this->image) {
            $user->image =  $this->resizeImage($this->image);
        }
        if ($this->back_image) {
            $user->back_image = $this->resizeImage($this->back_image);
        }
        if ($this->password) {

            $user->password = Hash::make($this->password);
        }
        $user->phone =  $this->phone;
        $user->location = $this->location;
        $user->about = $this->about;
        $user->is_profile_completed = 1;
        $user->save();
        session()->flash('message', 'Your profile updated.');

        // Delete all files within a folder (but not the folder itself)
        File::cleanDirectory(storage_path('livewire-temp'));
        
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }
    public function render()
    {
        $user = Auth::user();

        return view('livewire.profile', ['user' => $user]);
    }
}
