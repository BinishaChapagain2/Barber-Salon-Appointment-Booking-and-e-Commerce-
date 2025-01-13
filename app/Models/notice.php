<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'photopath'];

    //user relationship with notice model (one to many)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
