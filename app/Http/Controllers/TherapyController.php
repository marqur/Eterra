<?php 

namespace App\Http\Controllers;

use DB;
use App\Therapy;
use Illuminate\Http\Request;



class TherapyController extends Controller
{

     public function getTherapies() 
     {
    	$therapies = Therapy::select('naziv', 'id')->get();
    	$response = [
    		'therapies' => $therapies
    	];
    	return response()->json($response);
    }

    public function getTherapy($id) 
     {
        $therapy = Therapy::with('products')->find($id);
        $response = [
            'therapy' => $therapy
        ];
        return response()->json($response);
    }


}