<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Messenger;

class MessengersAuthController extends Controller
{

    /**
     * Login user and return a token
     */
    public function login(Request $request)
    {
        $user = Messenger::where('phone', $request->phone)->where('pin', $request->pin)->enabled()->first();

        if(!is_null($user)) {
            $token = $this->guard()->fromUser($user);
            return response()->json(['status' => 'success', 'user' => $user], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    /**
     * Logout User
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    /**
     * Get authenticated user
     */
    public function user()
    {
        $user = Messenger::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Refresh JWT token
     */
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    /**
     * Return auth guard
     */
    private function guard()
    {
        return Auth::guard('mobile');
    }
}
