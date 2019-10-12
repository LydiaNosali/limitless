<?php

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

/*Auth::routes();

Route::get('/document/create', 'DocumentController@create');
Route::post('/document', 'DocumentController@store');
Route::get('/document/{id}', 'DocumentController@show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');*/




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::post('document/create', function () {
		return view('document.create');
	})->name('document/create');

    Route::get('document/create', function () {
        return view('document.create');
    })->name('document/create');

    Route::post('/document/annuler', function () {
        return view('document.annuler');
    })->name('document/annuler');

    Route::get('/document/annuler', function () {
        return view('document.annuler');
    })->name('document/annuler');

    Route::post('/repertoire/supprimer', function () {
        return view('repertoire.supprimer');
    })->name('repertoire/supprimer');

    Route::get('/repertoire/create', function () {
        return view('repertoire.create');
    })->name('repertoire/create');

    Route::get('document', function () {
        return view('pages.document');
    })->name('document');
    Route::get('repertoire', function () {
        return view('pages.repertoire');
    })->name('repertoire');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');


});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('document/create', 'RepertoireController@index');
Route::post('document/create', 'DocumentController@store');
Route::post('document/annuler', 'DocumentController@update');
Route::get('document/create', 'DocumentController@index');
Route::get('autocomplete', 'RepertoireController@search');
Route::get('autocompleted', 'DocumentController@search');
