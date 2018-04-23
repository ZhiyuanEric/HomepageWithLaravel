<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Request;
use Session;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(){
        if(Auth::user() != null) {
            return view('users.index');
        }
        return view('welcome');
    }

    public function alluser(){
        $users = DB::select('select * from users', [1]);

        return view('users.alluser', ['users' => $users]);
    }

    public function show($id){
        $user = User::findOrFail($id);
        $types = DB::select("select * from types where user_id = '$user->id'");
        return view('users.show', ['user' => $user], ['types' => $types]);
    }

    public function create(){
        if(Auth::user() != null) {
            return Redirect::to('/users');
        }
        return view('users.create');
    }

    public function store(){
//        $input = Request::all();
//        $user = User::create($input);
//        return $input;
        if(Auth::user() != null) {
            return Redirect::to('/users');
        }
        $user = new User;
        $user->nickname = Request::get('nickname');
        $user->email = Request::get('email');
        $user->password = bcrypt(Request::get('password'));

        $user->save();
        return redirect('users');
    }

    public function login(){
        if(Auth::user() != null) {
            return Redirect::to('/users');
        }
        return view('users.login');
    }

    public function check(){
        if(Auth::user() != null) {
            return Redirect::to('/users');
        }
// validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

// run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('/users/login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

//            dd(Auth::attempt($userdata));
            $result = DB::table('users')->where(['email' => Input::get('email'), 'password' => Input::get('password')])->exists();

            // attempt to do the login
            if (Auth::attempt($userdata)) {
//            if($result) {
//                $email = Request::get('email');
//                $user = DB::select("select * from users where email = '$email'");
//                Auth::loginUsingId(1);
                return Redirect::to('/users');
//                return redirect()->route('dashboard');
            }
            return Redirect::to('/users/login')->withErrors('Incorrect UserName or Password');
        }
    }

    public function update() {
        return view('users.index');
    }

    public function edit(){
        if(Request::ajax()) {
            $userId = Auth::user()->id;
            if(isset($_POST['typename'])) {
                $typename = Input::get('typename');
                if (DB::table('types')
                    ->where('type_name', "=", "$typename")
                    ->where('user_id', "=", "$userId")
                    ->exists()) {
                    return 1;
                }
                $newType = array(
                    array(
                        'type_name' => "$typename",
                        'user_id' => "$userId",
                    ),
                );
                DB::table('types')->insert($newType);
//                $type = DB::select("select distinct * from types where user_id = '$userId' and type_name = '$typename'");
                return ajax();
            }
            if (isset($_POST['deleteSiteId'])) {
                $siteId = $_POST['deleteSiteId'];
                $website = DB::select("select distinct * from websites where user_id = '$userId' and id = '$siteId'");
                $img =  $website[0]->image;
                if(file_exists($img)) {
                    @unlink($img);
                    DB::table('websites')->where('id', '=', "$siteId")->delete();
                    return ajax();
                } else {
                    return 0;
                }
            }
            if (Input::hasFile('Image')) {
                $image = Input::file('Image');
                $siteName = Input::get('name');
                $url = Input::get('address');
                $typeId = Input::get('typeId');
                if (DB::table('websites')
                    ->where('name', "=", "$siteName")
                    ->where('user_id', "=", "$userId")
                    ->exists()) {
                    return 1;
                } else {
                    //save image
                    $allowed_file_types = array('jpg','jpeg','png','gif');
                    $file_ext = $image->getClientOriginalExtension();
                    $file_size = $image->getClientSize();
                    $uploaddir = 'images/Websites/';
                    $filename = $siteName . "_" . $userId . "." . $file_ext;
                    if (!in_array($file_ext,$allowed_file_types)){
                        return 2;
                    } else if($file_size > 600000) {
                        return 3;
                    } else {
                        if($image->move($uploaddir, $filename)){
                            $newSite = array(
                                array(
                                    'type_id' => "$typeId",
                                    'name' => "$siteName",
                                    'user_id' => "$userId",
                                    'url' => "$url",
                                    'image' => "$uploaddir" . "$filename",
                                    'alexa' => '0',
                                ),
                            );
                            DB::table('websites')->insert($newSite);
                            return ajax();
                        } else {
                            return "failed";
                        }
                    }
                }
            } else {
                return "add a image";
            }
        }
    }

}

