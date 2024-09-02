<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    // kayode$^125d
    Route::post('/job', [JobController::class, 'jobpost']);
    Route::get('/jobs', [JobController::class, 'getUserJobs']);
    Route::get('/jobs/user/{user_id}', [JobController::class, 'findUserJobs']);
    Route::get('/jobs/{id}', [JobController::class, 'show']);
    Route::delete('/jobs/{jobId}', [JobController::class, 'deleteJob']);
    Route::put('/jobs/{id}', [JobController::class, 'update']);
    Route::get('/jobs/search', [JobController::class, 'search']);

