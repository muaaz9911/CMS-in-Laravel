
@extends('layouts.app')

<?php use App\Post;
      use App\Category;

?>
@section('content')

<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
             


                <!-- Blog Post -->

                <!-- Title -->
                <h1> {{$mcpost->title}} </h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$mcpost->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$mcpost->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="/image1/{{$mcpost->photo['file']}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$mcpost->body}}</p>

                <hr>

                <!-- Blog Comments -->

                 @if(Auth::check())
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>


                    <form action="/admin/comments/" method = "POST" enctype="multipart/form-data">


                     {{ csrf_field() }}

                        <div class="form-group ">
                             <!-- @csrf -->
                            <!-- <input type="hidden" name="_token" value="{!! csrf_token() !!}"> -->


                            <input type="hidden" name="post_id" value = "{{$mcpost->id}}" >
                            <br>
                            <label for="name">Body</label>
                            <textarea name="body" id="" cols="100" rows="4"></textarea>
                            <br>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                            </fieldset>


                        </div>

                    </form>

                        
                </div>
                @endif

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <h1>All Comments:</h1>

                @foreach ($mcpost->comments as $com)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$com->author}}
                            <small>{{$com->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$com->body}}
                    </div>
                </div>
                @endforeach

               
               

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>


                <div class="well">
            <h4>Recent Posts</h4>
            <?php   
            $posts = Post::all();
            
            ?>

            @foreach($posts as $post)
           <div class="row col-md-4">
           <img style="height:40px; width:70px" class="img-responsive" src="/image1/{{$post->photo['file']}}" alt="">
           </div>

           <div class="row col-md-8">
           <h4>
            <a href="{{'/post/'.$post->id}}">{{$post->title}}</a>
            </h4>
           
           </div>

        
        
        
          <hr>

        <hr>
        @endforeach
               </div>

                <!-- Blog Categories Well
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                  
                </div> -->

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>




<!-- Footer -->
<footer>
    <div class="row">
        <div  style = "margin-top:50px"class="col-lg-12">
            <p>Copyright &copy; Muaaz 2020</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>


<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


@endsection
