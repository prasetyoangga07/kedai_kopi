<?php

namespace App\Services;

use App\Models\Apriori;

class AprioriService
{
    public function generateRules()
    {
        $python = base_path('../ml-service/.venv/Scripts/python.exe');
        $output = [];
        $status = [];

        exec(
            "\"$python\" " . base_path('../ml-service/apriori/generate_rules.py') . " 2>&1",
            $output,
            $status
        );

        return [
            'status' => $status,
            'output' => $output
        ];
    }

    public function getData()
    {
        $rules = Apriori::all();
        $topConfidence = number_format($rules->max('confidence') * 100, 2);

        // $totalProducts = $rules
        //     ->flatMap(function ($rule) {
        //         return array_merge(
        //             $rule->antecedents,
        //             $rule->consequents
        //         );
        //     })
        //     ->unique()
        //     ->count();

        $products = collect();

        foreach ($rules as $rule) {
            $products = $products
                ->merge($rule->antecedents)
                ->merge($rule->consequents);
        }

        $totalProducts = $products
            ->map(fn($item) => trim($item))
            ->unique()
            ->count();

        $topRules = $rules->sortByDesc('confidence')->first();

        return [
            'rules' => $rules,
            'totalRules' => $rules->count(),
            'topConfidence' => $topConfidence,
            'totalProducts' => $totalProducts,
            'topRules' => $topRules,
        ];
    }
}
