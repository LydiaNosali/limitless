<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

#/
Route::get('/', function () {
    return view('welcome');
});

#Les authentifié
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
    Route::get('/permission-denied', 'HomeController@permissionDenied')->name('nopermission')->middleware('auth');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

#Les authentifié admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('/admin', 'HomeController@adminIndex');
    Route::get('user/suspend', 'UserController@suspend');
    Route::post('user/suspend', 'UserController@suspend');
    Route::get('autocompletecompta', 'UserController@searchcompta');
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

#Les authentifié comptable
Route::group(['middleware' => ['auth','comptable']], function () {
    Route::get('/comptable', 'HomeController@comptableIndex');
    Route::get('document/create', 'RepertoireController@index');
    Route::post('document/create', 'DocumentController@store');
    Route::get('document/create', 'DocumentController@index');
    Route::post('document/annuler', 'DocumentController@update');
    Route::get('autocomplete', 'RepertoireController@search');
    Route::get('autocompletedoc', 'DocumentController@search');
    Route::get('autocompleteclient', 'UserController@search');

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

#Les authentifié client
Route::group(['middleware' => ['auth','client']], function () {
    Route::get('/client', 'HomeController@clientIndex')->middleware('client');
    Route::get('sommaireclient', function () {
        return view('pages.sommaireclient');
    })->name('sommaireclient');
});
