<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedAppointment extends Model
{
    use HasFactory;

    protected $dates = ['birth'];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'note',
        'birth',
        'blood_type',
    ];
}
