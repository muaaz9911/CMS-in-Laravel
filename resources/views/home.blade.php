@extends('layouts.app')
<?php use App\Post;
use Illuminate\Support\Facades\DB;
use App\Category;

?>

@section('content')
<div class="" style="margin-top:-18px  ; margin-bottom:45px">

<img src="image1/banner.jpg" alt="Trulli" width="1400" height="373" >

</div>

<!-- Page Content -->
<div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <?php   
            $posts = Post::orderBy('id', 'desc')->get();
            // $posts = DB::table('posts')->orderBy('id', 'ASC')->get();
            // dd($posts);
            
         ?>

        @foreach($posts as $post)
        <!-- First Blog Post -->
        <h2>
            <a href="{{'/post/'.$post->id}}">{{$post->title}}</a>
        </h2>
        <p class="lead " style ="font-size:15px">
            by {{$post->user->name}}
        </p>
        <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>
        <hr>
        <img class="img-responsive" src="/image1/{{$post->photo['file']}}" alt="">
        <hr>
        <p>{{str_limit($post->body,300)}}</p>
        <a class="btn btn-primary" href="{{'/post/'.$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
        @endforeach

        

        <!-- Pager -->
        <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4 " style="">


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

        <!-- Side Widget Well -->
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

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                     <?php   
                        $cats = Category::all();
                    ?>
                    @foreach($cats as $cat)
                    <ul class="list-unstyled">
                        <li><a href="#">{{$cat->name}}</a>
                        </li>
                        
                    
                    </ul>
                    @endforeach
                </div>
               
            </div>
            <!-- /.row -->
        </div>

        

    </div>

</div>
<!-- /.row -->

<hr>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Muaaz 2020</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>



@endsection
