<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use App\Models\Menu;
use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class Index extends Component
{
    public $search;
    protected $listeners = [
        'reload' => '$refresh'
    ];
    public int $num = 1;
    public function render()
    {
        return view('livewire.customer.index', [
            'customers' => Customer::when($this->search, function($menu) {
            $menu->where('name', 'like', '%'. $this->search)
            ->orWhere('contact', 'like', '%'. $this->search);
        })->get()
    ]);
    }
}
