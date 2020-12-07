<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'employee_id',
        'gender',
        'position'

    ];

    public $timestamps = true;

    // public static function isAdmin() {
    //     return 'x';
    // }
}