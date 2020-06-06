@extends('layouts.admin')

@section('content')


<h1 text-align="center">Edit the Post</h1>
<br>
<div class="col-lg-3 ">

<img src="/image1/{{$mcpost->photo['file']}}"  style="width :200px ;   height:200px ; padding-top:5px">
</div>

<div class="col-lg-9">
<form action="/admin/posts/{{$mcpost->id}}" method = "POST" enctype="multipart/form-data">

    {{ method_field('PUT') }}
    {{ csrf_field() }}
  
    <div class="form-group ">
    <!-- @csrf -->
    <!-- <input type="hidden" name="_token" value="{!! csrf_token() !!}"> -->
    
    <label for="name">Post Title </label>
      <input type="text" class="form-control" name="title" value = "{{$mcpost->title}}" >
       <br>
       <label for="name">Body</label>
      <textarea name="body" id="" cols="100" rows="8">{{$mcpost->body}}</textarea>
      <br>
      
      <br>
      
    <div class="form-group">
      <label for="user_id">Author</label>
      <select class="form-control" id="exampleSelect1" name = "user_id">
      <option selected  value="{{$mcpost->user->id}}">{{$mcpost->user->name}}</option>
         @foreach($mcuser as $user)
        <option  value="{{ $user->id}}" >{{ $user->name}}</option>
         @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="user_id">Category</label>
      <select class="form-control" id="exampleSelect1" name = "category_id">
      <option selected value="{{$mcpost->category->id}}" >{{$mcpost->category->name}}</option>
         @foreach($mccat as $cat)
        <option value="{{ $cat->id}}" >{{ $cat->name}}</option>
         @endforeach
      </select>
    </div>

<label for="file">Upload Photo</label>
<input type="file" name="file" id="fileToUpload">
<br>

      
   
    <button type="submit" class="btn btn-primary">Update Post</button>
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