<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        $request->merge(['guard' => $request->guard]);
        $validator = Validator($request->all(), [
            'guard' => 'required|string|in:admin,web'
        ]);
        if (!$validator->fails()) {
            return response()->view('auth.login', ['guard' => $request->input('guard')]);
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }

    }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => "required|email",
            'password' => 'required|string|min:3',
            'remember' => 'required|boolean',
            'guard' => 'required|string|in:admin,web',
        ]);

        if (!$validator->fails()) {
            $crendentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
            if (Auth::guard($request->input('guard'))->attempt($crendentials, $request->input('remember'))) {
                return response()->json(['message' => 'Logged in successfully'], Response::HTTP_OK);
            } else {
                return response()->json(
                    ['message' => 'Login failed, check your credentials'],
                    Response::HTTP_BAD_REQUEST
                );
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    public function logout(Request $request)
    {
        $guard = auth('web')->check() ? 'web' : 'admin';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login', $guard);
    }
}
