<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResources([
    'turmas' => TurmaController::class,
    'alunos' => AlunoController::class,
]);

// Route::apiResource('alunos', AlunoController::class);
Route::prefix('turmas')->group(function () {
    Route::controller(TurmaController::class)->group(function () {
        Route::get('{turma}/alunos', 'alunos')->name('turmas.alunos');
    });
});
