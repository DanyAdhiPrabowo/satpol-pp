<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
  public function index() {
    $activities = DB::table('activities')
                    ->join('users', 'users.id', '=', 'activities.user_id')
                    ->select('activities.*', 'users.name as username')
                    ->where('activities.status', 'done')
                    ->orderBy('activities.updated_at', 'DESC')
                    ->get();
                    
    $data = [
      'activities'  => $activities,
    ];
    return view('admin.reports.index', $data);
  }
  
  public function upload($id) {
    $activity = Activity::where('id', $id)
                        ->first();
    if ($activity === null) {
      return redirect()->route('admin.reports.index');
    }

    $data = [
      'activity' => $activity,
    ];
    return view('admin.reports.upload', $data);
  }

  public function store(Request $request, $id) {

    Validator::make($request->all(), [
      'image' => 'required'
    ])->validate();

    $activity = Activity::where('id', $id)
                        ->first();
    if ($activity === null) {
      return redirect()->route('admin.reports.upload');
    }

    $file = $request->file('image');
    $fileExtention = $file->extension();
    $fileName = $id.'.'.$fileExtention;
    $filePath = $request->file('image')->move('reports', $fileName);

    $activity->image = $fileName;
    $activity->save();

    return redirect()->route('admin.reports.index');
  }
}
