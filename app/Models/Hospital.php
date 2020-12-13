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
        'phone',
        'email',
        'join_date',
        'start_work_date',
        'admin_id'
    ];

    public $timestamps = true;
}
