<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post  $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function delete() {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
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


