@extends('layouts.admin')

@section('content')


<h1 text-align="center">Create New User</h1>
<br>

<div class="col-lg-9">
<form action="/admin/users" method = "post" enctype="multipart/form-data">

    {{ csrf_field() }}
  
    <div class="form-group ">
    <!-- @csrf -->
    <!-- <input type="hidden" name="_token" value="{!! csrf_token() !!}"> -->
    

      <label for="name">Enter Name </label>
      <input type="text" class="form-control" name="name" value = "" >
       <br>
       <label for="email">Email </label>
      <input type="text" class="form-control" name="email" value = "" >
      <br>
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" value = "" >
      <br>
      <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="exampleSelect1" name = "status">
        <option>Active</option>
        <option selected>Not active</option>
      </select>
    </div>
    <div class="form-group">
      <label for="role_id">Select Role</label>
      <select class="form-control" id="exampleSelect1" name = "role_id">
         @foreach($mcroles as $role)
        <option>{{ $role }}</option>
         @endforeach
      </select>
    </div>
<label for="file">Upload Photo</label>
<input type="file" name="file" id="fileToUpload">
<br>

      
   
    <button type="submit" class="btn btn-primary">Create User</button>
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