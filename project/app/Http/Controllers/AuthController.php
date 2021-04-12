<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
   	public function register(Request $request)
   	{
   		if($request->isMethod('get')){
        // if there is a user in the db. redirect to login form. otherwise register
        $data = User::all()->first();
        if ($data){
          return redirect()->route('login');
        }

   			return view('register');
   		}

   		$validator = validator::make($request->all(),[
            'email' => 'required|max:255',
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        User::create([
        	'name' => $request->username,
        	'email' => $request->email,
        	'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){

            return redirect()->route('data.create');
            // return 'worked';
        }

   	}

    public function logout()
    {
      Auth::logout();
      return redirect()->route('login');
    }

    public function login(Request $request)
    {

      if($request->isMethod('get')){
        // if there is no user in the db.. redirect to register a user otherwise contiue to login form
        $data = User::all()->first();
        if (!$data){
          return redirect()->route('register');
        }

        return view('login');
      }

      $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
          
          // return 'g';
          return redirect()->route('data.create');
            // return 'worked';
        }
    }
}
