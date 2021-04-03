<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        // Eloquent Crud
        //insert
        // $user = new User();
        // $user->name = 'Katzuki';
        // $user->email = 'aominechandaiki@gmail.com';
        // $user->password = \bcrypt('password');
        // $user->save();

        //delete
        // User::where('id',2)->delete();

        // update
        // User::where('id',3)->update(['name' =>'Katzz']);

        // Select all
        // $user = User::all();
        // return $user;


        // $data = ['name' => 'Katzuki Fushimi', 'email' => 'katzuki@gmail.com', 'password' =>\bcrypt('password')];
        // User::create($data);

        $user = User::all();
        return $user;
        return view('home');
    }
}
