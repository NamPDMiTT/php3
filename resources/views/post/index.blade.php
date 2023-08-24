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
            <form action="{{ route('search_post') }}" method="POST" enctype="multipart/form-data" class="d-flex" role="search">
                @csrf
                <input type="search" name="search" id="" class="form-control me-2"
                    placeholder="Type to search...">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a class="btn btn-primary" href="{{ route('add_post') }}">Add new post</a>
        </div>
        <table class="table table-light table-striped table-hover mt-3">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content</th>
                    {{-- <th>User</th> --}}
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @if (count($posts) == 0)
                    <td colspan="5" style="padding: 16px; color:red" class="text-center">
                        <h1>Không có dữ liệu</h1>
                    </td>
                @endif
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        {{-- <td>{{ $post->id }}</td> --}}
                        <td>{{ $post->title }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <img src="{{ $post->image ? '' . Storage::url($post->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                    alt="" class="rounded" width="50" height="50">
                            </div>
                        </td>
                        <td>{{ $post->content }}</td>
                        {{-- <td>{{ $post->user_id }}</td> --}}
                        <td>
                            <p class="badge bg-success">{{ $post->status == 1 ? 'Public' : 'Private' }}</p>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('edit_post', ['id' => $post->id]) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('delete_post', ['id' => $post->id]) }}"
                                onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$users->links()}} --}}
    </div>
@endsection
