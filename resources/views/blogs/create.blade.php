@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Add blog</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Check the fields!</strong>
                            @foreach ($error->all() as $error)
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    {!! Form::open(array('route' => 'blogs.store', 'method' => 'POST')) !!}
                        <div class="form-group">
                            <label for="title">Title</label>
                            {!! Form::text('title', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            {!! Form::textarea('content', null, array('class' => 'form-control')) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
