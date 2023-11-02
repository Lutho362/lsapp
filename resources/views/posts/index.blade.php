@extends('layouts.app')

@section('content')
    
    @if (count($posts) > 0)
        @foreach($posts as $post)
            <div class="row well">
                <div class="col-md-4">
                    <img style="width: 100%" src="storage/cover_images/{{ $post->cover_image }}" alt="Empty image" >
                </div>
                <div class="col-md-8">
                    <a href="posts/{{ $post->id }}"><h1 style="font-weight: 900; font-size: 55px;">{{ $post->title }}</h1></a>
                    <small>Created at {{ $post->created_at }} by {{ $post->user->name }}</small>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>Sorry, There are no posts available</p>
    @endif
@endsection

