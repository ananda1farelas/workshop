<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');


Route::get('/auth/google/callback', function () {

    try {
        $googleUser = Socialite::driver('google')->user();
    } catch (\Exception $e) {
        return redirect()->route('login')
            ->with('error', 'Login Google gagal');
    }

    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name'      => $googleUser->getName(),
            'id_google' => $googleUser->getId(),
            'password'  => bcrypt(uniqid())
        ]
    );

    $otp = rand(100000, 999999);

    $user->update([
        'otp' => $otp,
        'otp_expired_at' => now()->addMinutes(5),
    ]);

    // Kirim OTP ke email (sementara simple)
    Mail::raw("Kode OTP kamu adalah: $otp", function ($message) use ($user) {
        $message->to($user->email)
                ->subject('Kode OTP Login');
    });

    Auth::login($user, true);

    return redirect()->route('otp.form');

})->name('google.callback');

Route::middleware('auth')->group(function () {

    Route::get('/otp', function () {
        return view('auth.otp');
    })->name('otp.form');

    Route::post('/otp', function (Request $request) {

        $request->validate([
            'otp' => 'required'
        ]);

        $user = auth()->user();

        if (!$user->otp) {
            return back()->with('error', 'OTP tidak ditemukan');
        }

        if (trim($request->otp) != (string)$user->otp) {
            return back()->with('error', 'OTP salah');
        }

        if (now()->greaterThan($user->otp_expired_at)) {
            return back()->with('error', 'OTP kadaluarsa');
        }

        $user->update([
            'otp' => null,
            'otp_expired_at' => null
        ]);

        return redirect()->route('dashboard');
    
    })->name('otp.verify'); 
});
Route::get('/pdf/sertifikat', function () {

    $pdf = Pdf::loadView('pdf.sertifikat')
              ->setPaper('a4', 'landscape');

    return $pdf->download('sertifikat.pdf');
});

Route::get('/pdf/undangan', function () {

    $pdf = Pdf::loadView('pdf.undangan')
              ->setPaper('a4', 'portrait');

    return $pdf->download('undangan.pdf');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);

    Route::get('/pdf/sertifikat', function () {
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.sertifikat')
                ->setPaper('a4', 'landscape');

        return $pdf->download('sertifikat.pdf');
    })->name('pdf.sertifikat');

    Route::get('/pdf/undangan', function () {
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.undangan')
                ->setPaper('a4', 'portrait');

        return $pdf->download('undangan.pdf');
    })->name('pdf.undangan');

});