@extends('layouts.app')

@section('content')


  <div class="container">
    <div class="page-header">
      <h1 >Posts</h1>
    </div>
    <div class="row">
      @foreach($posts as $post)
        <div class="col-sm-4">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active"> {{$post->fname}}   {{$post->lname}}</a>
            <a href="#" class="list-group-item list-group-item-action"><h5>{{$post->subject}}</h5>
              <img src="{{ URL::to('/') }}/images/{{$post->post_image}}" class="img-thumbnail" 
              alt="{{$post->post_image}}" style="width:40%,height:40%">
              {{--<img src="/storage/post_image/{{$post->post_image}}" class="img-thumbnail" 
              alt="{{$post->post_image}}" style="width:40%,height:40%">--}}  
              <span class="badge badge-info">BY : {{$post->user->name}}</span>
            </a>
            <a href="/Post/{{$post->id}}" class="pull-right" class="btn btn-link">More</a>
          </div>
        </div>
      @endforeach
      
      <div class="container">{{$posts->links()}}</div>
    </div>
  </div>

@endsection  