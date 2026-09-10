<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DashboardService;

class DashboardController extends Controller
{
   

    public function __construct(private DashboardService $dashboardService)
    {
        
    }
    public function index()
    {
        $dashboardData = $this->dashboardService->getDashboardData();
        return view('dashboard.index', compact('dashboardData'));
    }
}
