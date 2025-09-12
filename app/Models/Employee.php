<?php
// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'phone',
        'address',
        'position',
        'department_id',
        'salary',
        'admission_date',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'admission_date' => 'date',
        'salary' => 'float',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
