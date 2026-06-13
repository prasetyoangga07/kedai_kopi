<?php

namespace App\Http\Controllers;

use App\Models\Apriori;
use App\Services\AprioriService;

class AprioriController extends Controller
{
    public function __construct(private AprioriService $apriori_service){}

    public function generate()
    {   
        return $this->apriori_service->generateRules();
    }

    public function index()
    {
        $rules = Apriori::all()->count();
        return view('apriori.index', compact('rules'));
    }
}
