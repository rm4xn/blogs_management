@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Blogs</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('blog-create')
                        <a class="btn btn-warning" href="{{ route('blogs.create') }}">New</a>
                    @endcan
                    <table class="table table-striped mt-2">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $blog->id }}</th>
                                    <td>{{ $blog->title}}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td>
                                        @can('blog-edit')
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-info">Edit</a>
                                        @endcan
                                        @can('blog-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['blogs.destroy', $blog->id], 'class' => 'd-inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        {!! $blogs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
