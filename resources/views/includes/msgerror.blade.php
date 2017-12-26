<div class="container">
 @if(count($errors)>0)
  @foreach($errors->all() as $error)
    <div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <strong>Oooh !  </strong>{{$error}}   Change a few things up and try submitting again.
    </div>
  @endforeach
 @endif
</div>

<div class="container">
  @if(session('error'))
    <div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <strong>Oooh !  </strong>{{session('error')}}   Change a few things up and try submitting again.
    </div>
  @endif
</div>

<div class="container">
  @if(session('success'))
    <div class="alert alert-dismissible alert-success">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <strong>Well done!  </strong>{{session('sucsess')}}   You successfully . 
    </div>
  @endif
</div>