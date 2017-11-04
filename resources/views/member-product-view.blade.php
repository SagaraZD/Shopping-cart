<!-- Member -->
@extends('layouts.master')
@section('title')
Products
@endsection

@section('content')
<div class="container child-content">
  @include('includes.message-block')
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-9">
          <h3 class="pull-left"> Products @if(isset($get_type_name)) / Type / {{$get_type_name}} @endif </h3>
        </div>
        @if(isset($types))
        <div class="form-group col-md-3 pull-right">
          <label for="categories">Change Products Type:</label>
          <select id="cselect" class="form-control" name="type">
            <option value="" disabled selected hidden>
              @if(isset($get_type_name))
              {{$get_type_name}}
              @else
              All
              @endif
            </option>
            @foreach($types as $type)
            <option value="{{$type->id}}"> {{$type->name}} </option>
            @endforeach
          </select>
        </div>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    @if(count($products)>0)
    @foreach($products as $product)
    <div class="col-xs-18 col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="{{ URL::to('img/placehold.png') }}" alt="">
        <div class="caption">
          <h4 class="pull-left">{{$product->name}}</h4>
          <h4 class="pull-right">${{number_format($product->price, 2)}}</h4>
          <div class="clearfix"> </div>
          <p>
            <button onclick="addToCart({{$product->id}})" class="btn btn-primary " role="button">
              <i class="fa fa-shopping-cart" style="padding-right: 10px;" aria-hidden="true"></i>
              Add to cart
            </button>
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="clearfix"> </div>
  <div class="row">
    <div class="col-md-12">
      {{ $products->render() }}
    </div>
  </div>
  @else

  <div class="col-md-12">
    <p> No any Products </p>
  </div>

  @endif
</div>

<script>
var token ='{{ csrf_token() }}';
var urlCart ='{{ route('post-add-to-cart') }}';
var hostURL ='{{ Request::server ("HTTP_HOST") }}';
</script>

@endsection
