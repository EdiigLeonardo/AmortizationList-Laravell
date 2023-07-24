<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailNotification extends Model
{
    protected $fillable = [
        'promoter_id',
        'profile_id',
        'message',
    ];

    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
