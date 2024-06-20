<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller{
  public function index() {
    if(Auth::check()){
      return redirect()->route('admin.dashboard');
    }
    return view('user.auth.index');
  }

  public function login(Request $request) {
    Validator::make($request->all(),[
      'email' => 'required|email',
      'password' => 'required',
    ])->validate();

    $email = $request->input('email');

    $user = User::where('email', $email)
                ->where('status', 'active')
                ->first();
    if ($user === null || $user->scope !== 'user') {
      return redirect()->route('user.login')
        ->with('error', 'Email atau password anda salah.');
    }

    $data = [
      'email'     => $email,
      'password'  => $request->input('password'),
    ];

    Auth::attempt($data);
    if (!Auth::check()) { 
      return redirect()->route('user.login')
        ->with('error', 'Email atau password anda salah.');
    }

    $session = [
      'name' => $user->name,
      'email' => $email,
    ];
    $request->session()->put('user', $session);
    
    return redirect()->route('user.dashboard');
  }

  public function logout() {
    Auth::logout();
    return redirect()->route('user.login');
  }
}
