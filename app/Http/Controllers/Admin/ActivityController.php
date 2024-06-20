<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    public function index() {
      $activities = DB::table('activities')
                      ->join('users', 'users.id', '=', 'activities.user_id')
                      ->where('users.status', 'active')
                      ->select('activities.*', 'users.name as username')
                      ->orderBy('activities.id', 'desc')
                      ->get();
      return view('admin.activities.index', ['activities' => $activities]);
    }

    public function create() {
      $users = User::where('scope', 'user')
                  ->where('status', 'active')
                  ->get();
      $data = [ 'users' => $users ];

      return view('admin.activities.create', $data);
    }

    public function store(Request $request) {
      Validator::make($request->all(),[
        'name'          => 'required|min:2|max:200',
        'user_id'       => 'required',
        'place'         => 'required',
        'date'          => 'required',
      ])->validate();

      $now = now()->format('Y-m-d');
      if ($request->get('date') < $now) {
        return redirect()->route('admin.activities.create')
                        ->with('error', 'Data gagal disimpan, tanggal tidak valid.')
                        ->withInput();
      }

      $data = [
        'name'  => $request->get('name'),
        'user_id' => $request->get('user_id'),
        'place' => $request->get('place'),
        'date' => $request->get('date')
      ];
      
      $save = Activity::create($data);

      return redirect()->route('admin.activities.create')
                      ->with('success', 'Data kegiatan berhasil disimpan.');
    }

    public function edit($id) {
      $activity = Activity::where('id', '=', $id)->firstOrFail();
      $users = User::where('scope', 'user')
                  ->where('status', 'active')
                  ->get();
      $data = [
        'activity' => $activity,
        'users' => $users
      ];
      return view('admin.activities.edit', $data);
    }

    public function update(Request $request, $id){
      Validator::make($request->all(),[
        'name'  => 'required|min:2|max:20',
        'user_id' => 'required',
        'place' => 'required',
        'date'  => 'required',
      ])->validate();

      $now = now()->format('Y-m-d');
      if ($request->get('date') < $now) {
        return redirect()->route('admin.activities.edit', ['id' => $id])
                         ->with('error', 'Data gagal disimpan, tanggal tidak valid.')
                         ->withInput();
      }
      $data = [
        'name'  => $request->get('name'),
        'user_id' => $request->get('user_id'),
        'place' => $request->get('place'),
        'date' => $request->get('date')
      ];
      Activity::where('id', $id)
              ->update($data);
      return redirect()->route('admin.activities.edit', ['id' => $id])
                      ->with('success', 'Data kegiatan berhasil diubah.');
    }

    public function destroy($id) {
      $activity = Activity::where('id', $id)
                          ->first();
      if ($activity === null) {
        return redirect()->route('admin.activities.index')
          ->with('error', 'Data kegiatan tidak ditemukan.');
      }
      if ($activity->status != 'active') {
        return redirect()->route('admin.activities.index')
          ->with('error', 'Data kegiatan tidak bisa dihapus.');
      }

      $activity->forceDelete();
      return redirect()->route('admin.activities.index')
        ->with('success', 'Data kegiatan berhasil dihapus.');
    }
}
