<?php

namespace App\Livewire\Forms;

use App\Models\Transactions;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionForm extends Form
{
    public $desc, $customer_id, $items, $price, $done = false;
    public ?Transactions $transaction;

    public function setTransaction(Transactions $transaction) {
        $this->transaction = $transaction;

        $this->customer_id = $transaction->customer_id;
        $this->price = $transaction->price;
        $this->desc = $transaction->desc;
        $this->items = $transaction->items;
        $this->done = $transaction->done;
    }

    public function store() {
        $validate = $this->validate([
            'customer_id' => '',
            'items' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'done' => 'required',
        ]);

        Transactions::create($validate);
        $this->reset();
    }

    public function updated() {
        $validate = $this->validate([
            'customer_id' => 'required',
            'items' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'done' => 'required',
        ]);

        $this->transaction->update($validate);
        $this->reset();
    }
}
