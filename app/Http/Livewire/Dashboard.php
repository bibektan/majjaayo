<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class Dashboard extends Component
{
    public $orders;
    public $delivery;
    public $orderId;
    public $isOpen = false;

    public function pickId($id){
        $this->orderId = $id;
        $this->isOpen = true;
    }
    public function changeStatus($stat){
        $or = Order::find(intval($this->orderId));
        $or->status = $stat;
        $or->save();
        $this->orders = Order::latest()->get();
        $this->isOpen = false;
    }

    // public function updatedDelivery($val){
    //     $valArr = explode(',', $val);
    //     $or = Order::find(intval($valArr[1]));
    //     $or->status = $valArr[0];
    //     $or->save();
    // }
    public function mount($orders){
        $this->orders = $orders;
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
