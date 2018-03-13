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

Route::get('/', 'PageController@home')->name('home');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/sponsors', 'PageController@sponsors')->name('sponsors');
Route::get('/speakers', 'PageController@speakers')->name('speakers');
Route::get('/speak', 'ProposalController@proposalForm')->name('speak');
Route::post('/speak', 'ProposalController@processProposal');

Route::get('/articles', function () {
    return view('article-list');
});

Route::get('/articles/1234', function () {
    return view('article');
});
