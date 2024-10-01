<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoCuti extends Model
{
    use HasFactory;

    protected $table ='time_offs_saldo';

    protected $fillable = [
        'employee_id',
        'timeoff_saldo'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
