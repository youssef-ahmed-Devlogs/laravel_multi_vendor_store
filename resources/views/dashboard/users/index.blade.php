@extends('layouts.dashboard')

@section('title', 'Users')

@section('breadcrumb')
    @parent

    <li class="breadcrumb-item active">
        Users
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $users->count() }} - {{ $users->total() }}</h3>

            <div class="card-tools d-flex align-items-center">
                <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary btn-sm mx-1">Add</a>

                <x-dashboard.form.form class="d-flex align-items-center">
                    <div class="input-group input-group-sm mx-1">
                        <select class="form-control" name="account_status" onchange="this.form.submit()">
                            <option value="">Account Status</option>
                            <option value="on" @selected(request()->get('account_status') == 'on')>On</option>
                            <option value="off" @selected(request()->get('account_status') == 'off')>Off</option>
                            <option value="banned" @selected(request()->get('account_status') == 'banned')>Banned</option>
                        </select>
                    </div>

                    <div class="input-group input-group-sm mx-1">
                        <select class="form-control" name="user_type" onchange="this.form.submit()">
                            <option value="">User Type</option>
                            <option value="user" @selected(request()->get('user_type') == 'user')>User</option>
                            <option value="store_owner" @selected(request()->get('user_type') == 'store_owner')>Store Owner</option>
                            <option value="admin" @selected(request()->get('user_type') == 'admin')>Admin</option>
                            <option value="super_admin" @selected(request()->get('user_type') == 'super_admin')>Super Admin</option>
                        </select>
                    </div>

                    <div class="input-group input-group-sm">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search"
                            value="{{ request()->get('search') }}">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </x-dashboard.form.form>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>
                                <span class="tag tag-success">{{ $user->status }}</span>
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>

                                <x-dashboard.buttons.success href="{{ route('dashboard.users.edit', $user) }}"
                                    class="btn-sm" :outline="true" text="Edit" />


                                <x-dashboard.form.form action="{{ route('dashboard.users.destroy', $user) }}"
                                    method="DELETE" class="d-inline-block">
                                    <x-dashboard.buttons.danger class="btn-sm" :outline="true" text="Delete"
                                        onclick="return confirm('Are you sure you want to delete this user?')" />
                                </x-dashboard.form.form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-2 ml-2">
                {{ $users->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
