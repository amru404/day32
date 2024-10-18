@extends('blog.app')

@section('judul')
 Welcome To BlogRorr
@endsection

@section('penerbit')
    <!-- {{$blog->user->name}} -->
     banyak orang
@endsection

@section('tanggal_terbit')
    <!-- {{$blog->created_at}} -->
@endsection

@section('konten')
<h2>Blog Tersedia:</h2>
<div class="card p-4">
    <div class="post-preview">
        <a href="{{route('blog.detail', [$blog->id])}}">
            <h2 class="post-title">{{$blog->judul}}</h2>
            <h3 class="post-subtitle"></h3>
        </a>
        <p class="post-meta">
            Posted by
            <a href="#!">{{$blog->user->name}}</a>
            on {{$blog->created_at}}
        </p>
    </div>
</div>
<!-- Divider-->
<hr class="my-4" />
@endsection
