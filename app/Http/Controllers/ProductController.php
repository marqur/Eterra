<?php 

namespace App\Http\Controllers;

use DB;
use App\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{

     public function getProducts() 
     {
    	$products = Product::with('filteri', 'jedinicaMere', 'kategorijaId', 'comments')->orderBy('naziv', 'asc')->get();
    	$response = [
    		'products' => $products
    	];
    	return response()->json($response);
    }

       public function getProduct($id) 
     {
    	$products = Product::with('filteri', 'jedinicaMere', 'kategorijaId', 'comments')->find($id);
        $random_products = Product::orderBy(DB::raw('RAND()'))->take(3)->get();

    	$response = [
    		'products' => $products,
            'random_products' => $random_products
    	];
    	return response()->json($response);
    }

}