<?php

use App\Models\Plan;
use App\Enums\SignatureStatus;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeAddressController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Middleware\TrustProxies;

Route::get('/', function () {
    return view('welcome');
});

//Midleware aplicado na rota dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Middleware aplicado em varias rotas
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
Route::get('/test', function(){

    $plan = Plan::create([
        'name' => 'Last Plan',
        'short_description' => 'A terrible plan',
        'price' => 2990
    ]);

    $client = Auth::user()->client()->create([
        'document' => '09987754434',
        'birthdate' => '1990_04-12'
    ]);

    $client->signatures()->create([
        'plan_id' => $plan->id,
        'status' => SignatureStatus::ACTIVED
    ]);

});
*/

//Route::get('/test', [SignatureController::class, 'index']);

// Route::resource('funcionario',EmployeeController::class)
//     ->parameters([
//     'funcionario' => 'employee'
//     ]);

// Route::get('userland', fn() => 'acess granted')
//     ->middleware('checkToken:simple-token');

// Route::resource('funcionario.endereco', EmployeeAddressController::class)
// ->parameters([
//     'funcionario' => 'employee',
//     'endereco' => 'address'
// ])->only(['index','destroy']);

Route::resource('plano', PlanController::   class)
    ->withoutMiddleware([
        TrustProxies::class,
        VerifyCsrfToken::class
    ])->parameters([
        'plano'=> 'plan:cod'
    ]);
