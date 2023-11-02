@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Dashboard</b></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="posts/create" class="btn btn-primary">Create Post</a>

                    <h3>Your Posts</h3>
                    @if (count($posts) > 0)
                        <table class="table table-striped">
                            <thead>                           
                                <th>Title</th>
                                <th></th>
                                <th></th>                          
                            </thead>                      
                            @foreach($posts as $post )
                                <tbody>                          
                                    <td><a href="posts/{{ $post->id }}" style="font-size: 20px;">{{  $post->title }}</a></td>
                                    <td><a href="posts/{{ $post->id }}/edit" class="btn btn-default">edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['postsController@destroy', $post->id ], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}    
                                    </td>                        
                                </tbody>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts, click create post to create one</p>    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
