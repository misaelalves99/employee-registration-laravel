<?php
// app/View/Components/EmployeeForm.php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Collection;

class EmployeeForm extends Component
{
    public Collection $departments;
    public ?object $employee;
    public array $positions;
    public string $action;
    public string $method;

    /**
     * Cria uma nova instância do componente.
     *
     * @param Collection $departments
     * @param object|null $employee
     * @param string|null $action
     * @param string|null $method
     */
    public function __construct($departments, $employee = null, $action = null, $method = null)
    {
        $this->departments = $departments;
        $this->employee = $employee;
        $this->positions = ['Gerente', 'Analista', 'Desenvolvedor', 'Designer'];
        $this->action = $action ?? ($employee ? route('employee.update', $employee->id) : route('employee.store'));
        $this->method = $method ?? ($employee ? 'PUT' : 'POST');
    }

    public function render()
    {
        return view('components.employee-form');
    }
}
