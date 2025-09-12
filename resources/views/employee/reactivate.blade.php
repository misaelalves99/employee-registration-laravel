{{-- resources/views/employee/reactivate.blade.php --}}
@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employee/reactivate/reactivate.css') }}">
@endpush

@section('title', 'Reativar Funcionário')

@section('content')
<div class="container">
    <h1 class="title">Reativar Funcionário</h1>
    <h4 class="subtitle">Tem certeza que deseja reativar este funcionário?</h4>

    {{-- Mensagens de erro --}}
    @if ($errors->any())
        <p class="errorText">{{ $errors->first() }}</p>
    @endif

    {{-- Mensagem de sucesso --}}
    @if (session('success'))
        <p class="successText">{{ session('success') }}</p>
    @endif

    <div class="card">
        <h5 class="cardTitle">{{ $employee->name }}</h5>
        <p><strong class="textStrong">CPF:</strong> {{ $employee->cpf }}</p>
        <p><strong class="textStrong">Email:</strong> {{ $employee->email }}</p>
        <p><strong class="textStrong">Cargo:</strong> {{ $employee->position }}</p>
        <p><strong class="textStrong">Departamento:</strong> {{ $employee->department->name ?? 'Não informado' }}</p>
    </div>

    <div class="buttonGroup">
        <form method="POST" action="{{ route('employee.toggleStatus', $employee->id) }}" style="flex-grow: 1;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btnPrimary" {{ $employee->is_active ? 'disabled' : '' }}>
                {{ $employee->is_active ? 'Já Ativo' : 'Reativar' }}
            </button>
        </form>
        <a href="{{ route('employee.index') }}" class="btnSecondary">Cancelar</a>
    </div>
</div>
@endsection
