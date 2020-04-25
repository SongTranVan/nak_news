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

Route::get('/', 'PagesController@home')->name('home');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/contact', 'TicketsController@create')->name('contact');

Route::post('/contact', 'TicketsController@store');

Route::get('/tickets', 'TicketsController@index')->name('all_tickets');

Route::get('/tickets/{slug}', 'TicketsController@show')->name('view_a_ticket');

Route::get('/tickets/{slug}/edit', 'TicketsController@edit')->name('edit_a_ticket');

Route::post('/tickets/{slug}/edit', 'TicketsController@update');

Route::post('/tickets/{slug}/delete', 'TicketsController@destroy')->name('delete_a_ticket');

Route::get('sendemail', function(){
    $data = array('name' => 'Nankurunaisa',);
    
    Mail::send('emails.welcome', $data, function($message)
    {
        $message->from('songtranvantest@gmail.com', 'Nankurunaisa');
        $message->to('songtranvan2511@gmail.com')->subject('Nankurunaisa test email');
    });

    return "Your email has been sent successfully!";
});

Route::post('/comment', 'CommentsController@newComment')->name('create_new_comment');

/* Blog */
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/{slug?}', 'BlogController@show')->name('show_a_blog');


Auth::routes();

Route::get('users/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('users/register', 'Auth\RegisterController@register');

Route::get('users/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function(){
    Route::get('users', 'UsersController@index');
    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');
    Route::get('users/{id}/edit', 'UsersController@edit')->name('edit_user');
    Route::post('users/{id}/edit', 'UsersController@update');
    Route::get('/', 'PagesController@home')->name('admin_dashboard');

    //Post
    Route::get('posts', 'PostsController@index');
    Route::get('posts/create', 'PostsController@create');
    Route::post('posts/create', 'PostsController@store');
    Route::get('posts/{id?}/edit', 'PostsController@edit')->name('edit_post');
    Route::post('posts/{id?}/edit', 'PostsController@update');

    //Category
    Route::get('categories', 'CategoriesController@index')->name('all_categories');
    Route::get('categories/create', 'CategoriesController@create')->name('new_category');
    Route::post('categories/create', 'CategoriesController@store');
});
