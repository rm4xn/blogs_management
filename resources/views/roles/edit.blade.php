@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Add role</h1>
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

                    {!! Form::model($role, array('route' => ['roles.update', $role->id], 'method' => 'PUT')) !!}
                        <div class="form-group">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="mb-3">
                            <p class="font-weight-bold mb-1">Permissions</p>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    {!! Form::checkbox('permission[]', $permission->id, in_array($permission->id, $rolePermissions), array('class' => 'form-check-input', 'id' => $permission->id)) !!}
                                    <label for="{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
