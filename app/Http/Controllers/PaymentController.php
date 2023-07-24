<?php

namespace App\Http\Controllers;

use App\Models\Amortization;
use App\Models\EmailNotification;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function processPaymentsBeforeDate($givenDate)
    {
        $amortizations = Amortization::where('schedule_date', '<=', $givenDate)
            ->where('state', '!=', 'paid')
            ->with('project.wallet', 'project.promoter', 'payments')
            ->get();

        foreach ($amortizations as $amortization) {
            $project = $amortization->project;
            $wallet = $project->wallet;

            if ($wallet->balance >= $amortization->amount) {
                DB::transaction(function () use ($amortization, $wallet) {
                    // Deduct the amount from the wallet balance
                    $wallet->balance -= $amortization->amount;
                    $wallet->save();

                    // Mark the amortization as paid
                    $amortization->state = 'paid';
                    $amortization->save();

                    // Create payment records and mark them as paid
                    foreach ($amortization->payments as $payment) {
                        $payment->state = 'paid';
                        $payment->save();
                    }
                });
            } else {
                // Handle insufficient funds case, e.g., notify admin or the promoter

                // Create an email notification for the promoter
                $promoter = $project->promoter;
                EmailNotification::create([
                    'promoter_id' => $promoter->id,
                    'message' => 'Insufficient funds for project: ' . $project->name,
                ]);

                // Create email notifications for every profile that was supposed to receive the payment
                foreach ($amortization->payments as $payment) {
                    EmailNotification::create([
                        'profile_id' => $payment->profile->id,
                        'message' => 'Payment delayed for project: ' . $project->name,
                    ]);
                }
            }
        }
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'amortization_id' => 'required|exists:amortizations,id',
            'amount' => 'required|numeric',
            'profile_id' => 'required|exists:profiles,id',
            'state' => 'required|string',
        ]);

        $payment = Payment::create($data);

        return response()->json([
            'message' => 'Payment created successfully',
            'data' => $payment,
        ], 201);
    }

    public function getAll()
    {
        $payments = Payment::all();

        return response()->json([
            'data' => $payments,
        ], 200);
    }
}
