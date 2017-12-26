@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="card border-success mb-3" style="max-width: 30rem;">
        <div class="card-header"><h5>Dashboard</h5></div>
            <div class="card-body text-success">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! 
                    <br><br>
                    <a href="/Post/create"  class="btn btn-primary">New Post !</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">       
        @foreach($posts as $post)
            <div class="container">
                <div <div class="card border-success mb-3" style="max-width: 30rem;">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active"> {{$post->fname}}   {{$post->lname}}</a>
                        <a href="#" class="list-group-item list-group-item-action">{{$post->subject}}</a>
                        <div class="card-header">
                            <a href="/Post/{{$post->id}}/edit"  class="btn btn-info">Edit</a>
                                <button class='btn btn-danger'>
                                        {!! Form::open(['action' => ['Posts_Controller@update',$post->id] , 'Method'=>'POST']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete')}}       
                                        {!! Form::close() !!}
                                </button>

                        </div>
                    </div>
            </div>
            </div>
        @endforeach
            
        </div>
</div>
@endsection
