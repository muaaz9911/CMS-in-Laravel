<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;

class adminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mcusers= User::all();
        return view ('admin.users/index', compact('mcusers' ) ) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $mcroles= Role::pluck('id')->all();
        return view('admin/users/create',compact('mcroles'));
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
   $user = new User;


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


        $this->validate($request, [
            'name' => 'required ',
            'email' =>'required|unique:users',
            'password' =>'required',
        //     // 'role' =>'required',
        //     // 'status' =>'required',

            
        ]);

         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = $request->password;
          $user->role_id = $request->role_id;
         $user->status = $request->status;
         $user->photo_id = $photoss->id;
          $user->save();
          session()->flash('message', 'record added successfully!');
        return redirect('/admin/users');


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
     
        $mcuser = User::find($id);
        $mcroles= Role::all();

        return view ('admin.users.edit', compact('mcuser','mcroles') );
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
        $user = User::find($id);
        
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
    
     
             $this->validate($request, [
                 'name' => 'required ',
                 'email' =>'required',
                 'password' =>'required',
             //     // 'role' =>'required',
             //     // 'status' =>'required',
     
                 
             ]);
     
              $user->name = $request->name;
              $user->email = $request->email;
              $user->password = $request->password;
               $user->role_id = $request->role_id;
              $user->status = $request->status;
              $user->photo_id = $photoss->id;
               $user->save();
            //return $request->all();
            session()->flash('message', 'record store successfully!');
            return redirect('/admin/users');
     
    

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

         $user = User::find($id);
         $user->destroy($id);
         session()->flash('message', 'user deleted successfully!');
         return redirect('/admin/users');
    }
}
