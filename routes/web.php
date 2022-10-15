<?php

use App\Http\Controllers\TuningController;
use App\Models\Tuning;
use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'tunings' => Tuning::orderBy('scheduled_at', 'asc')->where('scheduled_at', '>', Carbon::now())->available()->get()
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/schedule', function () {
    return inertia('Schedule');
})->middleware(['auth', 'verified'])->name('schedule');

Route::resource('tunings', TuningController::class)->only(['index','store','update']);

require __DIR__.'/auth.php';
