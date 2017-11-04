<!-- Add product type view -->
@extends('layouts.master')
@section('title')
Types
@endsection

@section('content')

<div class="container child-content">
  @include('includes.message-block')

  <div class="row">
  <div class="col-md-6">
      <h3> Add product types </h3>
  <form action="{{route('post-type-add')}}" method="POST">
    <div class="form-group">
      <label>Type name:</label>
      <input type="text" name="name" class="form-control" placeholder="" required>
      {{ csrf_field() }}
    </div>
    <button type="submit" class="btn btn-primary pull-right">add</button>
  </form>
</div>

<!-- Type View Table -->
<div class="col-md-6">
    <h3> All types </h3>
  @if(count($types)>0)
     <table class="table table-striped">
       <thead>
         <tr>
           <th>Name</th>
           <th class="text-center">Edit</th>
           <th class="text-center">Delete</th>
         </tr>
       </thead>
       <tbody>
         @foreach($types as $type)
           <tr>
             <td><span class="tname"> {{$type->name}} </span>

                <form class="edit-type-form" action="{{route('post-type-edit')}}" method="post" style="display:none">
                  <input type="text" class="form-control pull-left" name="t_name" value="{{$type->name}}" style="width:50%; height: 30px;">
                  <input type="hidden" name="tid" value="{{$type->id}}">
                  {{ csrf_field() }}
                  <input type="submit" class="btn btn-primary btn-sm pull-right" value="Update">
              </form>

             </td>
             <td class="text-center actionBtns">
               <a href="#" class="etype"> <i class="fa fa-pencil-square-o" title="Edit"></i> Edit</a>
             </td>
             <td class="text-center actionBtns">
               <a href="{{route('delete-type', ['id'=>$type->id]) }}" class="ecategory"> <i class="fa fa-pencil-square-o" title="Edit"></i> Delete</a>
             </td>
           </tr>
         @endforeach
       </tbody>
     </table>
     {{ $types->render() }}
   @else
     Sorry, No any Types
   @endif

</div>

</div>
</div>
@endsection
