<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Action extends Model
{
    protected $table = 'action';

    protected $primaryKey = 'id';

    protected $fillable = [
        'branch_id',
        'name',
        'price',
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
