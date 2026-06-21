<?php

namespace App\Http\Controllers;

use App\Services\ReportService;

class ReportController extends Controller
{
    public function __construct(private ReportService $report_service) {}

    public function index()
    {
        $data = $this->report_service->getData();
        return view('dashboard.reports', $data);
    }
}
