<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amortization;

class AmortizationController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'schedule_date' => 'required|date',
            'state' => 'required|string',
            'amount' => 'required|numeric',
            'project_id' => 'required|exists:projects,id',
        ]);

        $amortization = Amortization::create($data);

        return response()->json([
            'message' => 'Amortization created successfully',
            'data' => $amortization,
        ], 201);
    }

    public function getAll()
    {
        $amortizations = Amortization::all();

        return response()->json([
            'data' => $amortizations,
        ], 200);
    }
}

