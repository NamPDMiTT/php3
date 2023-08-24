@extends('templates.layout')
@section('content')
    <div class="">
        <h2 class="text-center">{{ $title }}</h2>
        {{-- action bắt theo tên route --}}
        <a class="btn btn-primary" href="{{ route('add_student') }}">Add new student</a>
        <table class="table table-light table-striped table-hover mt-3">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @if (count($students) == 0)
                    <td colspan="6" style="padding: 16px; color:red" class="text-center">
                        <h1>Không có dữ liệu</h1>
                    </td>
                @endif
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        {{-- <td>{{ $student->id }}</td> --}}
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender == 0 ? 'Male' : 'Female' }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <img src="{{ $student->image ? '' . Storage::url($student->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                    alt="" class="rounded-circle" width="50" height="50">
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('edit_student', ['id' => $student->id]) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('delete_student', ['id' => $student->id]) }}"
                                onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$users->links()}} --}}
    </div>
@endsection
