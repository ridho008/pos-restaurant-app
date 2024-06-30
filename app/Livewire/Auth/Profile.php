<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Livewire\Component;

class Profile extends Component
{
    public $name, $email, $password, $password_confirmation;
    public ?User $user;

    public function save() {
        
        if(!isset($this->password) && !isset($this->password_confirmation)) {
            $validate = $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => '',
                'password_confirmation' => '',
            ]);
            // kosongkan field input
            unset($validate['password'], $validate['password_confirmation']);
        } else {
            $validate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
        ]);

        } 
        
        $this->user->update($validate);
        $this->reset();
        $this->mount();

    }

    public function mount() {
        $user= auth()->user();
        $this->user = User::find(auth()->id());
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
