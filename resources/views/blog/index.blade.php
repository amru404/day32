@extends('blog.app')

@section('judul')
 Welcome To BlogRorr
@endsection

@section('penerbit')
     banyak orang
@endsection

@section('tanggal_terbit')
@endsection

@section('konten')

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
        <h2>Blog Tersedia:</h2>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
    <form class="form-inline my-2 my-lg-0 d-flex"  action="{{ route('blog.search') }}" method="get">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
</div>

@foreach ($blog as $b)
<div class="card p-4 mt-3">
    <div class="post-preview">
        <a href="{{route('blog.detail', [$b->id])}}">
            <h2 class="post-title">{{$b->judul}}</h2>
            <h3 class="post-subtitle"></h3>
        </a>
        <p class="post-meta">
            Posted by
            <a href="#!">{{$b->user->name}}</a>
            on {{$b->created_at}}
        </p>
    </div>
</div>
@endforeach

<!-- Divider-->
<hr class="my-4" />
@endsection
