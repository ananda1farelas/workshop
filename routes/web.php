<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Default Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

/*
|--------------------------------------------------------------------------
| Laravel Auth
|--------------------------------------------------------------------------
*/

Auth::routes();

/*
|--------------------------------------------------------------------------
| Google Login
|--------------------------------------------------------------------------
*/

// Redirect ke Google
Route::get('/login/google', function () {
    return Socialite::driver('google')->stateless()->redirect();
})->name('google.login');

// Callback dari Google
Route::get('/login/google/callback', function () {

    try {
        $googleUser = Socialite::driver('google')->stateless()->user();
    } catch (\Exception $e) {
        return redirect('/login')->with('error', 'Login Google gagal');
    }

    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'id_google' => $googleUser->getId(),
            'password' => bcrypt('passworddummy')
        ]
    );

    Auth::login($user, true);

    return redirect()->route('dashboard');

})->name('google.callback');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);
});
