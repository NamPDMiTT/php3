<?php

use App\Http\Controllers\Api\ApiLoginController;
use App\Http\Controllers\Api\ApiStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [ApiLoginController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::delete('/logout', [ApiLoginController::class, 'logout']);

    Route::prefix('students')->group(function () {
        // Lấy danh sách
        Route::get('/', [ApiStudentController::class, 'index']);

        // Lấy thông tin
        Route::get('/{id}', [ApiStudentController::class, 'show']);

        // Thêm mới
        Route::post('/', [ApiStudentController::class, 'store']);

        // Sửa
        Route::put('/{id}', [ApiStudentController::class, 'update']);

        // Xóa
        Route::delete('/{id}', [ApiStudentController::class, 'destroy']);
    });
});
