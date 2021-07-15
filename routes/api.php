<?php
use App\Http\Controllers\api\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('API')->name('api')->group(function(){
    Route::get('/pokemons/{q?}', [App\Http\Controllers\api\PokemonController::class, 'index'])->name('pokemon-index');
    // Route::get('/pokemons/{?q}', [App\Http\Controllers\api\PokemonController::class, 'index'])->name('pokemon-index');
    Route::post('/pokemons', [App\Http\Controllers\api\PokemonController::class, 'store'])->name('pokemon-store');;
    Route::get('/pokemons/edit/{id}', [App\Http\Controllers\api\PokemonController::class, 'show'])->name('pokemon-show');;
    Route::put('/pokemons/{id}', [App\Http\Controllers\api\PokemonController::class, 'update'])->name('pokemon-update');;
    // Route::patch('/pokemons/{id}', [App\Http\Controllers\api\PokemonController::class, 'updateP'])->name('pokemon-updateP');;
    Route::delete('/pokemons/{id}', [App\Http\Controllers\api\PokemonController::class, 'destroy'])->name('pokemon-destroy');;
   });
