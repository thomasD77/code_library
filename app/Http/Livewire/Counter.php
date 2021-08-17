<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $quan = 0;

    public function mount()
    {
        $quan = Session::get('cart')->totalQuantity;
        $this->quan = $quan;

    }

    public function increment()
    {
        $this->quan++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
