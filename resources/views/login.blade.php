@extends('layouts.master')
@section('title')
Login
@endsection
@section('content')
<div class="login-container">
  @include('includes.message-block')
  <h1>Login</h1><br>
  <form action ="{{route('sign-in')}}" method="POST">
    <input type="text" name="user_email" placeholder="Email">
    <input type="password" name="user_password" placeholder="Password">
    <input type="submit" name="login" class="login loginmodal-submit" value="Login">
    {{ csrf_field() }}
  </form>
</div>
@endsection
