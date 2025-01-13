<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicecategory extends Model
{
    use HasFactory;
    protected $fillable = ['priority', 'name', 'description'];

    public function services()
    {
        return $this->hasMany(service::class);
    }
}
