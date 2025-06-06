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

// Route::get('/posts', function () {
//     // eager loading to prevent N+1 problem
//     $posts = Post::latest()->with(['author', 'category'])->get();
//     return view('posts', ['title' => 'blog', 'posts' => $posts]);
// });

Route::get('/posts', function () {
    $posts = Post::latest()->get();
    return view('posts', ['title' => 'blog', 'posts' => $posts]);
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
// Route::get('/authors/{user:username}', function(User $user){
//     // lazy eager loading to prevent N+1 problem
//     $posts = $user->posts->load('category', 'author');
//     return view('posts', [
//         'title' => count($posts) . ' Posts by ' . $user->name, 'posts' => $posts
//     ]);
// });

Route::get('/authors/{user:username}', function(User $user){
    return view('posts', [
        'title' => count($user->posts) . ' Posts by ' . $user->name, 'posts' => $user->posts
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'title' => 'Posts in ' . $category->name, 'posts' => $category->posts
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});