{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/errors/404.css') }}">
@endpush

@section('title', 'Erro 404')

@section('content')
<section class="container">
    <h1 class="title">Erro 404</h1>
    <p class="description">A página que você está procurando não foi encontrada.</p>
    <a href="{{ url('/') }}" class="btn">
        Voltar à página inicial
    </a>
</section>
@endsection
