<?php

namespace App\Services;

class DashboardService
{
    public function __construct(
        protected ReportService $report_service,
        protected AprioriService $apriori_service
    ) {}

    public function getData()
    {
        $report = $this->report_service->getData();
        $apriori = $this->apriori_service->getData();

        return [
            'totalCust' => $report['totalCust'],
            'totalLoyalCust' => $report['totalLoyalCust'],
            'totalTransaction' => $report['totalTransaction'],
            'currentMonthRevenue' => $report['currentMonthRevenue'],
            'topConfidence' => $apriori['topConfidence'],
            'topRules' => $apriori['topRules'],
            'growth' => $report['growth'],
            'topMenu' => $report['topMenu'],
            'topCust' => $report['topCust'],
            'label' => $report['label'],
            'revenues' => $report['revenues'],
        ];
    }
}