<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\RepaymentController;
use App\Http\Controllers\AuthController;


Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('borrowers', [BorrowerController::class, 'borrowers']);

    Route::apiResource('loans', LoanController::class);

    Route::apiResource('repayments', RepaymentController::class);

    Route::get('borrowers/{borrower}/documents', [DocumentController::class, 'indexBorrowerDocuments']);
    Route::get('borrowers/{borrower}/documents/{document}', [DocumentController::class, 'show']);
    Route::post('borrowers/{borrower}/documents', [DocumentController::class, 'storeBorrowerDocuments']);
    Route::put('borrowers/{borrower}/documents/{document}', [DocumentController::class, 'update']);
    Route::delete('borrowers/{borrower}/documents/{document}', [DocumentController::class, 'delete']);

    Route::get('loans/{loan}/documents', [DocumentController::class, 'indexLoanDocuments']);
    Route::get('loans/{loan}/documents/{document}', [DocumentController::class, 'show']);
    Route::post('loans/{loan}/documents', [DocumentController::class, 'storeLoanDocuments']);
    Route::put('loans/{loan}/documents/{document}', [DocumentController::class, 'update']);
    Route::delete('loans/{loan}/documents/{document}', [DocumentController::class, 'delete']);

    Route::apiResource('borrowers', BorrowerController::class);

    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
});
