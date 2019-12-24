<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Order;
use Auth;
class OrderController extends Controller
{
    public function postIndex(OrderRequest $r){
	 $obj = new Order;
	 $obj->name = $r['name'];
	 $obj->email = $r['email'];
	 $obj->phone = $r['phone'];
	 $obj->body = $_COOKIE['basket'];
	 $obj->user_id = (Auth::guest())?0:Auth::user()->id;
	 $obj->save();
	 setcookie('basket', '', time()-1, '/');
	 return redirect()->back();
	}
}
