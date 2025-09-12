{{-- resources/views/employee/delete.blade.php --}}

@extends('layouts.app')

@section('title', 'Deletar Funcionário')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employee/delete/delete.css') }}">
@endpush

@section('content')
<div class="delete-container">
    <h1 class="delete-title">Deletar Funcionário</h1>

    @if(session('error'))
        <p class="delete-error">{{ session('error') }}</p>
    @endif

    @if($employee)
        <p class="delete-message">
            Tem certeza que deseja deletar o funcionário <strong>{{ $employee->name }}</strong>?
        </p>

        <div class="delete-detailsBox">
            <p><strong>CPF:</strong> {{ $employee->cpf }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Cargo:</strong> {{ $employee->position }}</p>
            <p><strong>Departamento:</strong> {{ $employee->department->name ?? 'Não informado' }}</p>
        </div>

        <div class="delete-buttons">
            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btnDelete">Deletar</button>
            </form>

            <a href="{{ route('employee.index') }}" class="delete-btnCancel">Cancelar</a>
        </div>
    @else
        <p class="delete-error">Funcionário não encontrado.</p>
    @endif
</div>
@endsection
