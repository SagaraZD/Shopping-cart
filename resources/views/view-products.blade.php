<!-- Add products view -->
@extends('layouts.master')
@section('title')
Products
@endsection

@section('content')

<div class="container child-content">
  @include('includes.message-block')

<h3> All Products </h3>
  @if(count($products)>0)
     <table class="table table-striped">
       <thead>
         <tr>
           <th>Name</th>
           <th>Price ($)</th>
           <th>Type</th>
           <th class="text-center">Edit</th>
           <th class="text-center">Delete</th>
         </tr>
       </thead>
       <tbody>
         @foreach($products as $product)
           <tr>
             <td><span class=""> {{$product->name}} </span>
                <td><span class=""> {{number_format($product->price, 2)}}</span>
               <td><span class=""> {{$product->type->name}} </span>
             </td>
             <td class="text-center actionBtns">
               <a href="{{route('edit-products', ['id'=>$product->id]) }}"> <i class="fa fa-pencil-square-o" title="Edit"></i> Edit</a>
             </td>
             <td class="text-center actionBtns">
               <a href="{{route('delete-product', ['id'=>$product->id]) }}"> <i class="fa fa-pencil-square-o"></i> Delete</a>
             </td>
           </tr>
         @endforeach
       </tbody>
     </table>
      {{ $products->render() }}
   @else
     Sorry, No any Products
   @endif

</div>



@endsection
