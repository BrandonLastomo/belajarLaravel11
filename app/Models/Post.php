<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post {
    public static function allPost(){
        return [
            [
                'id' => 1,
                'slug' => 'lorem-ipsum-1',
                'postTitle' => 'Lorem Ipsum 1',
                'author' => 'Brandon Lastomo',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit repudiandae, aliquam ea fuga beatae placeat! Accusamus dignissimos accusantium soluta explicabo sint unde saepe laboriosam quasi itaque, officia magnam vel minima.'
            ],
            [
                'id' => 2,
                'slug' => 'lorem-ipsum-2',
                'postTitle' => 'Lorem Ipsum 2',
                'author' => 'Brandon Lastomo',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit repudiandae, aliquam ea fuga beatae placeat! Accusamus dignissimos accusantium soluta explicabo sint unde saepe laboriosam quasi itaque, officia magnam vel minima.'
            ]
        ];
    }

    // memindahkan beban pencarian post ke Model
    public static function find($slug){
        // return sebelum Arr ngembaliin data-data dari post pertama yang ketemu dari hasil pencarian post pake method ::first
        //     return Arr::first(static::allPost(), function($post) use ($slug){ // use($id) dipake supaya id yg dilempar ke link (/posts/{id}) bisa dipake di function callback di sini (di dalem first ini)
        //     // return sebelum $post ngembaliin hasil pengecekan lewat slug
        //     return $post['slug'] == $slug;
        // });

    
    $post = Arr::first(static::allPost(), fn ($post) => $post['slug'] == $slug);
    if (!$post) {
        abort(404);
    }
    return $post;
    }
}