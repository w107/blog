@extends('blog::layouts.app')
@section('title', $post->title.' -')
@section('mainClass', 'text-dark')
@section('keywords', $keywords)
@section('description', mb_substr(strip_tags($post->contentToHtml()), 0, 115))
@section('content')
    <div class="container p-4 bg-white shadow">
        <h1>{{ $post->title }}</h1>
        <p><div></div></p>
        <div class="d-flex">
            <p>
                <small title="{{ $post->created_at }}">发布于 {{ $post->created_at->toDateString() }}</small>
                |
                <small title="{{ $post->updated_at }}">最后更新 {{ $post->updated_at->toDateString() }}</small>
                |
                <small>浏览量 {{ $post->view_count }}</small>
            </p>
        </div>
        <hr>

        <article class="markdown-body">
            {!! $post->contentToHtml() !!}
        </article>
    </div>
    @if (blog_setting('changyan_config'))
        <div class="container p-4 bg-white shadow">
            @include('blog::common._changyan', ['source_id' => $post->id, 'config' => blog_setting('changyan_config')])
        </div>
    @endif
@endsection