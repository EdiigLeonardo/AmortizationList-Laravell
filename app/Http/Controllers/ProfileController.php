<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return response()->json(['data' => $profiles], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:profiles',
            // Add other validation rules for the profile model
        ]);

        $profile = Profile::create($data);
        return response()->json(['message' => 'Profile created successfully', 'data' => $profile], 201);
    }
}
