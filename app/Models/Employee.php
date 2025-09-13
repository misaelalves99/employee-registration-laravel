<?php
// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees'; // nome da tabela
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; // ou 'bigint'

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

    // Relacionamento com Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relacionamento com EmployeeStatusHistory
    public function statusHistory()
    {
        return $this->hasMany(EmployeeStatusHistory::class);
    }

    // Relacionamento com EmployeeLog
    public function logs()
    {
        return $this->hasMany(EmployeeLog::class);
    }
}
