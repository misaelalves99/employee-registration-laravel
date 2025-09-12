{{-- resources/views/home/home.blade.php --}}
@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
@endpush

@section('title', 'Página Inicial')

@section('content')
<main class="main">
    <h1 class="title">
        Bem-vindo ao Sistema de Funcionários
    </h1>
    <p class="description">
        Este sistema permite o cadastro, edição e gerenciamento de funcionários da empresa.
        Desenvolvido para gerenciar registros de desenvolvedores, gerentes e funcionários de forma simples e intuitiva.
    </p>

    <a href="{{ route('employee.index') }}" class="btnPrimary">
        Ir para Funcionários
    </a>
</main>
@endsection
