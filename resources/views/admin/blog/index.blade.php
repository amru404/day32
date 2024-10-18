@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    <div class="row">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary" style="float:left">Add Blog</a>
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%" id="datatable">
            <thead>
            <tr>
                <th>judul</th>
                <th>kategori</th>
                <th>tag</th>
                <th>Nama Penerbit</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blog as $b)
                <tr>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->kategori }}</td>
                    <td>{{ $b->tag }}</td>
                    <td>{{ $b->user->name }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.blog.show', [$b->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.blog.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.blog.edit', [$b->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.blog.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        
                            <a href="{{ route('admin.blog.destroy', [$b->id]) }}" class="btn btn-xs btn-danger blog_destroy" data-toggle="tooltip" data-placement="top" data-title="delete">
                                <i class="fa fa-trash"></i>
                            </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /top tiles -->


@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
