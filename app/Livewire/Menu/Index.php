<?php

namespace App\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class Index extends Component
{
    public $search;
    public $photo;
    protected $listeners = [
        'reload' => '$refresh'
    ];
    public int $num = 1;
    public function render()
    {
        return view('livewire.menu.index', [
            'menus' => Menu::when($this->search, function($menu) {
            $menu->where('name', 'like', '%'. $this->search)
            ->orWhere('type', 'like', '%'. $this->search);
        })->get()
    ]);
    }
}
