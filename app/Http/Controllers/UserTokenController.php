<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class UserTokenController extends Controller
{
    /**@var User $user */

    public function __invoke(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->get('email'))->first();

        if(!$user || !Hash::check($request->password, $user->password)) 
        {
            throw ValidationException::withMessages([
                'email' => ['EL Usuario ingresado no es valido']
            ]);
        }

        return response()->json([
            'msg'    => 'OK',
            'status' => 200,
            'token'  =>$user->createToken($request->email)->plainText,
        ]);
    }
}
