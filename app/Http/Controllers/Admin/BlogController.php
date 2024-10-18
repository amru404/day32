<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Controllers\Controller; 
use App\Models\Auth\User\User;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::with('user')->paginate(10);   

        return view('admin.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view('admin.blog.add', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        Blog::create([
            'judul'     => $request->judul,
            'kategori'    => $request->kategori,
            'tag'    => $request->tag,
            'user_id' => $request->user_id,
            'konten' => $request->konten,
        ]);

        return redirect()->route('admin.blog')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $blog = blog::findOrFail($id);
        $user = User::all();
        
        return view('admin.blog.show',compact('blog','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $user = User::all();


        return view('admin.blog.edit', compact('blog','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        
        $blog = Blog::findOrFail($id);
        $blog->update([
            'judul'     => $request->judul,
            'kategori'    => $request->kategori,
            'tag'    => $request->tag,
            'user_id' => $request->user_id,
            'konten' => $request->konten,
        ]);

        return redirect()->route('admin.blog')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $blog = blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blog')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
