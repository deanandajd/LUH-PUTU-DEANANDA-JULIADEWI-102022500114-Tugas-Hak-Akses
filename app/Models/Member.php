<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'nomor_kartu',
        'nama',
        'email',
        'no_hp',
        'tipe_keanggotaan',
        'alamat',
    ];
}