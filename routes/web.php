<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('/type_utilisateurs', 'App\Http\Controllers\TypeUtilisateurController');
Route::resource('/users', 'App\Http\Controllers\UserController');
Route::resource('/republiques', 'App\Http\Controllers\RepubliqueController');
Route::resource('/regions', 'App\Http\Controllers\RegionController');
Route::resource('/candidats', 'App\Http\Controllers\CandidatController');


/*** Route de recuperation et de  traitement des votes ***/
Route::get('/votes','App\Http\Controllers\VoteController@form')->name('votes_form');
Route::post('/votes','App\Http\Controllers\VoteController@store')->name('votes_store');

/*** Route de recuperation des electeurs qui ont votés ***/
Route::get('/electeurvoteparticiper','App\Http\Controllers\ElecteurVoteController@participervote')->name('participer_vote');

/*** Route de recuperation des electeurs qui n'ont pas votés ***/
Route::get('/electeurvotepasparticiper','App\Http\Controllers\ElecteurVoteController@pasparticipervote')->name('pasparticiper_vote');

/*** Route de recuperation des voix par candidats ***/
Route::get('/nombrevotecandidat','App\Http\Controllers\AfficherCandidatController@afficherresultatcandidat')->name('nombrevotecandidat');

/*** Route de recuperation des voix par candidats sur la page accueil ***/
Route::get('/nbvotecandidat','App\Http\Controllers\AfficherCandidatController@afficherresultatcandidat')->name('nbvotecandidat');

/*** Route de recuperation des voix par region ***/
Route::get('/nombrevoteregion','App\Http\Controllers\AfficherCandidatController@nombrevoteregion')->name('nombrevoteregion');

/*** Route d'erreur ***/
Route::get('/erreur','App\Http\Controllers\ErreurController@erreur')->name('erreur');

/*** Route verification de mot de passe et access ***/
Route::get('/verification','App\Http\Controllers\ConnexionController@formulaire')->name('formverifier');
Route::post('/verification','App\Http\Controllers\ConnexionController@traitement')->name('verifierpassword');

/*** Route pour fermer les votes ***/
Route::get('/limitevote','App\Http\Controllers\LimiteVoteController@limitevote')->name('votelimite');
Route::get('/voteactiver','App\Http\Controllers\LimiteVoteController@activervote')->name('voteactiver');
Route::get('/votedesactive','App\Http\Controllers\LimiteVoteController@desactivervote')->name('votedesactiver');
Route::get('/voteauto','App\Http\Controllers\LimiteVoteController@voteauto')->name('voteauto');

/*** Route pour page de fermeture de vote pour electeur ***/
Route::get('/votefermer','App\Http\Controllers\HomeController@index')->name('votefermer');

Route::post('/home','App\Http\Controllers\HomeController@index')->name('traitement');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::get('profileelecteur', ['as' => 'profile.editelecteur', 'uses' => 'App\Http\Controllers\ProfileController@editelecteur']);//ajoute
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

