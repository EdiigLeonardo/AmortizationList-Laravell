<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Amortization;
use App\Models\Profile;

class Payment extends Model
{
    protected $fillable = [
        'amortization_id',
        'amount',
        'profile_id',
        'state',
    ];

    public function amortization()
    {
        return $this->belongsTo(Amortization::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
