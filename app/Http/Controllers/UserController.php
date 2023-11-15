<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = $this->getAllUsers();
        return view('users.all', compact('users'));
    }

    public function viewUser($id)
    {
        $user = DB::table('users')
            ->where('id', '=', $id)
            ->first();

        return view('users.add', compact('user'));
    }

    public function deleteUser($id)
    {
        DB::table('users')
            ->where('id', '=', $id)
            ->delete();

        return redirect()->route('users');
    }

    public function storeUser(Request $request)
    {

        if ($request->user_id) {
            $request->validate([
                'name' => 'string|max:50',
                'password' => 'min:6'
            ]);

            User::where('id', $request->user_id)
                ->update([
                    'name' => $request->name,
                    'password' => Hash::make($request->password),
                    'address' => $request->address
                ]);
        } else {

            $request->validate([
                'email' => 'required|unique:users|email',
                'name' => 'string|max:50',
                'password' => 'min:6'
            ]);

            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }
        return redirect()->route('users');
    }

    public function addUser()
    {
        return view('users.add');
    }

    protected function getAllUsers()
    {
        $users = DB::table('users')
            ->get();
        return $users;
    }

}
