@extends('layouts.admin')

@section('content')
@if(session()->has('message'))
<div class="alert alert-success p-2">

  <h3> {{ session()->get('message')}}</h3>
   
</div>
@endif

<?php $no=1; ?>
<h1>All Posts </h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">Author</th>
      <th scope="col">Category</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>  
      <th>Edit</th>  
      <th>Del</th>
    </tr>
  </thead>

 

    <tbody>
   
        @foreach($mcposts as $post)
      
      <tr>
        <th scope="row"> {{$no}} </th>
        <td>   <img src="/image1/{{$post->photo['file']}}" style="width :90px ;   height:60px"> </td>
        <td>{{ $post->user->name}}</td>
        <td>{{ $post->category->name }}</td>
        <td>{{ $post->title}}</td>
        <td>{{ $post->body }}</td>
        <td> <a class="btn btn-primary" href=" {{'/admin/posts/'.$post->id.'/edit/'}}">Edit</a></td>
        <td> <form action="{{'/admin/posts/'.$post->id}}"  method = "POST">
         {{ method_field('DELETE') }}
         {{ csrf_field() }}
         
         <button type="submit" class="btn btn-primary">Delete</button>
        
        </form> </td>
      </tr>

      @endforeach
       <?php $no++; ?>
      
    </tbody>
  

 
 
 
</table>


@endsection