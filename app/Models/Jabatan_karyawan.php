<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan_karyawan extends Model
{
    protected $table = "jabatan_karyawan";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'jabatan'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
