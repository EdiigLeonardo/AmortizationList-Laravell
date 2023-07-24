<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Wallet extends Model
{
    protected $fillable = [
        'balance',
        
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
