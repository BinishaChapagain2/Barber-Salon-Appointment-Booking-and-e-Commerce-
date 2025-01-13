<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'discounted_price', 'servicecategory_id', 'photopath', 'status'];
    public function servicecategory()
    {
        return $this->belongsTo(servicecategory::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_services');
    }
}
