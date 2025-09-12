{{-- resources/views/components/employee-filter.blade.php --}}

@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/employee-filter.css') }}">
@endpush

@php
    $positions = ['Gerente', 'Analista', 'Desenvolvedor', 'Designer']; // substitui POSITIONS
@endphp

<form action="{{ route('employee.index') }}" method="GET" class="formContainer">
    <div>
        <label for="search" class="label">Buscar</label>
        <input
            type="text"
            id="search"
            name="search"
            placeholder="Nome, CPF, email ou telefone..."
            class="input"
            value="{{ request('search') }}"
        />
    </div>

    <div>
        <label for="department_id" class="label">Departamento (ID)</label>
        <input
            type="number"
            id="department_id"
            name="department_id"
            placeholder="Ex: 1, 2, 3..."
            class="input"
            value="{{ request('department_id') }}"
        />
    </div>

    <div>
        <label for="position" class="label">Cargo</label>
        <select id="position" name="position" class="select">
            <option value="">Selecione</option>
            @foreach ($positions as $pos)
                <option value="{{ $pos }}" {{ request('position') == $pos ? 'selected' : '' }}>
                    {{ $pos }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="is_active" class="label">Status</label>
        <select id="is_active" name="is_active" class="select">
            <option value="">Todos</option>
            <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Ativo</option>
            <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Inativo</option>
        </select>
    </div>

    <div class="actions">
        <button type="submit" class="button">Filtrar</button>
    </div>
</form>
