<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blood_type',
        'birth',
        'alergies',
        'special_note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
