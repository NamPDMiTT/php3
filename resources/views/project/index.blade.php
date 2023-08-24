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
            <form action="{{ route('search_project') }}" method="POST" enctype="multipart/form-data" class="d-flex"
                role="search">
                @csrf
                <input type="search" name="search" id="" class="form-control me-2"
                    placeholder="Type to search...">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a class="btn btn-primary" href="{{ route('add_project') }}">Add new project</a>
        </div>
        <table class="table table-light table-striped table-hover mt-3">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Name</th>
                    <th>Image</th>
                    <th>Owner</th>
                    <th>Room</th>
                    <th>Price</th>
                    <th>Acreage</th>
                    <th>Address</th>
                    <th>Detail</th>
                    <th>Action</th>
                </tr>
                @if (count($projects) == 0)
                    <td colspan="9" style="padding: 16px; color:red" class="text-center">
                        <h1>Không có dữ liệu</h1>
                    </td>
                @endif
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        {{-- <td>{{ $project->id }}</td> --}}
                        <td>{{ $project->project_name }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <img src="{{ $project->image ? '' . Storage::url($project->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                    alt="" class="rounded" width="50" height="50">
                            </div>
                        </td>
                        <td>{{ $project->owner }}</td>
                        <td>{{ $project->room }}</td>
                        <td>{{ $project->price }}</td>
                        <td>{{ $project->acreage }}</td>
                        <td>{{ $project->address }}</td>
                        <td>{{ $project->detail }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('edit_project', ['id' => $project->id]) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('delete_project', ['id' => $project->id]) }}"
                                onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$users->links()}} --}}
    </div>
@endsection
