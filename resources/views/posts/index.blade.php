@extends('blog::layouts.app')
@section('mainClass', 'text-secondary')

@switch(request()->route()->getName())
    @case('blog.categories.show')
        @section('title', $category->title.' -')
    @break
    @case('blog.tags.show')
        @section('title', '标签 | '.$tag->title.' -')
    @break
    @default
@endswitch

@section('content')
    <div class="container p-3">
        <ul class="list-unstyled article-list">
            @foreach ($posts as $post)
                <li class="media mb-3">
                    <div class="media-body">
                        <h1 class="mb-1"><a class="text-dark" href="{{ $post->link() }}">{{ $post->title }} </a></h1>
                        <p>
                            <a class="text-secondary" href="{{ $post->category->link() }}"><small>{{ $post->category->title }}</small></a>
                            &rarr; <small>update: {{ $post->created_at->diffForHumans() }}</small>
                        </p>
                        <p>

                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection