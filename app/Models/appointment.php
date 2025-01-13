<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'staff_id', 'appointment_date', 'appointment_time', 'notes', 'status', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_services');
    }
}
