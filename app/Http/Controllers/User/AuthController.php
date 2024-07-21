<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller{
  public function index() {
    if (Auth::check()) {
      $scope = Auth::user()->scope;
      if($scope === 'user') {
        return redirect()->route('user.dashboard');
      } else {
        return redirect()->route('admin.dashboard');
      }
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

  public function changePassword() {
    return view('user.auth.changePassword');
  }

  public function updatePassword(Request $request) {
    Validator::make($request->all(),[
      'password' => 'required',
      'newPassword' => 'required|min:8|max:50',
      'confirmPassword' => 'required|min:8|max:50|same:newPassword',
    ])->validate();

    $id = Auth::user()->id;
    $password = $request->input('password');
    $newPassword = $request->input('newPassword');
    
    if(!Hash::check($password, Auth::user()->password)) {
      return redirect()->route('user.change_password')
        ->with('error', 'Password anda salah.');
    }

    $data = [
      'password' => Hash::make($newPassword)
    ];

    User::where('id', $id)
    ->update($data);
    
    return redirect()->route('user.change_password')
      ->with('success', 'Password berhasil diubah.');
  }

  public function logout() {
    Auth::logout();
    return redirect()->route('user.login');
  }
}
