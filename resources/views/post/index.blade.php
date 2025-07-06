@extends('layouts.main')
@section('content')
    <div>
        <dvi>
            <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add one</a>
        </dvi>
        @foreach($posts as $post)
            <div><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
        @endforeach
    </div>
@endsection
