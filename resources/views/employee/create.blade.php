{{-- resources/views/employee/create.blade.php --}}

@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employee/create/create.css') }}">
@endpush

@section('content')
<div class="container">
    <h1 class="title">Criar Funcionário</h1>

    {{-- Passando departments, positions e action para o componente --}}
    <x-employee-form 
        :departments="$departments" 
        :positions="$positions" 
        :action="route('employee.store')"
        method="POST"
    />
</div>
@endsection
