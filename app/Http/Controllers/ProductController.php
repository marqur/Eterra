<?php 

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{

     public function getProducts() 
     {
    	$products = Product::all();
    	$response = [
    		'products' => $products
    	];
    	return response()->json($response);
    }

       public function getProduct($id) 
     {
    	$products = Product::find($id);
    	$response = [
    		'products' => $products
    	];
    	return response()->json($response);
    }


}