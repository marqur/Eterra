<?php 

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;



class HomepageController extends Controller
{

     public function getHomepage() 
     {
    	$products_slider = DB::table('covers')->limit(8)
                ->get();
        $last_herb = DB::table('herbs')->orderBy('created_at', 'desc')->first();
        $featured_products = DB::table('products')->where('istaknut_proizvod','=',1)->get();        
        $response = [
            'products-slider' => $products_slider,
            'last_herb' => $last_herb,
            'featured_products' => $featured_products

        ];
        return response()->json($response);
    }


}