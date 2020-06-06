@extends('layouts.admin')

@section('content')
@if(session()->has('message'))
<div class="alert alert-success p-2">

  <h3> {{ session()->get('message')}}</h3>
   
</div>
@endif

<?php $no=1; ?>
<h1>All users </h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">Name</th>
      <th scope="col">emial</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Created at</th>
      <th>Del</th>
    </tr>
  </thead>

  @if($mcusers)
    
    
  <tbody>
  @foreach($mcusers as $user)
      
    
    <tr>
      <th scope="row"> {{$no}} </th>
      <td>   <img src="/image1/{{$user->photo['file']}}" style="width :90px ;   height:60px"> </td>
      <td><a href=" {{'/admin/users/'.$user->id.'/edit/'}}">{{ $user->name  }}</a></td>
      <td>{{ $user->email  }}</td>
      <td>{{ $user->role->name }}</td>
      <td>{{ $user->status }}</td>
      <td>{{ $user->created_at->diffForHumans() }}</td>
      <td> <form action="{{'/admin/users/'.$user->id}}"  method = "POST">
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


@endsection