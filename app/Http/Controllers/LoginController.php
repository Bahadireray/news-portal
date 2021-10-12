<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $attributes = $request->only(['email', 'password', 'remember']);

            $user = User::query()->where('email', $attributes['email'])->first();

            if (!$user) {
                throw new \Exception('Kullanıcı bulunamadı!' . $attributes['email']);
            }

            if (Hash::check($attributes['password'], $user->password)) {
                Log::info(sprintf('Kullanıcı başarılı bir şekilde giriş yaptı. %s', $user->email));

                auth()->login($user);
            } else {
                Log::info(sprintf('Hatalı giriş denemesi. %s', $user->email));
            }
        }

        return view('login');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $attributes = $request->only(['first_name', 'last_name', 'email', 'password', 'password_confirmation']);

            $validator = Validator::make($attributes, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

            if (! $validator->fails()) {
                $user = new User();
                $user->fill($attributes);
                $user->password = Hash::make($attributes['password']);

                if ($user->save()) {
                    auth()->login($user);
                }
            }
        }

        return view('register');
    }

    public function logout()
    {
        if (!auth()->guest()) {
            auth()->logout();
        }

        return redirect('login');
    }
}
