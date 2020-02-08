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



Route::get('/','HomeController@loginpage')->middleware(['login']);
Auth::routes();

Route::get('/loginstaff','HomeController@logindosen');
Route::post('/loginprocess','HomeController@login');
Route::get('/registerstaff','HomeController@registerstaff');
Route::post('/registprocess','HomeController@registprocess');
Route::get('/feedback','Homecontroller@feedback');
ROute::post('/sendfeedback','HomeController@sendFeedback');


Route::group(['middleware'=>['auth','mahasiswa']],function(){
    Route::get('/home', 'HomeController@index');
    Route::get('/profile','HomeController@profile');
    Route::get('/registergroup', 'HomeController@registerGroup')->middleware(['register']);
    Route::post('/regist','GroupController@registergroup');
    Route::get('/pkm','HomeController@pkm');
    Route::post('/store','PkmController@store');
    Route::get('/edit','PkmController@edit');
    Route::post('/update','PkmController@update');
    Route::get('/send/{id}','PkmController@send');
    Route::post('/delete','PkmController@delete');
    Route::get('/generate/{id}','PkmController@generate');
    Route::post('/profileupdate','HomeController@update');
    Route::get('/comment','HomeController@pkmComment');

    //pkm-k pkm-kc
    Route::post('/pkmkstore','PkmController@pkmkstore');
    Route::get('/pkmkedit', 'PkmController@pkmkedit');
    Route::post('/pkmkupdate' , 'PkmController@pkmkupdate');
    Route::get('/pkmkgenerate/{id}','PkmController@pkmkgenerate');
    Route::get('/pkmksend/{id}','PkmController@pkmksend');
    Route::post('/pkmkdelete','PkmController@pkmkdelete');
});


Route::prefix('dosen')
    ->middleware(['auth','dosen'])
    ->group(function(){
        Route::get('/','DosenController@index');
        Route::get('/profile','DosenController@profile');
        Route::post('/profileupdate','DosenController@update');
        Route::get('/group','DosenController@grouplist');
        Route::get('/view','DosenController@viewpkm');
        Route::get('/viewpkmk','DosenController@viewpkmk');
        Route::post('/comment','DosenController@addcomment');
        Route::post('/approve','DosenController@approve');
        Route::get('/detailpkm','DosenController@viewDetail');
        Route::get('/detailpkmk','DosenController@viewDetailPKMK');
        
});
