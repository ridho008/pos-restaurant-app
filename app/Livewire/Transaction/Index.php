<?php

namespace App\Livewire\Transaction;

use App\Models\Transactions;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.transaction.index', [
            'transactions' => Transactions::get()
        ]);
    }
}
