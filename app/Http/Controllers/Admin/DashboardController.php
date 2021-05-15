<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::count();
        $clientsCount = Client::count();
        return view('admin.dashboard', compact('usersCount', 'clientsCount'));
    }
}
