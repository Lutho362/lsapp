@extends('layouts.app')

@section('content')
    <a href="/lsapp/public/posts" class="btn btn-default">Go back</a>
    <h1 style="text-decoration: underline;">{{ $post->title }}</h1>
    <img style="width: 100%" src="../storage/cover_images/{{ $post->cover_image }}" >
    <br ><br >
    <h4>
        {{ $post->body }}
    </h4>
    <hr>
    <small>Was written at {{ $post->created_at }}</small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user->id)
            <a href="{{ $post->id }}/edit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp; Edit &nbsp;&nbsp;&nbsp;&nbsp;</a>

            {!! Form::open(['action' => ['postsController@destroy', $post->id ], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        @endif    
    @endif
    <br><br><br>
@endsection
