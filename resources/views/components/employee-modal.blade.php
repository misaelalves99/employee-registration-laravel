{{-- resources/views/components/employee-modal.blade.php --}}

@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/employee-modal.css') }}">
@endpush

@if($isOpen ?? false)
<div class="overlay">
    <div class="modal">
        <h2 class="title">{{ $title }}</h2>
        <div class="body">
            {!! $body !!}
        </div>
        <div class="actions">
            <button type="button" class="buttonCancel" onclick="{{ $onClose ?? 'console.log(\'Close\')' }}">
                {{ $cancelLabel ?? 'Cancelar' }}
            </button>
            <button type="button" class="buttonConfirm" onclick="{{ $onConfirm ?? 'console.log(\'Confirm\')' }}">
                {{ $confirmLabel ?? 'Confirmar' }}
            </button>
        </div>
    </div>
</div>
@endif
