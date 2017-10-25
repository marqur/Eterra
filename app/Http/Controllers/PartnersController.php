<?php 

namespace App\Http\Controllers;

use DB;
use App\Partner;
use Illuminate\Http\Request;



class PartnersController extends Controller
{

     public function getPartners() 
     {
    	$partners = Partner::all();
    	$response = [
    		'partners' => $partners
    	];
    	return response()->json($response);
    }


}