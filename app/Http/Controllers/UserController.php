<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index(){
      $users = User::where('scope', 'user')
                    ->orderBy('id', 'desc')
                    ->get();
      return view('users.index', ['users' => $users]);
    }

    public function create(){
      return view('users.create');
    }

    public function store(Request $request) {
      Validator::make($request->all(), [
        'name'  => 'required|min:2|max:50',
        'email' => 'required|email|max:255|unique:users',
        'status'  => 'required',
      ])->validate();

      $data = [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'password' => Hash::make('password'),
        'status' => $request->get('status'),
      ];

      User::create($data);
      return redirect()->route('admin.users.create')
                      ->with('success', 'Data anggota berhasil disimpan.');
    }

    public function edit($id) {
      $user = User::find($id);
      $data = [
        'user' => $user
      ];
      return view('users.edit', $data);
    }

    public function update(Request $request, $id) {
      Validator::make($request->all(), [
        'name'  => 'required|min:2|max:50',
        'email' => 'required|email|max:255',
        'status'  => 'required',
      ])->validate();

      $email = Str::lower($request->get('email'));;
      $user = User::where('email', $email)->first();

      if (!empty($user) && $user->id !== $id) {
        return redirect()->route('admin.users.edit', ['id' => $id])
                        ->with('error', 'Email sudah digunakan.')
                        ->withInput();
      }

      $data = [
        'name' => $request->get('name'),
        'email' => $email,
        'status' => $request->get('status'),
      ];

      User::where('id', $id)
          ->update($data);
      return redirect()->route('admin.users.edit', ['id' => $id])
            ->with('success', 'Data user berhasil diubah.');
    }

    public function updateStatus($id) {
      $user = User::findOrFail($id);


      $user->status = ($user->status === 'active') ? 'inactive' : 'active';

      $user->save();

      return redirect()->route('admin.users.index')->with('success', 'Category successfully update.');
    }
}
