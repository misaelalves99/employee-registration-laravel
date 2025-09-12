{{-- resources/views/privacy/privacy.blade.php --}}
@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/privacy/privacy.css') }}">
@endpush

@section('title', 'Política de Privacidade')

@section('content')
<main class="main">
    <h1 class="title">Política de Privacidade</h1>
    <p class="text">
        Sua privacidade é importante para nós. Esta aplicação não coleta dados pessoais dos
        usuários. Todas as informações inseridas são de uso exclusivo para fins de cadastro e
        gerenciamento interno.
    </p>
</main>
@endsection
