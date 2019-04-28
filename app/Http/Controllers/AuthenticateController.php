<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{
	public function authenticate(Request $request)
	{
		$rules = [
			'email'    => 'required|email',
			'password' => 'required'
		];

		$this->validate($request, $rules);

		$credentials = $request->only('email', 'password');

		try {
			if(!$token = JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'Los datos ingresados no son correctos'], 401);
			}
		} catch(JWTException $e) {
			return response()->json(['error' => 'No se ha podido crear el token'], 500);
		}

		$user = $request->user();

		return response()->json(compact('token', 'user'));
	}
}