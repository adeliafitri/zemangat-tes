<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table ='employees';

    protected $fillable = [
        'id',
        'name',
        'birth_place',
        'sex',
        'birth_date',
        'status',
        'join_date',
        'dept',
        'job_title'
    ];

    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }

    public function saldo_cuti()
    {
        return $this->hasMany(SaldoCuti::class);
    }
}
