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

//First page as NOT logged in user or admin
Route::get('/', [
        'uses'  => 'SongController@songsToplist',
        'as'    => 'songs.songsToplist'
]);


//Single Song page
Route::get('/song/{song}', [
    'uses'      => 'SongController@showSong',
    'as'        => 'song.show'
]);


Auth::routes();


//Admins route
Route::group(['prefix'=>'admin', 'middleware' =>'admin'], function () {
    
    
    //Handle Users

    //Get all users
    Route::get('/users', 'UserController@index')->name('admin.users.all');

    //Edit an user
    Route::get('/user/{user}/edit', 'UserController@edit')->name('admin.user.edit');

    //Update an user
    Route::put('/user/{id}/', 'UserController@update')->name('admin.user.update');

    //Delete user
    Route::delete('/user/{id}', 'UserController@destroy')->name('admin.user.delete');


    //Handle Cateogries

    //Get all categories
    Route::get('/categories', 'CategoryController@index')->name('admin.categories.all');

    //Create Category
    Route::post('/category/create', 'CategoryController@store')->name('admin.category.create');

    //Edit Category
    Route::get('/category/{category}/edit', 'CategoryController@edit')->name('admin.category.edit');

    //Update Category
    Route::put('/category/{id}', 'CategoryController@update')->name('admin.category.update');

    //Delete Category
    Route::delete('/category/{id}/', 'CategoryController@destroy')->name('admin.category.delete');

    
    //Handle Comments

    //Get all comments
    Route::get('/comments', 'CommentController@index')->name('admin.comments.all');


    //Delete Comment
    Route::delete('/comment/{id}', 'CommentController@destroy')->name('admin.comment.delete');


    //Handle songs

    //Get all songs
    Route::get('/songs', 'SongController@index')->name('admin.songs.all');

    //Edit song
    Route::get('/song/{song}/edit', 'SongController@edit')->name('admin.song.edit');

    //Update song
    Route::put('/song/{id}/', 'SongController@update')->name('admin.song.update');

    //Delete song
    Route::delete('song/{id}', 'SongController@destroy')->name('admin.song.delete');

    //Export User-Models page
    Route::get('/export', 'UserController@exportUsersToCsv')->name('admin.users.export');

});


//Route-group for loged in users
Route::group(['prefix' => 'users', 'middleware' =>'auth'], function () {


    //Edit user
    Route::get('/edit', 'UserController@profileEdit')->name('user.profile.edit');

    
    //Update user
    Route::put('/user/{id}', 'UserController@profileUpdate')->name('user.profile.update');

    
    //Logged in user profile
    Route::get('/user/profile/', [
        'uses'      => 'UserController@dashboard',
        'as'        => 'user.profile'
    ]);

    
    //Show another users profile
    Route::get('/user/{user}', [
        'uses'      => 'UserController@showUser',
        'as'        => 'user.show'
    ]);


    //Show all users as logged in user
    Route::get('/all', [
        'uses'     => 'UserController@getAllUsers',
        'as'        => 'users.all'
    ]);


    //Create a new song
    Route::get('/user/song/create', [
        'uses'      => 'SongController@create',
        'as'        => 'song.create'
    ]);


    //Edit song as user
    Route::get('/user/song/{song}/edit', [
        'uses'     => 'SongController@userSongEdit',
        'as'        => 'user.song.edit'
    ]);


    //Save new song
    Route::post('/user/song/create', [
        'uses'      => 'SongController@store',
        'as'        => 'song.create'
    ]);


    //Vote song up
    Route::get('/song/{song}/vote/up', [
        'uses'      => 'VoteController@voteUp',
        'as'        => 'song.vote.up'
    ]);


    //Vote song down
    Route::get('/song/{song}/vote/down', [
        'uses'      => 'VoteController@voteDown',
        'as'        => 'song.vote.down'
    ]);


    //Create new comment to song
    Route::post('/song/{song}', [
        'uses'      => 'CommentController@store',
        'as'        => 'song.comment.create'

    ]);
});

