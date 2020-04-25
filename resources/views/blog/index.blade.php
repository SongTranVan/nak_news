@extends('layout.master')

@section('title', 'Blog')

@section('content')
<div class="container col-md-8 col-md-offset-2">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($posts->isEmpty())
        <p> There is no post.</p>
    @else
        @foreach ($posts as $post)
        <div class="card mb-lg-4">
            <h5 class="card-header"><a href="{{ route('show_a_blog', $post->slug) }}">{!! $post->title !!}</a></h5>
            <div class="card-body">
              <p class="card-text">{!! mb_substr($post->content,0,400) !!}...</p>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection