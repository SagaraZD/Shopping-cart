<!-- Errors -->
@if(count($errors) > 0)
<div class="col-md-12 alert alert-danger fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <ul>
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
  </ul>
</div>
@endif

<!-- Success Massage -->
@if(Session::has('message'))
<div class="col-md-12 alert alert-success fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('message') }}
</div>
@endif

<!-- Alert Massage -->
@if(Session::has('alert'))
<div class="col-md-12 alert alert-danger fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('alert') }}
</div>
@endif
