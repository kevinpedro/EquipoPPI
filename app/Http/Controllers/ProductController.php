<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view ('admin.products.index')->with(compact('products')); //listado
    }

    public function create()
    {
    	return view ('admin.products.create'); //formulario de registro
    }

    public function store(Request $request)
    {

    	//validar
    	$rules = 
    	[
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	
    	$this -> validate($request, $rules);
    	//registrar el nuevo producto en la db
    	//dd($request->all());

    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	$product->save();//Insert

    	return redirect('/admin/products');
    }

        public function edit($id)
    {

    	$product = Product::find($id);
    	return view ('admin.products.edit')->with(compact('product')); //formulario de edición
    }

    public function update(Request $request, $id)
    {
      	$rules = 
    	[
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	
    	$this -> validate($request, $rules);
    	//registrar el nuevo producto en la db
    	//dd($request->all());

    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	$product->save();//Update

    	return redirect('/admin/products');
    }

    public function destroy($id)
    {
    	//registrar el nuevo producto en la db
    	//dd($request->all());

    	$product = Product::find($id);
    	$product->delete();//Update

    	return back();
    }
}
