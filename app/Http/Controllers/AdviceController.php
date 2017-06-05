<?php 

namespace App\Http\Controllers;

use App\Advice;
use App\Mail\Savet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class AdviceController extends Controller{

	public function addAdvice(Request $request)
    {

    	$advice = new Advice();


    	$advice->name = $request->input('name');
    	$advice->email = $request->input('email');
    	$advice->poruka = $request->input('poruka');
        
    	$advice->save();
        

        $last_advice_id = $advice->id;

        $advice_send = Advice::where('id', $last_advice_id)->first();
 


        // Ship order...

        Mail::to('majkicmarko29@yahoo.com')->send(new Savet($advice_send));


    	return response()->json([

    		'Advices' => $advice
    		], 201);
    }

}