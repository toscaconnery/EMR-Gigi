<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Item extends Model
{
    protected $table = 'item';

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
