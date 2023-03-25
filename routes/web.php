<?php

use App\Models\Music;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Artiste;
use App\Models\Bande;
use App\Models\Comment;
use App\Models\Playlist;

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


Route::get('/dashboard', function () {
    $categorie = Category::all();
    $music = Music::all();
    $bande = Bande::all();
    $artiste = Artiste::all();
    $comments = Comment::all();
    return view('dashboard',compact('categorie','music','bande','artiste','comments'));
})->middleware(['auth','is_admin', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/', 'accueil')->name('accueil');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
// Route::view('/music', 'music')->name('music');



Route::get('/music/{id}/rate/{stars}', [\App\Http\Controllers\MusicController::class, 'rate'])->name('music.rate');

// Route::put('/comments/{comment}/approve', [\App\Http\Controllers\CommentController::class, 'approve'])->name('comments.approve');


Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);


Route::get('/search', [App\Http\Controllers\MusicController::class, 'rechercher'])->name('search');

Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('is_admin');
Route::resource('musics', \App\Http\Controllers\MusicController::class);

Route::get('musics/{mu}', [\App\Http\Controllers\MusicController::class, 'show'])->name('music.show');
Route::resource('comments', \App\Http\Controllers\CommentController::class);


Route::post('/musics/{music}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');


Route::get('/musics/{music}', [\App\Http\Controllers\MusicController::class, 'showComments'])->name('musics.show');


Route::resource('artistes', \App\Http\Controllers\ArtisteController::class)->middleware('is_admin');

Route::resource('bandes',\App\Http\Controllers\BandeController::class)->middleware('is_admin');

Route::post('/music/{id}/rate', [MusicController::class, 'rate'])->name('music.rate');



Route::post('/musics/{music}/archive', [\App\Http\Controllers\MusicController::class, 'archive'])->name('musics.archive');







