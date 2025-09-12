{{-- resources/views/components/employee-filter-panel.blade.php --}}

@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/employee-filter-panel.css') }}">
@endpush

<aside class="container">
    <h2 class="title">Filtros</h2>

    <form action="{{ route('employee.index') }}" method="GET">
        <div class="field">
            <label for="position" class="label">Cargo</label>
            <input
                type="text"
                id="position"
                name="position"
                value="{{ request('position') }}"
                class="input"
                placeholder="Cargo"
            />
        </div>

        <div class="field">
            <label for="departmentId" class="label">Departamento</label>
            <input
                type="number"
                id="departmentId"
                name="departmentId"
                value="{{ request('departmentId') }}"
                class="input"
                placeholder="ID do departamento"
            />
        </div>

        <button type="submit" class="button">Aplicar Filtros</button>
    </form>
</aside>
