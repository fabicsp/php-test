<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'health_professional_id',
        'appointment_date',
        'email',
    ];

    // Define relationships
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function healthProfessional()
    {
        return $this->belongsTo(HealthProfessional::class);
    }
}
