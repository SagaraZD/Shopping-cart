<!-- Add product type view -->
@extends('layouts.master')
@section('title')
Add Products
@endsection

@section('content')

<div class="container child-content">
  @include('includes.message-block')

  <div class="row">
  <div class="col-md-6">
   <h3> Add products </h3>
  <form action="{{route('post-product-add')}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Product name:</label>
      <input type="text" name="name" class="form-control" placeholder="" required>
    </div>

    <div class="form-group">
      <label>Product price ($):</label>
      <input type="text" name="price" class="form-control" placeholder="" required>
    </div>

    <div class="form-group">
    <label for="categories">Select type:</label>
      <select class="form-control" name="type_id" value="{{Request::old('category_id')}}">
        @foreach($types as $type)
        <option value="{{ $type->id }}"> {{$type->name}} </option>
        @endforeach
      </select>
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary pull-right">Add</button>
  </form>
</div>

<div class="col-md-6">
<img src="{{ URL::to('img/productsservices.jpg') }}" class="img-responsive"/>
</div>

</div>
</div>
@endsection
