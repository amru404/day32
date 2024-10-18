@extends('admin.layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Detail Blog</h2>
            <hr>
            
            <!-- Judul -->
            <div class="form-group">
                <h3>Judul:</h3>
                <p>{{ $blog->judul }}</p>
            </div>
            
            <!-- Kategori -->
            <div class="form-group">
                <h3>Kategori:</h3>
                <p>{{ $blog->kategori }}</p>
            </div>
            
            <!-- Tag -->
            <div class="form-group">
                <h3>Tag:</h3>
                <p>{{ $blog->tag }}</p>
            </div>
            
            <!-- Penulis (User) -->
            <div class="form-group">
                <h3>Penulis:</h3>
                <p>{{ $blog->user->name }}</p> <!-- Pastikan relasi user di-load di controller -->
            </div>
            
            <!-- Konten -->
            <div class="form-group">
                <h3>Konten:</h3>
                <div class="well">
                    {!! $blog->konten !!}
                </div>
            </div>
            
            <a href="/admin/blog" class="btn btn-default">Kembali</a>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
