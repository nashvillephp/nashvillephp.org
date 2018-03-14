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

$cacheTtl = [
    '12hours' => 60 * 12,
    'day' => 60 * 24,
    'week' => 60 * 24 * 7,
];

Route::get('/', 'PageController@home')
    ->name('home')
    ->middleware("cacheResponse:{$cacheTtl['12hours']}");

Route::middleware(["cacheResponse:{$cacheTtl['week']}"])->group(function () {
    Route::get('/about', 'PageController@about')->name('about');
    Route::get('/sponsors', 'PageController@sponsors')->name('sponsors');
    Route::get('/speakers', 'PageController@speakers')->name('speakers');

    Route::get('/articles', function () {
        return view('article-list');
    });

    Route::get('/articles/1234', function () {
        return view('article');
    });
});

Route::middleware(['doNotCacheResponse'])->group(function () {
    Route::get('/speak', 'ProposalController@proposalForm')->name('speak');
    Route::post('/speak', 'ProposalController@processProposal');
});
