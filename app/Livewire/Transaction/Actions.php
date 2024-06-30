<?php

namespace App\Livewire\Transaction;

use App\Models\Menu;
use Livewire\Component;

class Actions extends Component
{
    public function render()
    {
        return view('livewire.transaction.actions', ['menus' => Menu::get()->groupBy('type')]);
    }
}
