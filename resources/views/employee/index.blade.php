@extends('layouts.app')

@section('title', 'Lista de Funcionários')

@section('content')
<div class="containerIndex">
    <h1 class="title">Lista de Funcionários</h1>

    <div class="contentWrapper">
        {{-- Sidebar de filtros --}}
        <aside class="sidebar">
            @include('employee.partials.filter')
        </aside>

        {{-- Seção direita --}}
        <section class="rightSection">
            <div class="topBar">
                <a href="{{ route('employee.create') }}" class="btnPrimary">Novo Funcionário</a>

                <form method="GET" action="{{ route('employee.index') }}">
                    <input
                        type="text"
                        name="search"
                        placeholder="Buscar por nome, e-mail ou telefone..."
                        value="{{ request('search') }}"
                        class="searchInput"
                    />
                </form>
            </div>

            @if ($employees->isEmpty())
                <p class="noResults">Nenhum funcionário encontrado.</p>
            @else
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th class="th">ID</th>
                            <th class="th">Nome</th>
                            <th class="th">Cargo</th>
                            <th class="th">Departamento</th>
                            <th class="th">Status</th>
                            <th class="th">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $emp)
                        <tr class="trHover">
                            <td class="td">{{ $emp->id }}</td>
                            <td class="td">{{ $emp->name }}</td>
                            <td class="td">{{ $emp->position }}</td>
                            <td class="td">{{ $emp->department->name ?? '-' }}</td>
                            <td class="td">{{ $emp->is_active ? 'Ativo' : 'Inativo' }}</td>
                            <td class="td actions">
                                {{-- Botão Detalhes --}}
                                <a href="{{ route('employee.show', $emp->id) }}" class="btn btnInfo">Detalhes</a>

                                {{-- Botão Editar --}}
                                <a href="{{ route('employee.edit', $emp->id) }}" class="btn btnWarning">Editar</a>

                                {{-- Botão Ativar/Inativar --}}
                                <form method="POST" action="{{ route('employee.toggleStatus', $emp->id) }}" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn {{ $emp->is_active ? 'btnSecondary' : 'btnSuccess' }}">
                                        {{ $emp->is_active ? 'Inativar' : 'Ativar' }}
                                    </button>
                                </form>

                                {{-- Botão Deletar: vai para página de confirmação --}}
                                <a href="{{ route('employee.delete', $emp->id) }}" class="btn btnDanger">Deletar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Paginação --}}
                <div class="paginationWrapper">
                    {{ $employees->links() }}
                </div>
            @endif
        </section>
    </div>
</div>
@endsection
