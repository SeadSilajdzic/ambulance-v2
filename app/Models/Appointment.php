<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at', 'appointment_date'];

    protected $fillable = [
        'appointment_title',
        'diagnosis',
        'appointment_special_note',
        'appointment_statuses_id',
        'appointment_date',
        'appointment_approved'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointmentStatus()
    {
        return $this->belongsTo(AppointmentStatus::class,'appointment_statuses_id','id');
    }
}
