<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Amortization;
use App\Models\Wallet;
use App\Models\Promoter;

class Project extends Model
{
    protected $fillable = [
    ];

    public function amortizations()
    {
        return $this->hasMany(Amortization::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }
}
