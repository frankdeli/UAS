<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function sign(){
        $role = Role::all();
        $gender = Gender::all();
        return view('signup', ['role'=>$role, 'gender'=>$gender]);
    }

    public function login(){
        return view('signin');
    }

    public function sign_in(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home', app()->getLocale());   
        }
        return redirect('/signin')->with('loginError', 'Login Failed!');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        return view('success');
    }

    public function home(){
        $ebook = Ebook::paginate(8);
        return view('home', ['ebook' => $ebook]);
    }

    public function detail($id){
        $ebook = Ebook::find($id);
        dd($id);
        return view('detail', ['ebook' => $ebook]);
    }
}
