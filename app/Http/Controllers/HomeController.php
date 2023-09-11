<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function order(){
        $name = Cookie::get('name');
        $mobile = Cookie::get('mobile');
        $address = Cookie::get('address');
        return view("order", compact(['name', 'mobile', 'address']));
    }

    public function orderSubmit(Request $req){

        $req->validate([
            'name' => 'required',
            'mobile' => 'required|integer',
            'address' => 'required'
        ]);

        $ip = '103.239.147.187'; //For static IP address get
        //$ip = request()->ip(); //Dynamic IP address get
        $data = \Location::get($ip);  
        $location = $data->latitude.",".$data->longitude;

        $user = new User();
        $order = new Order();

        $user->name = $req->name;
        $user->mobile = $req->mobile;
        $user->address = $req->address;
        $user->location = $location;
        $user->role = 'customer';
        $user->password = 'customer';
        $user->save();

        $order->user_id = $user->id;
        $order->product = "Lapsi Ko Achar";
        $order->quantity = 1;
        $order->price = 180;
        $order->delivery_charge = 20;
        $order->total_price = 200;
        $order->status = 'new';
        $order->save();

        $minutes = 262800; // 6 month
        Cookie::queue('name', $req->name, $minutes);
        Cookie::queue('mobile', $req->mobile, $minutes);
        Cookie::queue('address', $req->address, $minutes);
        // $response = new Response('majjaayo');
        // $response->withCookie(cookie('name', $req->name, $minutes));
        // $response->withCookie(cookie('mobile', $req->mobile, $minutes));
        // $response->withCookie(cookie('address', $req->address, $minutes));

        return redirect()->route('home')->with('success', 'Thanks so much for your order!');
    }

    public function login(){
        $username = 'bibek';
        $password = "Btiagm292511@&%";
        return view('login', compact(['username', 'password']));
    }

    public function dashboard(Request $req){
        // $users = User::where('name','=', $req->username)->get();
        $users = User::where('name','=', $req->username)->where('password','=',$req->password)->where('role','=','admin')->first();
        if($users !== null){
            $orders = Order::latest()->get();
            return view('dashboard', compact('orders'));
        }else{
            return redirect()->route('login')->with('error', "Username or Password doesn't match");
        }
    }
}
