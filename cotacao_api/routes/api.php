<?php

use App\Http\Controllers\CotacaoController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function () {

    Route::post('/cotacao', [CotacaoController::class, 'newCotacaoFrete']);
    Route::put('/cotacao', [CotacaoController::class, 'calcularImposto']);
    Route::get('/cotacao', [CotacaoController::class, 'listarImpostos']);

    // extra
    Route::get('/listaTransportadoras', [CotacaoController::class, 'listaTransportadoras']);

});
