<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospital';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'address',
    ];

    public $timestamps = true;
}
