<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
  public function index() {
    if(Auth::check()){
      return redirect()->route('admin.dashboard');
    }
    return view('auth.index');
  }

  public function login(Request $request) {
    Validator::make($request->all(),[
      'email' => 'required|email',
      'password' => 'required',
    ])->validate();

    $email = $request->input('email');

    $user = User::where('email', $email)
                ->first();
    if ($user === null || $user->scope !== 'admin') {
      return redirect()->route('admin.login')
        ->with('error', 'Email atau password anda salah.');
    }

    $data = [
      'email'     => $email,
      'password'  => $request->input('password'),
    ];

    Auth::attempt($data);
    if (!Auth::check()) { 
      return redirect()->route('admin.login')
        ->with('error', 'Email atau password anda salah.');
    }

    $session = [
      'name' => $user->name,
      'email' => $email,
    ];
    $request->session()->put('admin', $session);
    
    return redirect()->route('admin.dashboard');
  }

  public function logout() {
    Auth::logout();
    return redirect()->route('admin.login');
  }

}
