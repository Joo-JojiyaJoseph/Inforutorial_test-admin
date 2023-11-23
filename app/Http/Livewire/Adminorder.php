<?php

namespace App\Http\Livewire;

use App\Models\Admin\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Adminorder extends Component
{
    use WithPagination;

    public $orders = '';
    public $users = '';
    public $all,$new,$packed,$shipped,$delivered=0;
    public $status= "all";

    public function mount()
    {
        $this->users=User::all();
        $this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get()->paginate(10);
    }

    public function packed($id)
    {
    }
    public function shipped($id)
    {
    }
    public function delivered($id)
    {
    }

    public function render()
    {
        if($this->status=="all")
        {
            $this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get()->paginate(10);
        }
        elseif($this->status=="new")
        {
            $this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->where('orders.status','new')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get()->paginate(10);
        }
        elseif($this->status=="packed")
        {
            $this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->where('orders.status','packed')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get()->paginate(10);
        }
        elseif($this->status=="shipped")
        {
            $this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->where('orders.status','shipped')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get()->paginate(10);
        }
        elseif($this->status=="delivered")
        {
            $this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->where('orders.status','delivered')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get()->paginate(10);
        }
        $this->all=count($this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get());
        $this->new=count($this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->where('orders.status','new')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get());
        $this->packed=count($this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->where('orders.status','packed')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get());
        $this->shipped=count($this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->where('orders.status','shipped')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get());
        $this->delivered=count($this->orders = Order::join('addresses','addresses.id','=','orders.address_id')->where('orders.status','delivered')->Orderby('orders.id', 'desc')->select('orders.*','addresses.name','addresses.phone','addresses.email','addresses.housename','addresses.country','addresses.state','addresses.zipcode')->get());

        return view('livewire.adminorder');
    }
}
