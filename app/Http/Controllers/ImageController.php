<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$images = $product->images;
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id)
    {
    		//guardar la img en nuestro proyecto
    		$file = request()->file('photo');
    		$path = public_path() . '/images/products';
    		$filename = uniqid() . $file->getClientOriginalName();
    		$moved = $file->move($path, $filename);

    		if($moved){
    		//crear un registro en la tabla product_image
    		$product_image = new ProductImage();
    		$product_image->image = $filename;
    		//$product_image->featured = ;
    		$product_image->product_id = $id;
    		$product_image->save();		
    		}
    		

    		return back();
    }	

    public function destroy(Request $request, $id)
    {
    	
   		ProductImage::where('product_id', $id)->delete();
    	//eliminar el archivo
    	$productimage = ProductImage::find(	$request->input('image_id'));
    	if(substr($productimage->image, 0, 4) === "http"){
    		$deleted = true;
    	}else {
    		$fullPath = public_path(). '/image/products/' . $productimage->image;
    		File::delete($fullPath);
    	}
    	
    	//eliminar el registro de la img en la db
    	if($deleted)
    	{
    		$productimage->delete();
    	}
    	return back();
    }
}
