<!-- Edit products view -->
@extends('layouts.master')
@section('title')
Update Products
@endsection

@section('content')

<div class="container child-content">
  @include('includes.message-block')

  <div class="row">
    <div class="col-md-6">
      <h3> Update product</h3>
      <form action="{{ route('post-product-edit') }}" method="POST">
        <div class="form-group">
          <label>Product name:</label>
          <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="" required>
        </div>

        <div class="form-group">
          <label>Product price ($):</label>
          <input type="text" name="price" value="{{number_format($product->price, 2)}}" class="form-control" placeholder="" required>
        </div>

        <div class="form-group">
          <label for="categories">Select type:</label>
          <select class="form-control" name="type_id">
            <option value="{{ $product->type->id }}"> {{ $product->type->name }} </option>
            @foreach($types as $type)
            <option value="{{ $type->id }}"> {{ $type->name }} </option>
            @endforeach
          </select>
        </div>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        {{ csrf_field() }}
        <a href="{{route('get-products')}}" class="btn btn-default pull-left">Go back</a>
        <button type="submit" class="btn btn-primary pull-right">Update</button>
      </form>
    </div>

  </div>
</div>
@endsection
