<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\MasterData\Bank;
use App\Livewire\MasterData\Emoney;
use App\Livewire\MasterData\Jenis;
use App\Livewire\MasterData\Pelanggan;
use App\Livewire\MasterData\Satuan;
use App\Livewire\MasterData\Supplier;
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
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('master-data/satuan', Satuan::class);
    Route::get('master-data/jenis', Jenis::class);
    Route::get('master-data/bank', Bank::class);
    Route::get('master-data/emoney', Emoney::class);

    Route::get('master-data/supplier', Supplier::class);
    Route::get('master-data/pelanggan', Pelanggan::class);
});

Route::group(['middleware' => ['auth', 'role:user']], function() {

});

require __DIR__.'/auth.php';
