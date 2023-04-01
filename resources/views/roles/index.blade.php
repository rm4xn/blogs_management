@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('role-create')
                        <a href="{{ route('roles.create') }}" class="btn btn-warning">New</a>
                    @endcan
                    <table class="table table-striped mt-2">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name}}</td>
                                    <td>
                                        @can('role-edit')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'class' => 'd-inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        {!! $roles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
