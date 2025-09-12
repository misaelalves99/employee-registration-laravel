{{-- resources/views/employee/partials/filter.blade.php --}}
<div class="filter-container">
    <h3>Filtros</h3>
    <form method="GET" action="{{ route('employee.index') }}">
        <div class="field">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="">Todos</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Ativo</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>

        <div class="field">
            <label for="department">Departamento:</label>
            <select name="department" id="department">
                <option value="">Todos</option>
                @foreach ($departments as $dept)
                    <option value="{{ $dept->id }}" {{ request('department') == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btnPrimary">Filtrar</button>
    </form>
</div>
