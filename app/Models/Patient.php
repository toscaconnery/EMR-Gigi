<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';

    protected $primaryKey = 'id';

    protected $casts = [
        'tanggal_lahir' => 'date:hh:mm'
    ];

    protected $fillable = [
        'no_ktp',
        'nama_depan',
        'nama_belakang',
        'email',
        'no_telp',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'alergi',
        'username',
        'jenis_kelamin',
        'mr_number'
    ];

    public $timestamps = true;
}