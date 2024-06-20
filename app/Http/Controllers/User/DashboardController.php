<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {
  public function index() {
    $data = [
      'userTotal' => 10,
      'userActive' => 8,
      'userInactive' => 2,
      'activities'  => [],
    ];
    return view('user.dashboards.index', $data);
  }
}
