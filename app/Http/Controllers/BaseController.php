<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
 public function getIndex(){
   return view('index');
 }
}