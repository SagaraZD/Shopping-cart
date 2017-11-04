<!-- members View -->
@extends('layouts.master')
@section('title')
Members
@endsection

@section('content')

<div class="container child-content">
  @include('includes.message-block')

  <div class="row">
    <div class="col-md-6">
      <h3> Add members </h3>
      <form action="{{route('add-member')}}" method="POST">
        <div class="form-group">
          <label>First name:</label>
          <input type="text" name="first_name" class="form-control" placeholder="" required>
        </div>

        <div class="form-group">
          <label>Last name:</label>
          <input type="text" name="last_name" class="form-control" placeholder="" required>
        </div>

        <div class="form-group">
          <label>Email (Username):</label>
          <input type="email" name="email" class="form-control" placeholder="" required>
        </div>

        <div class="form-group">
          <label>Password:</label>
          <input type="password" name="password" class="form-control" placeholder="" required>
        </div>

        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary pull-right">Add member</button>
      </form>
    </div>


    <!-- Type View Table -->
    <div class="col-md-6">
      <h3> All Members </h3>
      @if(count($members)>0)
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="">First Name</th>
            <th class="">Last Name</th>
            <th class="">Email </th>
            <th class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($members as $member)
          <tr>
            <td><span class="tname"> {{$member->FirstName}} </span> </td>
            <td><span class="tname"> {{$member->LastName}} </span> </td>
            <td><span class="tname"> {{$member->email}} </span> </td>

            <td class="text-center actionBtns">
              <a href="{{route('delete-member', ['id'=>$member->id]) }}" class="ecategory"> <i class="fa fa-pencil-square-o" title="Edit"></i> Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $members->render() }}
      @else
      Sorry, No any Members
      @endif

    </div>

  </div>

</div>
@endsection
