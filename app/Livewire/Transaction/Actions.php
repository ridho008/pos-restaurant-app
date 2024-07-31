<?php

namespace App\Livewire\Transaction;

use App\Livewire\Forms\TransactionForm;
use App\Models\Customer;
use App\Models\Menu;
use Livewire\Component;

class Actions extends Component
{
    public $search;

    public $items = [];

    public TransactionForm $form;

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
        $item = $this->items[$key];

        // jika item quantitynya lebih dari 1 tambahkan saja qty dan pricenya
        if($item['qty'] > 1) {
            $hargaSatuan = $item['price'] / $item['qty'];
            $qtyTerbaru = $item['qty'] - 1;

            $this->items[$key]['qty'] = $qtyTerbaru;
            $this->items[$key]['price'] = $hargaSatuan * $qtyTerbaru;

        } else {
            unset($this->items[$key]);
        }
    }

    public function getTotalPrice() {
        // masukkan kedalam array
        $price = array_column($this->items, 'price');
        // jumlahkan array
        return array_sum($price); 
    }

    public function saveMenu() {

        $this->form->items = json_encode($this->items);
        $this->form->price = $this->getTotalPrice();
        // dd($this->items, $this->form->customer_id, $this->form->desc);
        $this->form->store();

        $this->redirect(route('transaction.index', true));
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
