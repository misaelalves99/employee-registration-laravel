{{-- resources/views/components/employee-toggle-status-button.blade.php --}}

@props([
    'employeeId',
    'initialStatus' => true,
    'routeToggle' => null, // Rota para alternar status via POST
])

@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/employee-toggle-status-button.css') }}">
@endpush

@php
    $status = $initialStatus;
@endphp

<form method="POST" action="{{ $routeToggle ?? '#' }}" class="toggle-status-form">
    @csrf
    <input type="hidden" name="employeeId" value="{{ $employeeId }}">
    <input type="hidden" name="status" value="{{ $status ? 1 : 0 }}">

    <button
        type="submit"
        class="button {{ $status ? 'active' : 'inactive' }}"
        title="{{ $status ? 'Inativar' : 'Ativar' }}"
    >
        {{ $status ? 'Ativo' : 'Inativo' }}
    </button>
</form>
