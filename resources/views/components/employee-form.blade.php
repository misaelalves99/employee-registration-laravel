<!-- resources/views/components/employee-form.blade.php -->

@props([
    'departments' => collect(),
    'positions' => ['Gerente', 'Analista', 'Desenvolvedor', 'Designer'],
    'employee' => null,
    'action' => '',
    'method' => 'POST'
])

@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/employee-form.css') }}">
@endpush

<form action="{{ $action }}" method="POST" class="form">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    @php
        $emp = $employee;
    @endphp

    {{-- Campos básicos --}}
    @foreach([
        'name' => 'Nome',
        'cpf' => 'CPF',
        'email' => 'Email',
        'phone' => 'Telefone',
        'address' => 'Endereço'
    ] as $field => $label)
        <div class="field">
            <label for="{{ $field }}" class="label">{{ $label }}:</label>
            <input
                type="text"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ old($field, $emp->$field ?? '') }}"
                class="input"
                {{ in_array($field, ['phone','address']) ? '' : 'required' }}
            >
            @error($field) <p class="errorText">{{ $message }}</p> @enderror
        </div>
    @endforeach

    {{-- Salário --}}
    <div class="field">
        <label for="salary" class="label">Salário:</label>
        <input type="number" step="0.01" id="salary" name="salary"
               value="{{ old('salary', $emp->salary ?? '') }}" class="input" required>
        @error('salary') <p class="errorText">{{ $message }}</p> @enderror
    </div>

    {{-- Data de admissão --}}
    <div class="field">
        <label for="admission_date" class="label">Data de Admissão:</label>
        <input type="date" id="admission_date" name="admission_date"
               value="{{ old('admission_date', isset($emp->admission_date) ? \Carbon\Carbon::parse($emp->admission_date)->format('Y-m-d') : '') }}"
               class="input" required>
        @error('admission_date') <p class="errorText">{{ $message }}</p> @enderror
    </div>

    {{-- Departamento --}}
    <div class="field">
        <label for="department_id" class="label">Departamento:</label>
        <select id="department_id" name="department_id" class="select" required>
            <option value="">Selecione...</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}"
                    {{ old('department_id', $emp->department_id ?? '') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        @error('department_id') <p class="errorText">{{ $message }}</p> @enderror
    </div>

    {{-- Cargo --}}
    <div class="field">
        <label for="position" class="label">Cargo:</label>
        <select id="position" name="position" class="select" required>
            <option value="">Selecione...</option>
            @foreach($positions as $pos)
                <option value="{{ $pos }}" {{ old('position', $emp->position ?? '') == $pos ? 'selected' : '' }}>
                    {{ $pos }}
                </option>
            @endforeach
        </select>
        @error('position') <p class="errorText">{{ $message }}</p> @enderror
    </div>

    {{-- Ativo --}}
    <div class="checkboxContainer">
        <input type="checkbox" id="is_active" name="is_active" value="1"
               {{ old('is_active', $emp->is_active ?? true) ? 'checked' : '' }} class="formCheckbox">
        <label for="is_active">Ativo</label>
    </div>

    {{-- Botões --}}
    <div class="buttons">
        <button type="submit" class="btn btnPrimary">{{ $emp ? 'Atualizar' : 'Criar' }}</button>
        <a href="{{ route('employee.index') }}" class="btn btnSecondary">Voltar</a>
    </div>
</form>
