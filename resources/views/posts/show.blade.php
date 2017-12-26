@extends('layouts.app')

@section('content')

<br>
<div class="container">
  <div class="page-header">
    <h4>Post Details</h4>
    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
    <h5><a href="/Post/{{$post->id}}/edit"  class="badge badge-pill badge-dark">Edit</a>
    <a class='badge badge-pill badge-danger'>
      {!! Form::open(['action' => ['Posts_Controller@update',$post->id] , 'Method'=>'POST']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete')}}       
      {!! Form::close() !!}
    </a></h5>
    @endif
    @endif
  </div>
  
  <div class="list-group" style="max-width: 40rem ;">
        
    <a href="#" class="list-group-item list-group-item-action disabled">{{"First Name : "}} {{$post->fname}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">{{"Last Name : "}}{{$post->lname}}</a></a> 
    <a href="#" class="list-group-item list-group-item-action disabled">{{"Subject : "}}{{$post->subject}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">{{"Body : "}}{!!$post->body!!}</a>
    <img src="{{ URL::to('/') }}/images/{{$post->post_image}}" class="img-thumbnail" 
    alt="{{$post->post_image}}" style="width:40%,height:40%">
    {{--<img src="/storage/post_image/{{$post->post_image}}" class="img-thumbnail" 
      alt="{{$post->post_image}}" style="width:100%,height:10%">--}}
    <a href="#" class="list-group-item list-group-item-action disabled">{{"Created at : "}}{{$post->created_at}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">{{"Updated at : "}}{{$post->updated_at}}</a>
    <span class="badge badge-info">BY : {{$post->user->name}}</span>
  </div>
  <br>
  <h6><a href="/Post" class="badge badge-pill badge-success">Back</a></h6>
        
</div>
<div>
  
</div>



@endsection  