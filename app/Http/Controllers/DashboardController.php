<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

  public function index() {
    $userCounts = User::where('scope', 'user')
                      ->selectRaw('COUNT(id) as total')
                      ->selectRaw('COUNT(CASE WHEN status = "active" THEN 1 END) as active')
                      ->selectRaw('COUNT(CASE WHEN status = "inactive" THEN 1 END) as inactive')
                      ->first();
    $now = now()->format('Y-m-d');
    $activities = DB::table('activities')
                    ->join('users', 'users.id', '=', 'activities.user_id')
                    ->select('activities.*', 'users.name as username')
                    ->where('users.status', 'active')
                    ->where('activities.status', 'active')
                    ->where('activities.date', '>=', $now)
                    ->orderBy('activities.date', 'ASC')
                    ->get();
    $data = [
      'userTotal' => $userCounts->total,
      'userActive' => $userCounts->active,
      'userInactive' => $userCounts->inactive,
      'activities'  => $activities,
    ];
    return view('dashboards.index', $data);
  }

}
