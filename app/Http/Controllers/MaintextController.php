<?php
namespace App\Http\Controllers;
use App\Maintext;
use App;
class MaintextController extends Controller
{
    public function getIndex($url = null){
	if(isset($_COOKIE['lang'])){
	 $lang = $_COOKIE['lang'];
	}else {
	 $lang = App::getLocale();
	}
	  $obj = Maintext::where('url', $url)->where('lang', $lang)->first();
	  
	  return view('static', compact('url', 'obj'));
	}
}
