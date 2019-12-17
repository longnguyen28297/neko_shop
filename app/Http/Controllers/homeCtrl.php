<?php 
namespace App\Http\Controllers;

class homeCtrl extends Controller{
    function index(){
    	return view('home/home');
    }
    function shop(){
    	return view('home/shop');
    }
     function checkout(){
    	return view('home/checkout');
    }
    function cart(){
    	return view('home/cart');
    }
}


?>