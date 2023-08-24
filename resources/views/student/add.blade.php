@extends('templates.layout')
@section('content')
    <h2 class="text-center">{{ $title }}</h2>
    <form action="{{ route('add_student') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label class="form-label">Student name</label>
            <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder="Student name"
                value="{{ old('name') }}">
            <p @error('name') class="text-danger" @enderror>
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>

        <div class="mb-2">
            <label class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="0"
                    {{ old('gender') == '0' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="1"
                    {{ old('gender') == '1' ? 'checked' : '' }}>
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
            <label class="form-label">Phone</label>
            <input type="text" name="phone" id="" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone"
                value="{{ old('phone') }}">
            <p @error('phone') class="text-danger" @enderror>
                @error('phone')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>

        <div class="mb-2">
            <label class="form-label">Address</label>
            <input type="text" name="address" id="" class="form-control @error('address') is-invalid @enderror" placeholder="Address"
                value="{{ old('address') }}">
            <p @error('address') class="text-danger" @enderror>
                @error('address')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>

        <div class="mb-2">
            <label class="form-label">Image</label>
            <input type="file" name="image" accept="image/*" id="image"
                class="@error('image') is-invalid @enderror form-control" value="{{ old('image') }}">
            <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="Ảnh đại diện"
                id="image_preview" class="rounded mt-2" width="150px" height="150px">
            <p @error('image') class="text-danger" @enderror>
                @error('image')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>

        <button type="submit" name="" id="" class="btn btn-primary">Add</button>
    </form>
@endsection
