<!-- User Settings -->
@extends('layouts.master')
@section('title')
Settings
@endsection

@section('content')

<div class="container child-content">
  @include('includes.message-block')


<div class="row">
<div class="col-md-6">
    <h3> Update Profile </h3>
        <form action="{{route('post-update-profile')}}" method="POST">
          <div class="form-group">
            <label>First name:</label>
            <input type="text" name="first_name" class="form-control" value="{{$userInfo->FirstName}}" required>
          </div>

          <div class="form-group">
            <label>Last name:</label>
            <input type="text" name="last_name" class="form-control" value="{{$userInfo->LastName}}" required>
          </div>

          <div class="form-group">
            <label>Email (Username):</label>
            <input type="email" name="email" class="form-control" value="{{$userInfo->email}}" required>
          </div>

          <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control"  placeholder="Password" required>
          </div>

          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary pull-right">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection
