<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome()
    {
    	$products = product::limit(20)->get();
    	return view ('welcome') -> with(compact('products'));
    }
}
