{{-- resources/views/components/employee-list.blade.php --}}

@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/employee-list.css') }}">
@endpush

<table class="table">
    <thead class="thead">
        <tr>
            <th class="th">Nome</th>
            <th class="th">CPF</th>
            <th class="th">Email</th>
            <th class="th">Telefone</th>
            <th class="th">Cargo</th>
            <th class="th">Departamento</th>
            <th class="th">Salário</th>
            <th class="th">Admissão</th>
            <th class="th">Status</th>
            <th class="th">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $emp)
            <tr class="trHover">
                <td class="td">{{ $emp->name }}</td>
                <td class="td">{{ $emp->cpf }}</td>
                <td class="td">{{ $emp->email }}</td>
                <td class="td">{{ $emp->phone }}</td>
                <td class="td">{{ $emp->position }}</td>
                <td class="td">{{ $emp->department->name ?? '—' }}</td>
                <td class="td">{{ number_format($emp->salary, 2, ',', '.') }}</td>
                <td class="td">{{ \Carbon\Carbon::parse($emp->admission_date)->format('d/m/Y') }}</td>
                <td class="td">{{ $emp->is_active ? 'Ativo' : 'Inativo' }}</td>
                <td class="td actions">
                    <a href="{{ route('employee.show', $emp->id) }}" class="btn btnInfo">Detalhes</a>
                    <a href="{{ route('employee.edit', $emp->id) }}" class="btn btnWarning">Editar</a>

                    <form action="{{ route('employee.toggleStatus', $emp->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn {{ $emp->is_active ? 'btnSecondary' : 'btnSuccess' }}" title="{{ $emp->is_active ? 'Inativar' : 'Ativar' }}">
                            {{ $emp->is_active ? 'Inativar' : 'Ativar' }}
                        </button>
                    </form>

                    <form action="{{ route('employee.destroy', $emp->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja deletar este funcionário?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btnDanger" title="Deletar">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
