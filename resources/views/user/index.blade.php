@extends('templates.layout')
@section('content')
    <div class="">
        <h2 class="text-center">{{ $title }}</h2>
        {{-- Hiển thị thông báo --}}
        @if (Session::has('success'))
            <p class="p-3 mb-2 bg-success text-white rounded">{{ Session::get('success') }}</p>
        @endif
        @if (Session::has('error'))
            <p class="p-3 mb-2 bg-danger text-white rounded">{{ Session::get('error') }}</p>
        @endif
        {{-- action bắt theo tên route --}}
        <div class="d-flex justify-content-between">
            <form action="{{ route('search_user') }}" method="POST" enctype="multipart/form-data" class="d-flex" role="search">
                @csrf
                <input type="search" name="search" id="" class="form-control me-2"
                    placeholder="Type to search...">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a class="btn btn-primary" href="{{ route('add_user') }}">Add new user</a>
        </div>
        <table class="table table-light table-striped table-hover mt-3">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>User</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                @if (count($users) == 0)
                    <td colspan="7" style="padding: 16px; color:red" class="text-center">
                        <h1>Không có dữ liệu</h1>
                    </td>
                @endif
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        {{-- <td>{{ $user->id }}</td> --}}
                        <td>
                            <div class="d-flex gap-2">
                                <img src="{{ $user->avatar ? '' . Storage::url($user->avatar) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                    alt="" class="rounded-circle" width="50" height="50">
                                <div>
                                    <p class="fw-semibold mb-0">{{ $user->fullname }}</p>
                                    <p class="badge bg-primary">{{ '@' . $user->username }}</p>
                                </div>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender == 1 ? 'Male' : 'Female' }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <p class="badge bg-success">{{ $user->role_id == 1 ? 'Admin' : 'User' }}</p>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('edit_user', ['id' => $user->id]) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('delete_user', ['id' => $user->id]) }}"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$users->links()}} --}}
    </div>
@endsection
