<?php
use App\Http\Controllers\TreninsController;
use App\Http\Controllers\TrenersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('trenins', TreninsController::class);
Route::post('trenins/{trenins}/addtreners',[TreninsController::class, 'addTreners'])->name('trenins.addtreners');
Route::post('trenins/{trenins}/removetreners',[TreninsController::class, 'removeTreners'])->name('trenins.removetreners');
Route::resource('treners', TrenersController::class);
Route::post('/trenins/{id}/toggle-favorite', [TreninsController::class, 'toggleFavorite'])->name('trenins.toggleFavorite');
Route::get('/my-favorites', [TreninsController::class, 'myFavorites'])->name('trenins.myFavorites');
Route::post('/trenins/{trenins}/comments', [TreninsController::class, 'storeComment'])->name('comments.store');
Route::delete('trenins/{trenins}/comments/{comment}', [TreninsController::class, 'destroyComment'])
    ->name('trenins.comments.destroy');
    Route::get('/treneri/search', [TrenersController::class, 'search'])->name('treners.search');
    Route::put('/trenins/{trenins}/add-treners', [TreninsController::class, 'addTreners'])->name('trenins.addTreners');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
