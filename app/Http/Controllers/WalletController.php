<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'balance' => 'required|numeric',
            'project_id' => 'required|exists:projects,id',
        ]);

        $wallet = Wallet::create($data);

        return response()->json([
            'message' => 'Wallet created successfully',
            'data' => $wallet,
        ], 201);
    }

    public function getAll()
    {
        $wallets = Wallet::all();

        return response()->json([
            'data' => $wallets,
        ], 200);
    }
}
