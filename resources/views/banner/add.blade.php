@extends('templates.layout')
@section('content')
    <h2 class="text-center">{{ $title }}</h2>
    <form action="{{ route('add_banner') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label class="form-label">Banner name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Banner name"
                value="{{ old('name') }}">
            <p @error('name') class="text-danger" @enderror>
                @error('name')
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
        <div class="mb-2">
            <label class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"
                placeholder="Description...">{{ old('description') }}</textarea>
            <p @error('description') class="text-danger" @enderror>
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <button type="submit" name="" id="" class="btn btn-primary">Add</button>
    </form>
@endsection
