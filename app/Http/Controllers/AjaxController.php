<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class AjaxController extends Controller
{
    public function postIndex(){
	 $id = (int)$_POST['id'];
	 $obj = Product::find($id);
	 return view('ajax.product', compact('obj'));
	}
}
