<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Http\Controllers\Controller; 
use App\Models\Auth\User\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); 

        $blog = Blog::paginate($perPage);
        return view('blog.index',compact('blog'));
    }

    function searchBlog(Request $request){
        $search = $request->search;
        $blog = Blog::where('judul', 'like', '%' . $search . '%')->paginate(10);

        return view('blog.index', compact('blog'));
    }

    public function home(Request $request)
    {
        $perPage = $request->input('per_page', 10); 

        $blog = Blog::paginate($perPage);


        return view('blog.index',compact('blog'));
    }

    function detail(string $id)
    {
        $blog = blog::findOrFail($id);
        $blogID = $blog->id;
        $comment = comment::where('blog_id',$blogID)->get();
        // dd($comment);

        return view('blog.post',compact('blog','comment'));
    }

    function addComment(request $request, string $id){
        
        $blogID = $id;

        // dd($blogID, $request);   
        Comment::create([
            'comment'     => $request->comment,
            'blog_id'    => $blogID,
            'user_id'    => $request->user_id,
        ]);

        return redirect()->route('blog.detail', ['id' => $id])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    }
}
