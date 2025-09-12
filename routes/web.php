<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rotas do sistema de funcionários convertidas do React.js para Laravel Blade.
| Incluem home, política de privacidade e módulo completo de funcionários.
|
*/

// Página inicial (Home real em resources/views/home/home.blade.php)
Route::view('/', 'home.home')->name('home');

// Página de Política de Privacidade
Route::view('/privacy', 'privacy.privacy')->name('privacy');

// Rotas do módulo Employee
Route::prefix('employee')->name('employee.')->group(function () {

    // Lista de funcionários
    Route::get('/', [EmployeeController::class, 'index'])->name('index');

    // Criar novo funcionário
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('store');

    // Detalhes do funcionário
    Route::get('/details/{employee}', [EmployeeController::class, 'show'])->name('show');

    // Editar funcionário
    Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('edit');
    Route::put('/update/{employee}', [EmployeeController::class, 'update'])->name('update');

    // Página de confirmação de delete
    Route::get('/{employee}/delete', [EmployeeController::class, 'delete'])->name('delete');

    // Exclusão real
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');

    // Alternar status ativo/inativo
    Route::patch('/toggle-status/{employee}', [EmployeeController::class, 'toggleStatus'])->name('toggleStatus');

    // Reativar funcionário (equivalente à página React "ReactivateEmployeePage")
    Route::patch('/reactivate/{employee}', [EmployeeController::class, 'reactivate'])->name('reactivate');
});

// Página 404 personalizada (substitui a antiga NotFoundPage do React)
Route::fallback(function () {
    return response()->view('not-found', [], 404);
});
