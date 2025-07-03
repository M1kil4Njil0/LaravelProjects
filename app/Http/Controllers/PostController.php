<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
//        $posts = Post::all();
//        return view('posts.index', compact('posts'));
    }

    public function create() {
        $postsArr = [
          [
              'title' => 'title of post from phpstorm',
              'content' => 'some interesting content',
              'image' => 'string.jpeg',
              'likes' => 20,
              'is_published' => 1,
          ],
            [
                'title' => 'another title of post from phpstorm',
                'content' => 'another some interesting content',
                'image' => 'anotherstring.jpeg',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        };

        dd('created');
//        $categories = Category::all();
//        return view('posts.create', compact('categories'));
    }

    public function update() {
        $post = Post::find(2);

        $post->update([
            'title' => '1111 updated',
            'content' => '1111 updated',
            'image' => '1111updated.jpeg',
            'likes' => 100,
            'is_published' => 0,
        ]);
        dd('updated');

    }

    public function delete() {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate() {

        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'someimage.jpeg',
            'likes' => 5,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some post'
        ], [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'someimage.jpeg',
            'likes' => 5,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate() {
        $anotherPost = [
            'title' => 'update some post',
            'content' => 'update some content',
            'image' => 'update some imageblabla.jpg',
            'likes' => 200,
            'is_published' => 1,
        ];
        $post = Post::updateOrCreate([
            'title' => 'some post',
        ],[
            'title' => 'update some post',
            'content' => 'update some content',
            'image' => 'update some imageblabla.jpg',
            'likes' => 200,
            'is_published' => 1,
        ]);
        dump($post->content);
    }
}


