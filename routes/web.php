
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminProjectController;

// Frontend Public Routes
Route::get('/', [PortfolioController::class, 'index'])->name('home');

Route::get('/download-cv', [PortfolioController::class, 'downloadCV'])
    ->name('cv.download');

Route::post('/contact', [PortfolioController::class, 'contact'])
    ->name('contact.send');

// Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Login Form Submit
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    
if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    return redirect()->route('admin.projects.index');
}


    return back()
        ->withErrors([
            'email' => 'Email ya password ghalat hai.',
        ])
        ->onlyInput('email');
})->name('login.submit');

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

// Admin Protected Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/projects', [AdminProjectController::class, 'index'])
        ->name('projects.index');

    Route::post('/projects', [AdminProjectController::class, 'store'])
        ->name('projects.store');

    Route::delete('/projects/{id}', [AdminProjectController::class, 'destroy'])
        ->name('projects.destroy');

    Route::delete('/messages/{id}', [AdminProjectController::class, 'destroyMessage'])
        ->name('messages.destroy');
});

// Load authentication routes if the file exists
if (file_exists(__DIR__ . '/auth.php')) {
    require __DIR__ . '/auth.php';
}
