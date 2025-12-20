<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Trang chủ: Tự động chuyển hướng đến danh sách sự cố
Route::get('/', function () {
    return redirect()->route('issues.index');
});

Route::resource('issues', IssueController::class);