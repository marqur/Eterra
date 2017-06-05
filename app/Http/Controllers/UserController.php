<?php 

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;




class UserController extends Controller{


	   public function getUserInfo()
{
    try {

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

        return response()->json(['token_expired'], $e->getStatusCode());

    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

        return response()->json(['token_invalid'], $e->getStatusCode());

    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

        return response()->json(['token_absent'], $e->getStatusCode());

    }

    // the token is valid and we have found the user via the sub claim
    return response()->json(compact('user'));
}



	public function signup(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required'
			]);

		$user = new User([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'last_name' => $request->input('last_name'),
			'password' => bcrypt($request->input('password'))		
			]);
		$user->save();	
		return response()->json([
			'message' => 'Uspesno kreiran korisnik.'
			], 201);
			
	}

	public function signin(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
			]);
		$credentials = $request->only('email', 'password');
		try {
			if (!$token = JWTAuth::attempt($credentials)) {
				return response()->json([
					'error' => 'Pogrešan email ili password!'
					], 401);
			}
		} catch (JWTException $e) {
			return response()->json([
				'error' => 'Neuspešno kreiran token!'
				], 500);
		}
		return response()->json([
			'token' => $token,
			], 200);
	}


	public function putUserInfo(Request $request, $id) 
 	{
    	$user = User::find($id);
    	if(!$user){
    		return response()->json(['message' => 'User not found.'], 404);
    	}
    	$user->name = $request->input('name');
    	$user->last_name = $request->input('last_name');
    	$user->telefon = $request->input('telefon');
    	$user->adresa= $request->input('adresa');
    	$user->grad = $request->input('grad');

    	$user->save();
    	return response()->json(['user' => $user], 200);
    }
}