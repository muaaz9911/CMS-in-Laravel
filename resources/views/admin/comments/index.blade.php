@extends('layouts.admin')

@section('content')


<?php $no=1; ?>

<h1>All Comments</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Author</th>
      <th scope="col">email</th>
      <th scope="col">body</th>
      <th scope="col">Status</th> 
      <th>post</th> 
      <th>Del</th>
    </tr>
  </thead>

 

    <tbody>
   
      @foreach($mccom as $com)  
      
      <tr>
        <th scope="row"> {{$no}} </th>
         <td>{{$com->author}}</td>
        <td>{{$com->email}}</td>
        <td>{{$com->body}}</td>
        <td>
        @if($com->is_active==0)
        <form action="/admin/comments/{{$com->id}}"  method = "POST">
        {{ method_field('PATCH') }}
         {{ csrf_field() }}
         <input type="hidden" name="is_active" value="1">
         <button type="submit" class="btn btn-success">Active</button>
        
        </form> 


        @else
        <form action="/admin/comments/{{$com->id}}"  method = "POST">
         {{ csrf_field() }}
         {{ method_field('PATCH') }}
         <input type="hidden" name="is_active" value="0">
         <button type="submit" class="btn btn-alert">deActive</button>
        
        </form> 

        @endif
        
        </td>
        <td>  <a href="{{'/post/'.$com->post->id}}"> see post</a>  </td>
        <td> <form action=""  method = "POST">
         {{ method_field('DELETE') }}
         {{ csrf_field() }}
         
         <button type="submit" class="btn btn-primary">Delete</button>
        
        </form> </td>
      </tr>

       <?php $no++; ?>
       @endforeach
      
    </tbody>
  

 
 
 
</table>


@endsection