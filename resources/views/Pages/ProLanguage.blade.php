@extends('layouts.app')


<div class="content">
   <div class="title m-b-md">
       @section('content')
       Programming Language
   </div>
</div> 



<div class="content">
   <div class="title m-b-md">
      <ul>
        @foreach($language as $languages)
          <li>{{$languages}}</li>
         @endforeach
      </ul>
   </div>
</div>


@endsection 