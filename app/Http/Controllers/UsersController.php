<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(){
        $users = DB::select('select * from users', [1]);

        return view('users.index', ['users' => $users]);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(){
//        $input = Request::all();
//        $user = User::create($input);
//        return $input;

        $user = new User;
        $user->nickname = Request::get('nickname');
        $user->email = Request::get('email');
        $user->password = Request::get('password');

        $user->save();
        return redirect('users');
    }

}

