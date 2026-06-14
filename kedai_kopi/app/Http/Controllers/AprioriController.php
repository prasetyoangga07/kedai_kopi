<?php

namespace App\Http\Controllers;

use App\Services\AprioriService;

class AprioriController extends Controller
{
    public function __construct(private AprioriService $apriori_service) {}

    public function generate()
    {
        $result = $this->apriori_service->generateRules();

        if ($result['status'] === 0) {
            return redirect()->back()->with('success', 'Apriori berhasil dijalankan');
        }

        return redirect()->back()->with('error', 'Apriori gagal dijalankan');
    }

    public function index()
    {
        $data = $this->apriori_service->getData();
        return view('apriori.index', $data);
    }
}
