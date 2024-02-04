<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    // use HasFactory;
    protected $table = "karyawan";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'name',
        'jabatan_id',
        'address',
        'birthday_date'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan_karyawan::class);
    }
}
