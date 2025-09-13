<!-- resources/views/employee/create.blade.php -->

@extends('layouts.app')

@section('title', 'Criar Funcionário')

@section('content')
<div class="container">
    <h1 class="title">Criar Funcionário</h1>

    <x-employee-form 
        :departments="$departments" 
        :positions="$positions" 
        :action="route('employee.store')"
        method="POST"
    />
</div>
@endsection
