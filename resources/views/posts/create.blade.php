@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>
    {{-- If you gonna use a file element on a form you have to have the enctype attribute in the form inorder to submit that file --}}
    {!! Form::open(['action' => 'postsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
            {{ Form::Text('title', '', ['class' => 'form-control', 'placeholder' => 'Title here']) }}
        </div>
        <div class="form-group">
            {{ Form::label('body', 'Body', ['class' => 'form-label']) }}
            {{ Form::TextArea('body', '', ['class' => 'form-control', 'placeholder' => 'Body here', 'rows' => 8, ]) }}
        </div>
        <div class="form-group">
            {{ Form::file('cover_image') }}
        </div>
        {{ Form::submit('Create Post', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

@endSection
{{-- 




            
            --email
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email','', ['class' => 'form-control']) }}
            </div> ~

            --checkboxes
            {{ Form::checkbox('pizza', 'Pizza') }}
            {{ Form::label('pizza', 'Pizza') }}<br>
    
            {{ Form::checkbox('kfc', 'KFC') }}
            {{ Form::label('kfc', 'KFC') }}<br>

            {{ Form::checkbox('burger', 'Burger') }}
            {{ Form::label('burger', 'Burger') }}<br>

            -passwords
            <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
            </div>

            --radio buttons
            <div class="form-group">
                <mark>{{ Form::label('gender', 'Gender', ['class' => 'bold'] ) }}</mark><br>
                <div>
                    {{ Form::radio('gender', 'Male') }}
                    {{ Form::label('male', 'Male') }}<br>
                    {{ Form::radio('gender', 'Female') }}
                    {{ Form::label('female', 'Female') }}<br>
                    {{ Form::radio('gender', 'Other') }}
                    {{ Form::label('other', 'Other') }}
                </div>
            </div>
        --}}
        


{{-- <script>
    button = document.getElementById("but");
    button.addEventListener('click', (e)=>{
        //e.preventDefault();

    })
</script> --}}