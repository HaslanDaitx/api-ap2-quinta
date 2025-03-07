<?php

use App\Http\Controllers\HeroiController;
use App\Http\Controllers\VilaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/heroi', [HeroiController::class, 'listarTodos']);
Route::get('/heroi/{id}', [HeroiController::class, 'exibirPeloId']);
Route::post('/heroi', [HeroiController::class, 'criar']);
Route::put('/heroi/{id}', [HeroiController::class, 'editar']);
Route::delete('/heroi/{id}', [HeroiController::class, 'excluir']);

Route::get('/vilao', [VilaoController::class, 'listarTodos']);
Route::get('/vilao/{id}', [VilaoController::class, 'exibirPeloId']);
Route::post('/vilao', [VilaoController::class, 'criar']);
Route::put('/vilao/{id}', [VilaoController::class, 'editar']);
Route::delete('/vilao/{id}', [VilaoController::class, 'excluir']);