@extends('layouts.admin')

@section('content')


<h1 text-align="center">Create New User</h1>
<br>
<div class="col-lg-3 ">

<img src="/image1/{{$mcuser->photo['file']}}"  style="width :200px ;   height:200px ; padding-top:5px">
</div>

<div class="col-lg-9">
<form action="/admin/users/{{$mcuser->id}}" method = "POST" enctype="multipart/form-data">

    {{ method_field('PUT') }}
    {{ csrf_field() }}
  
    <div class="form-group ">
    <!-- @csrf -->
    <!-- <input type="hidden" name="_token" value="{!! csrf_token() !!}"> -->
    

      <label for="name">Enter Name </label>
      <input type="text" class="form-control" name="name" value = "{{$mcuser->name}}" >
       <br>
       <label for="email">Email </label>
      <input type="text" class="form-control" name="email" value = "{{$mcuser->email}}" >
      <br>
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" value = "{{$mcuser->password}}" >
      <br>
      <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="exampleSelect1" name = "status"  >>
      <option selected >{{$mcuser->status}}</option>
      <option >Not active</option>
       <option>Active</option>
      </select>
    </div>
    <div class="form-group">
      <label for="role_id">Select Role</label>
      <select class="form-control" id="exampleSelect1" name = "role_id">
      <option>{{$mcuser->role->id}}</option>
      @foreach($mcroles as $role)
        <option>{{ $role->id }}</option>
         @endforeach
      

      </select>
    </div>
    <label for="file">Upload Photo</label>
<input type="file" name="file" id="fileToUpload">
<br>
  
      
   
    <button type="submit" class="btn btn-primary">Update User</button>
  </fieldset>
</form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection