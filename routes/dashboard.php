<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DinossauroController;
use App\Http\Controllers\TipoDinossauroController;
use App\Http\Controllers\FamiliaDinossauroController;

use App\Http\Livewire\FamiliaDinossauro\{
    FamiliaDinossauroList,
    FamiliaDinossauroCreate,
    FamiliaDinossauroEdit
};

use App\Http\Livewire\TipoDinossauro\{
    TipoDinossauroCreate,
    TipoDinossauroEdit,
    TipoDinossauroList
};

use App\Http\Livewire\Dinossauro\{
    DinossauroCreate,
    DinossauroList,
    DinossauroEdit,
    DinossauroShow
};



Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/tipos', [TipoDinossauroController::class, 'index'])->name('tipo');
Route::get('/familias', [FamiliaDinossauroController::class, 'index'])->name('familia');
Route::get('/dinossauros', [DinossauroController::class, 'index'])->name('dinossauro');

Route::prefix('familias-dinossauros')->name('familias-dinossauros.')->group(function() {
    Route::get('/', FamiliaDinossauroList::class)->name('index');
    Route::get('/create', FamiliaDinossauroCreate::class)->name('create');
    Route::get('/edit/{familia_dinossauro}', FamiliaDinossauroEdit::class)->name('edit');
});

Route::prefix('tipos-dinossauros')->name('tipos-dinossauros.')->group(function() {
    Route::get('/', TipoDinossauroList::class)->name('index');
    Route::get('/create', TipoDinossauroCreate::class)->name('create');
    Route::get('/edit/{tipo_dinossauro}', TipoDinossauroEdit::class)->name('edit');
});

Route::prefix('dinossauros')->name('dinossauros.')->group(function() {
    Route::get('/', DinossauroList::class)->name('index');
    Route::get('/create', DinossauroCreate::class)->name('create');
    Route::get('/edit/{dinossauro}', DinossauroEdit::class)->name('edit');
    Route::get('/show/{dinossauro}', DinossauroShow::class)->name('show');
});
