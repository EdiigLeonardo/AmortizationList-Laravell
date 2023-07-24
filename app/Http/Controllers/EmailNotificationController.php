<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailNotification;

class EmailNotificationController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'promoter_id' => 'required|exists:promoters,id',
            'profile_id' => 'required|exists:profiles,id',
            'message' => 'required|string',
        ]);

        $emailNotification = EmailNotification::create($data);

        return response()->json([
            'message' => 'Email notification created successfully',
            'data' => $emailNotification,
        ], 201);
    }

    public function getAll()
    {
        $emailNotifications = EmailNotification::all();

        return response()->json([
            'data' => $emailNotifications,
        ], 200);
    }
}

