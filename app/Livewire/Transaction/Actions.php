<?php

namespace App\Livewire\Transaction;

use App\Models\Customer;
use App\Models\Menu;
use Livewire\Component;

class Actions extends Component
{
    public $search;

    public $items = [];

    // menambahkan menu kedalam tampilan (keranjang)
    public function addItemMenu(Menu $menu) {
        if(isset($this->items[$menu->name]) ) {
            $item = $this->items[$menu->name];
            $this->items[$menu->name] = [
            'qty' => $item['qty'] + 1,
            'price' => $item['price'] + $menu->price
        ];
        } else {
            $this->items[$menu->name] = [
            'qty' => 1,
            'price' => $menu->price
        ];
        }
    }

    public function removeItemMenu($key) {
        $item =$this->items[$key];

        if($item['qty'] > 1) {
            $hargaSatuan = $item['price'] / $item['qty'];
            $qtyTerbaru = $item['qty'] - 1;

            $this->items[$key]['qty'] = $qtyTerbaru;
            $this->items[$key]['price'] = $hargaSatuan * $qtyTerbaru;

        }
    }

    public function render()
    {
        return view('livewire.transaction.actions', ['menus' => Menu::when($this->search, function($menu) {
            $menu->where('name', 'like', '%'. $this->search)
            ->orWhere('type', 'like', '%'. $this->search);
        })->get()->groupBy('type'),
        'customers' => Customer::pluck('name', 'id')
        ]);
    }
}
