@extends('layouts.app')

@section('content')

<br>
<div class="container">
  <div class="card border-success mb-3" style="max-width: 42rem;">
    <div class="card-header"><h5>Edit Post</h5></div>
      <div class="card-body text-success">
        <div class="container">
            {!! Form::open(['action' => ['Posts_Controller@update',$post->id] , 'Method'=>'POST','enctype'=>'multipart/form-data']) !!}
                <div class='form-group'>
                    {{Form::label('fname', 'First Name')}}
                    {{Form::text('fname',$post->fname,['class'=>'form-control is-valid','placeholder'=>'Enter Your First Name'])}}

                </div>
                <div class='form-group'>
                    {{Form::label('lname', 'Last Name')}}
                    {{Form::text('lname',$post->lname,['class'=>'form-control is-valid','placeholder'=>'Enter Your Last Name'])}}

                </div>
                <div class='form-group'>
                    {{Form::label('subject', 'Subject')}}
                    {{Form::text('subject',$post->subject,['class'=>'form-control is-valid','placeholder'=>'Enter Your Subject'])}}

                </div> 
                <div class='form-group'>
                    {{Form::label('body', 'Discription')}}
                    {{Form::textarea('body',$post->body,['class'=>'form-control is-valid',
                    'placeholder'=>'Enter Your Discription','rows'=>'4','id'=>'article-ckeditor'])}}

                </div>
                <div class='form-group'>
                        {{Form::file('post_image',['class'=>'form-control is-valid'])}}
    
                    </div>
                <div class=''>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('update',['class'=>'btn btn-success'])}}
                </div>

            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>   
</div>



@endsection  