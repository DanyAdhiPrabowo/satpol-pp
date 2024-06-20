<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Activity;

class ReportController extends Controller {
  public function index() {
    $userId = Auth::user()->id;
    $activities = Activity::where('user_id', $userId)
                          ->where('status', 'active')
                          ->get();
    $data = [
      'activities' => $activities,
    ];

    return view('user.reports.index', $data);
  }

  public function upload(Request $request, $id) {
    Validator::make($request->all(), [
      'image' => 'required'
    ])->validate();

    $activity = Activity::where('id', $id)
                        ->first();
    if ($activity === null) {
      return redirect()->route('user.report.upload');
    }

    $file = $request->file('image');
    $fileExtention = $file->extension();
    $fileName = $id.'.'.$fileExtention;
    $filePath = $request->file('image')->move('reports', $fileName);

    $activity->image = $fileName;
    $activity->status = 'done';
    $save = $activity->save();

    return redirect()->route('user.report.index');
  }
  
}
