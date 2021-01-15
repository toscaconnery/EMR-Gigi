<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Branch extends Model
{
    protected $table = 'branch';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'hospital_id',
        'address',
        'latitude',
        'longitude',
        'phone'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $dateFormat = 'Y';

    public $timestamps = true;

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d M Y');
    }
}
