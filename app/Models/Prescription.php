<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Prescription extends Model
{
    protected $table = 'prescription';

    protected $primaryKey = 'id';

    protected $fillable = [
        'branch_id',
        'name',
        'price',
        'stock'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d M Y');
    }
}
