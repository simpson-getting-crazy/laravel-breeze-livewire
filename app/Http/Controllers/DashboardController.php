<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'countUsers' => User::count(),
            'countPosts' => Post::count(),
            'countTotalRoutes' => count($this->getAllRouteList()),
            'countTotalMigrations' => DB::table('migrations')->count(),
        ]);
    }
}
