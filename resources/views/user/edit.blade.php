@extends('templates.layout')
@section('content')
    <h2 class="text-center">{{ $title }}</h2>
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
    @endif --}}
    <form action="{{ route('edit_user', ['id' => $details->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label class="form-label">Fullname</label>
            <input type="text" name="fullname" id="" class="form-control" placeholder="Fullname"
                value="{{ $details->fullname }}">
            <p @error('fullname') class="text-danger" @enderror>
                @error('fullname')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        {{-- <div class="mb-2">
            <label class="form-label">Username</label>
            <input type="text" name="username" id="" class="form-control" placeholder="Tên người dùng"
                value="{{ $details->username }}" disabled>
        </div>
        <div class="mb-2">
            <label class="form-label">Email</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Email"
                value="{{ $details->email }}" disabled>
        </div>
        <div class="mb-2">
            <label class="form-label">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="Mật khẩu"
                value="{{ $details->password }}" disabled>
        </div> --}}
        <div class="mb-2">
            <label class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1"
                    {{ $details->gender == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="0"
                    {{ $details->gender == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault2">
                    Female
                </label>
            </div>
            <p @error('gender') class="text-danger" @enderror>
                @error('gender')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Avatar</label>
            <input type="file" name="avatar" accept="image/*" id="image"
                class="@error('avatar') is-invalid @enderror form-control" value="{{ $details->avatar }}">
            <img src="{{ $details->avatar ? '' . Storage::url($details->avatar) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                alt="Ảnh đại diện" id="image_preview" class="rounded mt-2" width="150px" height="150px">
            <p @error('avatar') class="text-danger" @enderror>
                @error('avatar')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" id="" class="form-control" placeholder="Phone"
                value="{{ $details->phone }}">
            <p @error('phone') class="text-danger" @enderror>
                @error('phone')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Address</label>
            <input type="text" name="address" id="" class="form-control" placeholder="Address"
                value="{{ $details->address }}">
            <p @error('address') class="text-danger" @enderror>
                @error('address')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Role</label>
            <select class="form-select" name="role_id" aria-label="Default select example">
                <option value="">Choose role</option>
                <option value="1" {{ $details->role_id == 1 ? 'selected' : '' }}>Admin</option>
                <option value="0" {{ $details->role_id == 0 ? 'selected' : '' }}>User</option>
            </select>
            <p @error('role_id') class="text-danger" @enderror>
                @error('role_id')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <button type="submit" name="" id="" class="btn btn-primary">Edit</button>
    </form>
@endsection
