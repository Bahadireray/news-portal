<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->isMethod('post')) {
            $attributes = $request->only(['type','first_name', 'last_name', 'email']);

            $user->fill($attributes);

            if ($user->save($attributes)) {
                session()->flash('message', 'Success!');

                return redirect(route('users.detail', $id));
            } else {
                session()->flash('message', 'An error while saving item.');
            }
        }

        return view('admin.user_edit', ['user' => $user]);
    }

    public function delete($id)
    {
        $user = User::query()->where('id', $id)->first();

        if ($user) {
            $user->delete();
        }

        return redirect(route('users.list'));
    }
}
