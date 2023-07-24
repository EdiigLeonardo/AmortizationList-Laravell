<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            // Add validation rules for the project fields
        ]);

        $project = Project::create($data);

        return response()->json([
            'message' => 'Project created successfully',
            'data' => $project,
        ], 201);
    }

    public function getAll()
    {
        $projects = Project::all();

        return response()->json([
            'data' => $projects,
        ], 200);
    }
}
