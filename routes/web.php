<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
Route::get('/authors/{user:username}', function(User $user){
    return view('posts', [
        'title' => count($user->posts) . ' Posts by ' . $user->name,
        'posts' => $user->posts
    ]);
});

Route::get('/categories/{category}', function(Category $category){
    return view('posts', [
        'title' => 'Posts in ' . $category->name,
        'posts' => $category->posts
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});