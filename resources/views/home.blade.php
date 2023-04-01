@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-lg-3">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-header">Management</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Users</h5>
                                        @php
                                        use App\Models\User;
                                        $quantity = User::count();
                                        @endphp
                                        <p class="card-text">
                                            <div class="d-flex justify-content-between">
                                                <span><i class="fas fa-users"></i> {{ $quantity }}</span>
                                                <a href="users" class="text-white">See more</a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-header">Management</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Roles</h5>
                                        @php
                                        use App\Models\Role;
                                        $quantity = Role::count();
                                        @endphp
                                        <p class="card-text">
                                            <div class="d-flex justify-content-between">
                                                <span><i class="fas fa-user-lock"></i> {{ $quantity }}</span>
                                                <a href="roles" class="text-white">See more</a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="card text-white bg-danger mb-3">
                                    <div class="card-header">Management</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Blogs</h5>
                                        @php
                                        use App\Models\Blog;
                                        $quantity = Blog::count();
                                        @endphp
                                        <p class="card-text">
                                            <div class="d-flex justify-content-between">
                                                <span><i class="fas fa-blog"></i> {{ $quantity }}</span>
                                                <a href="blogs" class="text-white">See more</a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
