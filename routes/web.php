<?php

use App\Http\Controllers\CSVController;
use App\Models\Prospect;
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
    return view('welcome', [
        'prospects' => Prospect::paginate()
    ]);
});

Route::post('upload-csv', CSVController::class)->name('upload');
