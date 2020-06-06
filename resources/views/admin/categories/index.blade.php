@extends('layouts.admin')

@section('content')


<h1 text-align="center">Create New Category</h1>
<br>


<div class="col-md-4">


<form action="/admin/categories" method = "post" enctype="multipart/form-data">

    {{ csrf_field() }}
  
    <div class="form-group ">
    <!-- @csrf -->
    <!-- <input type="hidden" name="_token" value="{!! csrf_token() !!}"> -->
    

      <label for="name">Name </label>
      <input type="text" class="form-control" name="name" value = "" >
       <br>
   
    <button type="submit" class="btn btn-primary">Create Category</button>
  </fieldset>
</form>
</div>
<br>


<div class="col-md-12">

<?php $no=1; ?>
<h1>All Categories </h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      
      <th scope="col">Name</th>
      <th>Del</th>
    </tr>
  </thead>

  @if($mccat)
    
    
  <tbody>
  @foreach($mccat as $cat)
      
    
    <tr>
      <th scope="row"> {{$no}} </th>
      <td><a href=" ">{{ $cat->name  }}</a></td>
      <td> <form action="{{'/admin/categories/'.$cat->id}}"  method = "POST">
       {{ method_field('DELETE') }}
       {{ csrf_field() }}
       
       <button type="submit" class="btn btn-primary">Delete</button>
      
      </form> </td>
    </tr>
     <?php $no++; ?>
    @endforeach
  </tbody>
  @endif
</table>




@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</div>



@endsection