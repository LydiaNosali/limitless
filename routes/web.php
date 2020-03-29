<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>'client'], function() {
    Route::get('/home', 'HomeController@adminIndex')->name('home')->middleware('auth');
});

Route::group(['middleware' => 'client'], function () {
    Route::get('/admin', 'HomeController@adminIndex')->name('admin')->middleware('admin');
    Route::get('/client', 'HomeController@clientIndex')->name('client')->middleware('client');
    Route::get('/comptable', 'HomeController@comptableIndex')->name('comptable')->middleware('comptable');
    Route::get('/permission-denied', 'HomeController@permissionDenied')->name('nopermission');

    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('user/suspend', 'UserController@suspend');
    Route::post('user/suspend', 'UserController@suspend');

    Route::get('user/desuspend', 'UserController@desuspend');
    Route::post('user/desuspend', 'UserController@desuspend');

	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

    Route::get('notifications', function () {
        return view('pages.notifications');
    })->name('notifications');

    Route::post('/repertoire/supprimer', function () {
        return view('repertoire.supprimer');
    })->name('repertoire/supprimer');

    Route::get('/repertoire/supprimer', function () {
        return view('repertoire.supprimer');
    })->name('repertoire/supprimer');

    Route::get('/repertoire/create', function () {
        return view('repertoire.create');
    })->name('repertoire/create');

    Route::post('/repertoire/create', function () {
        return view('repertoire.create');
    })->name('repertoire/create');

    Route::get('/repertoire/sommaire', function () {
        return view('repertoire.sommaire');
    })->name('repertoire/sommaire');

    Route::post('/repertoire/sommaire', function () {
        return view('repertoire.sommaire');
    })->name('repertoire/sommaire');

    Route::get('repertoire', function () {
        return view('pages.repertoire');
    })->name('repertoire');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

});

Route::group(['middleware' => ['auth','client']], function () {

    Route::get('sommaireclient', function () {
        return view('pages.sommaireclient');
    })->name('sommaireclient');

});

Route::group(['middleware' => ['auth','comptable']], function () {

    Route::get('document/create', 'RepertoireController@index');
    Route::post('document/create', 'DocumentController@store');
    Route::get('document/create', 'DocumentController@index');
    Route::post('document/annuler', 'DocumentController@update');
    Route::get('autocomplete', 'RepertoireController@search');
    Route::get('autocompleted', 'DocumentController@search');
    Route::get('autocompleteded', 'UserController@search');
    Route::get('autocompletededed', 'UserController@searchcompta');
    Route::post('repertoire/create', 'RepertoireController@store');
    Route::post('repertoire/supprimer', 'RepertoireController@update');
    Route::resource('salaire', 'SalaireController', ['except' => ['show']]);

    Route::get('document/compta', 'DocumentController@comptabiliser');
    Route::post('document/compta', 'DocumentController@comptabiliser');

    Route::get('document/decompta', 'DocumentController@decomptabiliser');
    Route::post('document/decompta', 'DocumentController@decomptabiliser');

    Route::get('document', function () {
        return view('pages.document');
    })->name('document');
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

    Route::post('/document/modifier', function () {
        return view('document.modifier');
    })->name('document/modifier');

    Route::get('/document/modifier', function () {
        return view('document.modifier');
    })->name('document/modifier');

    Route::post('/document/sommaire', function () {
        return view('document.sommaire');
    })->name('document/sommaire');

    Route::get('/document/sommaire', function () {
        return view('document.sommaire');
    })->name('document/sommaire');


});

