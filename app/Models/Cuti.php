<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table ='time_offs';

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'reason',
        'status'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
