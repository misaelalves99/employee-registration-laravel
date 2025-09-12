<?php
// app/Http/Controllers/EmployeeController.php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    private array $positions = ['Gerente', 'Analista', 'Desenvolvedor', 'Designer'];

    /**
     * Listar todos os funcionários
     */
    public function index(Request $request)
    {
        $query = Employee::with('department');

        // Filtros opcionais
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('cpf', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->input('department_id'));
        }

        if ($request->filled('position')) {
            $query->where('position', $request->input('position'));
        }

        if ($request->filled('is_active')) {
            $isActive = filter_var($request->input('is_active'), FILTER_VALIDATE_BOOLEAN);
            $query->where('is_active', $isActive);
        }

        $employees = $query->orderBy('name')->paginate(10);
        $departments = Department::all();
        $positions = $this->positions;

        return view('employee.index', compact('employees', 'departments', 'positions', 'request'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        $departments = Department::all();
        $positions = $this->positions;

        return view('employee.create', compact('departments', 'positions'));
    }

    /**
     * Armazenar novo funcionário
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'cpf'            => 'required|string|max:14|unique:employees,cpf',
            'email'          => 'required|email|unique:employees,email',
            'phone'          => 'nullable|string|max:20',
            'address'        => 'nullable|string|max:255',
            'position'       => ['required', Rule::in($this->positions)],
            'department_id'  => 'required|exists:departments,id',
            'salary'         => 'required|numeric|min:0',
            'admission_date' => 'required|date',
        ]);

        $validated['is_active'] = true;

        Employee::create($validated);

        return redirect()->route('employee.index')
            ->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Formulário de edição
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = $this->positions;

        return view('employee.edit', compact('employee', 'departments', 'positions'));
    }

    /**
     * Atualizar funcionário
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'cpf'            => ['required','string','max:14', Rule::unique('employees','cpf')->ignore($employee->id)],
            'email'          => ['required','email', Rule::unique('employees','email')->ignore($employee->id)],
            'phone'          => 'nullable|string|max:20',
            'address'        => 'nullable|string|max:255',
            'position'       => ['required', Rule::in($this->positions)],
            'department_id'  => 'required|exists:departments,id',
            'salary'         => 'required|numeric|min:0',
            'admission_date' => 'required|date',
        ]);

        $employee->update($validated);

        return redirect()->route('employee.index')
            ->with('success', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Visualizar detalhes do funcionário
     */
    public function show(Employee $employee)
    {
        $employee->load('department');
        return view('employee.details', compact('employee'));
    }

    /**
     * Página de confirmação de deleção
     */
    public function delete(Employee $employee)
    {
        $employee->load('department');
        return view('employee.delete', compact('employee'));
    }

    /**
     * Deletar funcionário
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
            ->with('success', 'Funcionário deletado com sucesso!');
    }

    /**
     * Alternar status ativo/inativo
     */
    public function toggleStatus(Employee $employee)
    {
        $employee->is_active = !$employee->is_active;
        $employee->save();

        return redirect()->route('employee.index')
            ->with('success', 'Status do funcionário atualizado com sucesso!');
    }
}
