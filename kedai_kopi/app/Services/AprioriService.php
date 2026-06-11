<?php

namespace App\Services;

class AprioriService
{
    public function generateRules()
    {
        $output = [];
        $status = [];

        exec(
            "python " . base_path('../ml-service/apriori/generate_rules.py') . " 2>&1",
            $output,
            $status
        );

        return response()->json([
            'status' => $status,
            'output' => $output
        ]);
    }
}