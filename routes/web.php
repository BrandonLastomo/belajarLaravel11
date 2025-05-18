<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});
Route::get('/posts', function () {
    return view('posts', ['title' => 'blog', 'posts' => Post::all()]);
});

// change to route model binding
Route::get('/posts/{post:slug}', function(Post $post){

    // $post = Post::find($slug);

    return view('post', ['title' => 'Single Post', 'post' => $post]);

});

// my ver
// Route::get('/authors/{author:id}', function($authorId){
//     return view('author', [
//         'title' => 'Posts by Author',
//         'posts' => Post::where('author_id', $authorId)->get()
//     ]);
// });

// wpu ver
Route::get('/authors/{author}', function(User $author){
    return view('posts', [
        'title' => 'Posts by ' . $author->name,
        'posts' => $author->posts
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});