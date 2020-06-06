<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\User;
use App\Category;

class adminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mcposts= Post::all();
        return view('admin.posts.index',compact('mcposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mcusers= User::all();
        $mccat= Category::all();
        return view('admin/posts/create',compact('mcusers','mccat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    $photoss = new Photo;
    $post = new Post;
 
 
 //take photo and save it to directry and databse
 
 if (  $request->hasfile('file'))
 {
      $file = $request->file('file');
      $file->move('image1',$file->getClientOriginalName());
      $photoss->file = $file->getClientOriginalName();
 
      $photoss->save();
        echo $photoss->id;
       echo "file saved";
 }
 else {
    echo "no file";
 }
 
 
        //  $this->validate($request, [
        //      'name' => 'required ',
        //      'email' =>'required|unique:users',
        //      'password' =>'required',
         
 
             
        //  ]);
 
          $post->title = $request->title;
          $post->body = $request->body;
          $post->photo_id = $photoss->id;
           $post->category_id = $request->category_id;
          $post->user_id = $request->user_id;
           $post->save();
           session()->flash('message', 'posts, added successfully!');
         return redirect('/admin/posts');
 
 
        // return $request->all();       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mcpost = Post::find($id);
        $mccat= Category::all();
        $mcuser= User::all();
        

        return view ('admin.posts.edit', compact('mcpost','mccat','mcuser') );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //
         $photoss = new Photo;
         $post = Post::find($id);
         
      //take photo and save it to directry and databse
      
      if (  $request->hasfile('file'))
      {
           $file = $request->file('file');
           $file->move('image1',$file->getClientOriginalName());
           $photoss->file = $file->getClientOriginalName();
      
           $photoss->save();
            /// echo $photoss->id;
            //echo "file saved";
      }
      else {
         echo "no file";
      }
     
      
            //   $this->validate($request, [
            //       'name' => 'required ',
            //       'email' =>'required',
            //       'password' =>'required',
            //   //     // 'role' =>'required',
            //   //     // 'status' =>'required',
      
                  
            //   ]);
      
            $post->title = $request->title;
            $post->body = $request->body;
            $post->photo_id = $photoss->id;
             $post->category_id = $request->category_id;
            $post->user_id = $request->user_id;
             $post->save();
             session()->flash('message', 'post updated successfully!');
           return redirect('/admin/posts');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Post::find($id);
        $user->destroy($id);
        session()->flash('message', 'Post deleted successfully!');
        return redirect('/admin/posts');
    }
}
