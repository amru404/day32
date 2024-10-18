@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    <div class="row">
<div class="container">
    <h2>Add Blog</h2>
    <form action="{{ route('writer.blog.store')}}" method="POST">
        @csrf
        @method('Post')
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul">
        </div>

        <!-- Kategori -->
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan kategori">
        </div>

        <!-- Tag -->
        <div class="form-group">
            <label for="tag">Tag:</label>
            <input type="text" class="form-control" id="tag" name="tag" placeholder="Masukkan tag">
        </div>

        <!-- User ID -->
       
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

        <!-- Konten -->
        <div class="form-group">
            <label for="konten">Konten:</label>
            <textarea class="form-control" id="konten" name="konten" rows="5" placeholder="Masukkan konten"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    </div>
    <!-- /top tiles -->

    
<!-- Tambahkan script text editor seperti CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('konten');
</script>


@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
