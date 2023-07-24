<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promoter;

class PromoterController extends Controller
{
    public function index()
    {
        $promoters = Promoter::all();
        return response()->json(['data' => $promoters], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'contact_number' => 'required|string',
            // Add other validation rules for the promoter model
        ]);

        $promoter = Promoter::create($data);
        return response()->json(['message' => 'Promoter created successfully', 'data' => $promoter], 201);
    }
}
