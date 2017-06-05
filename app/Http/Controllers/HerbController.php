<?php 

namespace App\Http\Controllers;

use App\Herb;
use Illuminate\Http\Request;



class HerbController extends Controller
{

     public function getHerbs() 
     {
    	$herbs = Herb::all();
    	$response = [
    		'herbarijum' => $herbs
    	];
    	return response()->json($response);
    }


}