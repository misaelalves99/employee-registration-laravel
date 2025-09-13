<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLog extends Model
{
    use HasFactory;

    protected $table = 'employee_logs';
    protected $fillable = ['employee_id', 'action', 'description'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
