<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\VisitorCounter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        $yearlyVisitorChart = VisitorCounter::query()
            ->select([
                DB::raw("EXTRACT(YEAR FROM created_at) as year"),
                DB::raw("EXTRACT(MONTH FROM created_at) as month"),
                DB::raw("COUNT(*) as count")
            ])
            ->whereNotNull('created_at')
            ->groupBy(DB::raw("EXTRACT(YEAR FROM created_at), EXTRACT(MONTH FROM created_at)"))
            ->orderBy(DB::raw("year, month"))
            ->limit(12)
            ->get()
            ->toArray();

        return view('dashboard', [
            'countUsers' => User::count(),
            'countPosts' => Post::count(),
            'countTotalRoutes' => count($this->getAllRouteList()),
            'countTotalMigrations' => DB::table('migrations')->count(),
            'yearlyVisitorCharts' => $yearlyVisitorChart,
        ]);
    }
}
