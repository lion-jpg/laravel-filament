<?php

use Illuminate\Support\Facades\Route;
use Dbfx\LaravelStrapi\LaravelStrapi;
use GuzzleHttp\Client;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArquitecturaController;
use App\Http\Controllers\CulturaController;
use App\Http\Controllers\DeporteController;
use App\Http\Controllers\TransporteController;



Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/guia', [ApiController::class, 'fetchImages']);
    Route::get('/generate-pdf/{userId}', [ApiController::class, 'generatePdf']);
    Route::get('/editar/{id}', [ApiController::class, 'edit'])->name('edit');
    Route::put('/editar/{id}', [ApiController::class, 'update'])->name('update');
    Route::post('/add-data', [ApiController::class, 'post']);

    //************************************* */
    Route::get('/arqui',[ArquitecturaController::class, 'v_arqui']);
    Route::post('/a_post', [ArquitecturaController::class, 'post']);
    //************************************ */
    Route::get('/culturas',[CulturaController::class, 'v_cultura']);
    Route::post('/c_post', [CulturaController::class, 'post']);
    //************************************ */
    Route::get('/deportes',[DeporteController::class, 'v_deporte']);
    Route::post('/d_post', [DeporteController::class, 'post']);
    //************************************ */
    Route::get('/transportes',[TransporteController::class, 'v_transporte']);
    Route::post('/t_post', [TransporteController::class, 'post']);
    Route::put('/t_post/{id}', [TransporteController::class, 'update']);
});
