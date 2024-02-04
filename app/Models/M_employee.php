<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_employee extends Model
{
    // use HasFactory;
    protected $table = "employee";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'date_of_birth',
        'phone_number',
        'email_address',
        'province_address',
        'city_address',
        'street_address',
        'zip_code',
        'ktp_number',
        'ktp_image',
        'current_position_bank_account',
        'bank_account_number',
        'employee_position'
    ];
}
