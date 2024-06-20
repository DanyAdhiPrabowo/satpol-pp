<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller {
  public function index() {
    $userId = Auth::user()->id;
    $activities = Activity::where('user_id', $userId)
                          ->get();
    $data = [
      'activities' => $activities,
    ];

    return view('user.activities.index', $data);
  }
}
