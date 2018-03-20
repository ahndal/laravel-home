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

/*
|----------------------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|----------------------------------------------------------------------------------------
*/
Route::get('/insert', function () {
    DB::insert('insert into posts(title, contents) values(?, ?)', ['title', 'contents']);
});

Route::get('/read', function() {
    $results = DB::select('select * from posts where id = ?', [1]);

    return var_dump($results);
});

Route::get('/update', function() {
    $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);

    return $updated;
});

Route::get('/delete', function() {
    $deleted = DB::update('delete from post where id = ?', [1]);

    return $deleted;
});

/*
|----------------------------------------------------------------------------------------
|ELOQUENT
|----------------------------------------------------------------------------------------
*/
Route::get('/read', function() {
    $posts = Post::all();

    foreach($posts as $post) {
       return $post->title
    }
});

Route::get('/find', function() {
    $post = Post::find(2);

    return $post->title;
})
