<?php

use App\Http\Controllers\DicaController;
use App\Http\Controllers\ForcaController;
use App\Http\Controllers\PalavraController;
use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/forca/escolher-tema');
});

Route::prefix('/forca')->group(function () {
    Route::get('/escolher-tema', [ForcaController::class, 'escolherTema'])->name('escolher-tema-de-forca');
    Route::get('/iniciar', [ForcaController::class, 'iniciar'])->name('iniciar-forca');
    Route::post('/outra', [ForcaController::class, 'jogarOutra'])->name('outra-forca');
    Route::post('/submeter-letra', [ForcaController::class, 'submeterLetra'])->name('submeter-letra');
});

Route::prefix('dica')->group(function () {
    Route::get('/ameaca/{id}', [DicaController::class, 'ameacar'])->name(('ameacar-dica'));
    Route::get('/cadastro/{palavraId}', [DicaController::class, 'cadastrar'])->name('cadastrar-dica');
    Route::get('/edicao/{id}', [DicaController::class, 'editar'])->name('editar-dica');
    Route::get('/trecho', [DicaController::class, 'digitarTrecho'])->name('digitar-trecho-de-dica');
    Route::get('/com-trecho/{trecho}', [DicaController::class, 'listarComTrecho'])->name('dicas-com-trecho');
    Route::get('/da-palavra/{palavraId}', [DicaController::class, 'listarDaPalavra'])->name('dicas-da-palavra');
    Route::post('/', [DicaController::class, 'inserir'])->name('inserir-dica');
    Route::put('/{id}', [DicaController::class, 'atualizar'])->name('atualizar-dica');
    Route::delete('/{id}', [DicaController::class, 'excluir'])->name('excluir-dica');
});

Route::prefix('palavra')->group(function () {
    Route::get('/', [PalavraController::class, 'cadastrar'])->name('cadastrar-palavra');
    Route::get('/ameaca/{id}', [PalavraController::class, 'ameacar'])->name('ameacar-palavra');
    Route::get('/edicao/{id}', [PalavraController::class, 'editar'])->name('editar-palavra');
    Route::get('/lista/{trecho}', [PalavraController::class, 'listar'])->name('palavras');
    Route::get('/trecho', [PalavraController::class, 'digitarTrecho'])->name('digitar-trecho-de-palavra');
    Route::post('/', [PalavraController::class, 'inserir'])->name('inserir-palavra');
    Route::put('/{id}', [PalavraController::class, 'atualizar'])->name('atualizar-palavra');
    Route::delete('/{id}', [PalavraController::class, 'excluir'])->name('excluir-palavra');
});

Route::prefix('/tema')->group(function () {
    Route::get('/', [TemaController::class, 'listar'])->name('temas');
    Route::get('/cadastro', [TemaController::class, 'cadastrar'])->name('cadastrar-tema');
    Route::get('/{id}', [TemaController::class, 'editar'])->name('editar-tema');
    Route::get('/ameaca/{id}', [TemaController::class, 'ameacar'])->name('ameacar-tema');
    Route::post('/', [TemaController::class, 'inserir'])->name('inserir-tema');
    Route::put('/{id}', [TemaController::class, 'atualizar'])->name('atualizar-tema');
    Route::delete('/{id}', [TemaController::class, 'excluir'])->name('excluir-tema');
});