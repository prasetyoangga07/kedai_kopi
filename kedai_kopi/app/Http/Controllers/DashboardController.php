<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboard_service) {}

    public function index()
    {
        $data = $this->dashboard_service->getData();
        return view('dashboard.index', $data);
    }
}
