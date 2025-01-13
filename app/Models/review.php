<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'review',
        'rating',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
