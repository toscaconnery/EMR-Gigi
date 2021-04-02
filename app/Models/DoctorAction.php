<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class DoctorAction extends Model
{
    protected $table = 'doctor_action';

    protected $primaryKey = 'id';

    protected $fillable = [
        'doctor_id',
        'action_id',
    ];



    public $timestamps = false;
}
