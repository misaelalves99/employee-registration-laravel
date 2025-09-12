{{-- resources/views/components/employee-delete-modal.blade.php --}}

@props(['employee', 'onDeleted' => null])

{{-- Importando CSS do modal --}}
@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/employee-delete-modal.css') }}">
@endpush

@if ($employee)
<div class="backdrop" onclick="closeModal()">
    <div class="modal" onclick="event.stopPropagation()">
        <h2 class="title">Confirmar Exclusão</h2>
        <p class="message">
            Tem certeza que deseja excluir <strong>{{ $employee->name }}</strong>?
        </p>

        <ul class="employeeDetails">
            <li><strong>ID:</strong> {{ $employee->id }}</li>
            <li><strong>CPF:</strong> {{ $employee->cpf }}</li>
            <li><strong>Email:</strong> {{ $employee->email }}</li>
            <li><strong>Cargo:</strong> {{ $employee->position }}</li>
            <li><strong>Departamento:</strong> {{ $employee->department->name ?? 'Não informado' }}</li>
        </ul>

        <div class="actions">
            <form method="POST" action="{{ route('employee.destroy', $employee->id) }}">
                @csrf
                @method('DELETE')
                <button type="button" class="button cancel" onclick="closeModal()">Cancelar</button>
                <button type="submit" class="button confirm">Confirmar Exclusão</button>
            </form>
        </div>
    </div>
</div>

<script>
function closeModal() {
    document.querySelector('.backdrop').style.display = 'none';
}
</script>
@endif
