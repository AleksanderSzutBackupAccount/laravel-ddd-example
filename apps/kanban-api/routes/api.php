<?php

use Apps\KanbanApi\Http\Controllers\Board\CreateBoardController;
use Apps\KanbanApi\Http\Controllers\Board\DeleteBoardController;
use Apps\KanbanApi\Http\Controllers\Board\GetBoardByIdController;
use Apps\KanbanApi\Http\Controllers\Board\SearchBoardsController;
use Apps\KanbanApi\Http\Controllers\Board\UpdateBoardController;
use Apps\KanbanApi\Http\Controllers\HealthCheck\HealthCheckController;
use Apps\KanbanApi\Http\Controllers\PrometheusMetricsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->prefix('api/v1/kanban')->group(function() {
    Route::get('health-check', HealthCheckController::class);

    Route::prefix('boards')->group(function() {
        Route::post('/', CreateBoardController::class);
        Route::get('/{id}', GetBoardByIdController::class);
        Route::patch('/{id}', UpdateBoardController::class);
        Route::delete('/{id}', DeleteBoardController::class);
        Route::get('/', SearchBoardsController::class);
    });
});
