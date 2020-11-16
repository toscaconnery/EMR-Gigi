<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';

    protected $primaryKey = 'id';

    protected $casts = [
        'dob' => 'date:hh:mm'
    ];

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'mr_number',
        'admission_number',
        'dob'
    ];

    public $timestamps = true;
}