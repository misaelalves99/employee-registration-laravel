{{-- resources/views/employee/details.blade.php --}}

@extends('layouts.app')

@section('title', 'Detalhes do Funcionário')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employee/details/details.css') }}">
@endpush

@section('content')
    @if(!$employee)
        <div class="details-notFoundContainer">
            <h1 class="details-notFoundTitle">Funcionário não encontrado</h1>
            <a href="{{ route('employee.index') }}" class="details-btnPrimary">
                Voltar para a lista
            </a>
        </div>
    @else
        <div class="details-container">
            <h1 class="details-title">Detalhes do Funcionário</h1>

            <div class="details-card">
                <p><strong class="details-label">Nome:</strong> {{ $employee->name }}</p>
                <p><strong class="details-label">CPF:</strong> {{ $employee->cpf }}</p>
                <p><strong class="details-label">Email:</strong> {{ $employee->email }}</p>
                <p><strong class="details-label">Telefone:</strong> {{ $employee->phone ?? 'Não informado' }}</p>
                <p><strong class="details-label">Endereço:</strong> {{ $employee->address ?? 'Não informado' }}</p>
                <p><strong class="details-label">Cargo:</strong> {{ $employee->position }}</p>
                <p><strong class="details-label">Departamento:</strong> {{ $employee->department->name ?? 'Não informado' }}</p>
                <p><strong class="details-label">Salário:</strong> 
                    {{ number_format($employee->salary, 2, ',', '.') }} R$
                </p>
                <p><strong class="details-label">Data de Admissão:</strong> 
                    {{ \Carbon\Carbon::parse($employee->admission_date)->format('d/m/Y') }}
                </p>
                <p><strong class="details-label">Status:</strong> {{ $employee->is_active ? 'Ativo' : 'Inativo' }}</p>
            </div>

            <div class="details-buttonGroup">
                <a href="{{ route('employee.index') }}" class="details-btnSecondary">Voltar</a>
                <a href="{{ route('employee.edit', $employee->id) }}" class="details-btnPrimary">Editar</a>
            </div>
        </div>
    @endif
@endsection
