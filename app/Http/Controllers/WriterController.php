<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where('user_id',Auth::user()->id)->get();   

        return view('writer.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('writer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Blog::create([
            'judul'     => $request->judul,
            'kategori'    => $request->kategori,
            'tag'    => $request->tag,
            'user_id' => $request->user_id,
            'konten' => $request->konten,
        ]);

        return redirect()->route('writer.blog')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $blog = blog::findOrFail($id);
        
        return view('writer.show',compact('blog'));
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


        return view('writer.edit', compact('blog'));
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

        return redirect()->route('writer.blog')->with(['success' => 'Data Berhasil Disimpan!']);
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

        return redirect()->route('writer.blog')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
