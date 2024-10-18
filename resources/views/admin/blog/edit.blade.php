@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <div class="row">
        <div class="container">
            <h2>Edit Blog</h2>
            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $blog->judul }}" placeholder="Masukkan judul">
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $blog->kategori }}" placeholder="Masukkan kategori">
                </div>

                <div class="form-group">
                    <label for="tag">Tag:</label>
                    <input type="text" class="form-control" id="tag" name="tag" value="{{ $blog->tag }}" placeholder="Masukkan tag">
                </div>

                <div class="form-group">
                    <label for="user_id">User ID:</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach ($user as $u)
                            <option value="{{ $u->id }}" {{ $blog->user_id == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="konten">Konten:</label>
                    <textarea class="form-control" id="konten" name="konten" rows="5" placeholder="Masukkan konten">{{ $blog->konten }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

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
