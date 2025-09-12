<?php
// app/Services/EmployeeService.php

namespace App\Services;

use App\Models\Employee;
use App\Models\Department;

class EmployeeService
{
    /**
     * Retorna todos os funcionários, com relação de departamento carregada.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Employee::with('department')->get();
    }

    /**
     * Retorna funcionário pelo ID.
     */
    public function find(int $id): ?Employee
    {
        return Employee::with('department')->find($id);
    }

    /**
     * Cria novo funcionário.
     */
    public function create(array $data): Employee
    {
        $data['is_active'] = $data['is_active'] ?? true;
        return Employee::create($data);
    }

    /**
     * Atualiza funcionário.
     */
    public function update(int $id, array $data): bool
    {
        $employee = Employee::find($id);
        if (!$employee) return false;
        $employee->update($data);
        return true;
    }

    /**
     * Deleta funcionário.
     */
    public function delete(int $id): bool
    {
        $employee = Employee::find($id);
        if (!$employee) return false;
        return $employee->delete();
    }

    /**
     * Ativa / inativa funcionário.
     */
    public function toggleStatus(int $id): bool
    {
        $employee = Employee::find($id);
        if (!$employee) return false;
        $employee->is_active = !$employee->is_active;
        return $employee->save();
    }

    /**
     * Retorna filtros aplicados.
     */
    public function filter(array $filters)
    {
        $query = Employee::query();

        if (!empty($filters['position'])) {
            $query->where('position', $filters['position']);
        }

        if (!empty($filters['department_id'])) {
            $query->where('department_id', $filters['department_id']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        if (!empty($filters['admission_date_from'])) {
            $query->where('admission_date', '>=', $filters['admission_date_from']);
        }

        if (!empty($filters['admission_date_to'])) {
            $query->where('admission_date', '<=', $filters['admission_date_to']);
        }

        return $query->with('department')->get();
    }
}
