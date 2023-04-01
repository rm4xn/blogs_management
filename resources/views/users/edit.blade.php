@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Edit user</h1>
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

                    {!! Form::model($user, array('route' => ['users.update', $user->id], 'method' => 'PUT', )) !!}
                        <div class="form-group">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::email('email', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            {!! Form::password('password', array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm password</label>
                            {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="password">Role</label>
                            {!! Form::select('roles', $roles, $userRole, array('class' => 'form-control')) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
