<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //load halaman login
	public function login()
	{
		return view('login', [
			'title' => 'Login'
		]);
	}
   //aksilogin
	public function authenticate(Request $request)
	{

        $credentials = $request->validate([
           'email' => ['required', 'email:dns'],
           'password' => ['required'],
       ]);

    	if (Auth::attempt($credentials)) { //mengecek validasi login
            $id = Auth::user()->id;
            // dd($id);
            // return redirect()->intended('dashboard/',[$id]);
            return redirect()->route('dashboard', $id);
        }	
        return back()->with('error','loginfailed');
    }
    //aksilogout
    public function actionlogout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
