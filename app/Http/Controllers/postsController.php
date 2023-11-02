<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;


class postsController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::where('title', 'post one')->get();
        //$posts = Post::orderby('title', 'asc')->get();
        $posts = Post::orderby('created_at', 'desc')->paginate(5);             //Getting the table columns and ordering by created_at, in decsending order.
        
        return view('posts.index')->with('posts', $posts);
        
        // $data = array(
        //     'title' => 'Posts'
        // );
        
        // return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
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
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        //-----------HANDLE THE FILE UPLOAD
        if ($request->hasFile('cover_image')){

        
            //Declare a variable to hold the filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Declare a variable to hold only the filename, without the extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Now declare a variable to hold only the extension
            $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);

            //Now declre a name that will be stored in the database
            $filenameToStore = $filename. '_' .time(). '.' . $extension;
            //Now upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }else{
            $filenameToStore = 'no_image.jpeg';
        }
        

        $post = new Post;                                 //creating object of the model
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        return redirect('posts')->with('success', 'Post created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $post = Post::find($id);
         return view('posts.show')->with('post', $post);
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
        //Check the user first
         
        if (auth()->user()->id !== $post->user->id){
            return redirect('posts')->with('error', 'Unauthorised access');
         }
        return view('posts/edit')->with('post', $post);
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
            'title' => 'required',
            'body' => 'required' ,
            'cover_image' => 'image|nullable|max:1999'
        ]);
         //-----------HANDLE THE FILE UPLOAD
        if ($request->hasFile('cover_image')){
            //Declare a variable to hold the filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Declare a variable to hold only the filename, without the extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Now declare a variable to hold only the extension
            $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);

            //Now declre a name that will be stored in the database
            $filenameToStore = $filename. '_' .time(). '.' . $extension;

            //Now upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }
        

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->hasFile('cover_image')){
            if ($post->cover_image != 'no_image.jpg'){
                //bring the storage library in the top
                Storage::delete('public/cover_images/'. $post->cover_image);
            }
            $post->cover_image = $filenameToStore;
        }
        $post->save();

        return redirect('posts/')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //Check the user first
         
        if (auth()->user()->id !== $post->user->id){
            return redirect('posts')->with('error', 'Unauthorised access');
        }
        
        if ($post->cover_image != 'no_image.jpg'){
            //bring the storage library in the top
            Storage::delete('public/cover_images/'. $post->cover_image);
        }
        $post->delete();
        return redirect('posts/')->with('success', 'Posts removed');
    }
    
}
