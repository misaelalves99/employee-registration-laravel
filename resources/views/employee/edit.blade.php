{{-- resources/views/employee/edit.blade.php --}}

@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employee/edit/edit.css') }}">
@endpush

@section('content')
<div class="container">
    <h1 class="title">Editar Funcionário</h1>
    <x-employee-form 
        :departments="$departments" 
        :positions="$positions" 
        :employee="$employee" 
        :action="route('employee.update', $employee->id)" 
        method="PUT" 
    />
</div>
@endsection
