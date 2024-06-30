<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = 'admin@admin.com', $password = 'admin123'; // agar inputan halaman login terisi
    public function login() {
        $validate = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($validate)) {
            $this->redirect(route('home',true));
        }
    }

    public function render()
    {
        // if(!config('db.connection')) {
        //     $data = ['message' => 'database not connection.'];
        //     $this->redirect(route('login',true));
        // }
        return view('livewire.auth.login');
    }
}
