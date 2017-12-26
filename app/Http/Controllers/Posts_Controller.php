<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
//use DB;
class Posts_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //functions
        //$posts= DB::select('select * from posts');
        //$posts= Post::orderby('created_at','desc')->get();
        //$posts= Post::orderby('created_at','desc')->take(1)->get();
        $posts= Post::orderby('created_at','desc')->paginate(2);
        
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'subject'=>'required',
            'body'=>'required',
            
        ]);

        if($request->hasfile('post_image')){
            $filenameWithExsention = $request->file('post_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExsention,PATHINFO_FILENAME);
            $extension = $request->file('post_image')->getClientOriginalExtension();
            $fileNameStore = $fileName.'.'.time().'.'.$extension;
            $path = $request->file('post_image')->move(base_path(),'public/images/',$fileNameStore);
            //this line code if i have an cloud like cloudinary or AWSs3 for amazon
            //$path = $request->file('post_image')->storeAs('public/post_image',$fileNameStore);
        }else{
            $fileNameStore = 'noImage.jpg';
        }

        $post=new Post;
        $post->fname = $request->input('fname');
        $post->lname = $request->input('lname');
        $post->subject = $request->input('subject');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->post_image = $fileNameStore;
        $post->save();
        
        return redirect('/Post')->with('success','Done Succsessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/Post')->with('error','UnAuthorized');
        }
        
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'subject'=>'required',
            'body'=>'required'
        ]);

        if($request->hasfile('post_image')){
            $filenameWithExsention = $request->file('post_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExsention,PATHINFO_FILENAME);
            $extension = $request->file('post_image')->getClientOriginalExtension();
            $fileNameStore = $fileName.'.'.time().'.'.$extension;
            $path = $request->file('post_image')->move(base_path(),'public/images/',$fileNameStore);
            //$path = $request->file('post_image')->storeAs('public/post_image',$fileNameStore);
        }


        $post= Post::find($id);
        $post->fname = $request->input('fname');
        $post->lname = $request->input('lname');
        $post->subject = $request->input('subject');
        $post->body = $request->input('body');
        if($request->hasfile('post_image')){
            $post->post_image=$fileNameStore;
        }
        $post->save();
        
        return redirect('/Post')->with('success','Done Succsessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/Post')->with('error','UnAuthorized');
        }
        if($post->post_image != 'noImage.jpg'){
            Storage::delete('public/images/'.$post->post_image);
        }
        
        $post->delete();
        return redirect('/Post')->with('success','Done Succsessfully');
    }
}
