<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;

class PostsController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',
            ['except'=>['index','show']]
        );
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
//        $posts = Post::all();

//        sorting the data in ascendinf order
//        $posts = Post::orderBy('created_at','asc')->get();

//        by writing normal query

        $posts = DB::select('SELECT * FROM posts');
        return  view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return  view('posts.create');
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
        $this->validate($request,[

            'title'=> 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

//        handle the file upload

        if($request->hasFile('cover_image')){

//            get file name  with extensions
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request -> file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);




        }else{
            $fileNameToStore ='noimage.jpeg';
        }

        $post = New Post();
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image= $fileNameToStore;

        $post->save();


        return redirect('/posts')->with('success','Post created successfully');
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
        $post = Post::find($id);
       return  view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return  redirect('/posts')->with('error','Unauthorized Page.');
        }

        return  view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $this->validate($request,[

            'title'=> 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

//        handle the file upload

        if($request->hasFile('cover_image')){

//            get file name  with extensions
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request -> file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }


        $post =Post::find($id);

        $post->title = $request->input('title');
        $post->body  = $request->input('body');

        if($request->hasFile('cover_image')){
            $post->cover_image= $fileNameToStore;
        }

        $post->save();

        return redirect('/posts')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','You are not authorized to delete this post');
        }

        if($post->cover_image != 'noimage.jpeg'){
            Storage::delete('public/cover_images/'.$post->cover_image);

        }


        $post->delete();

        return redirect('/posts')->with('success','Post deleted successfully');

    }


}

