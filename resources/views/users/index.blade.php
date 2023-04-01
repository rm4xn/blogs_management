@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Users</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-warning" href="{{ route('users.create') }}">New</a>

                    <table class="table table-striped mt-2">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $role)
                                                @if (!empty($role))
                                                    <span class="badge badge-dark">{{ $role }}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'class' => 'd-inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
