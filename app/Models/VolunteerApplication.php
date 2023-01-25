<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'cv',
        'email',
        'phone',
        'address',
        'status',
    ];
}
