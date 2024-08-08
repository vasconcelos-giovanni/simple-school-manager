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

// Route::get('/routes', function () {
//     return response()->json([
//         'test' => route('test.index'),
//         // Add more routes here if needed
//     ]);
// })->name('api.routes');

Route::get('test', function() {
    $r = Route::getRoutes();
    foreach ($r as $value) {
        echo $value->getName();
        echo "<br/>";
        echo $value->uri();
        echo "<br/><br/>";
    }
    dd("Routes end");

    // return "HELLO, WORLD!";
});

// Route::get('test', function() {
//     dd("oi");
// });
