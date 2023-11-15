<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getMain() {
        $hello = 'Hello World';
        $weekDays = ['Segunda','Terça','Quarta','Quinta'];
        $users = $this->getAllUsers();

        return view('general.home', compact('hello','weekDays','users'));
    }

    protected function getAllUsers() {
        $users = DB::table('users')
            ->get();
        return $users;
    }
}
