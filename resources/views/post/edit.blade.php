@extends('templates.layout')
@section('content')
    <h2 class="text-center">{{ $title }}</h2>
    <form action="{{ route('edit_post', ['id' => $details->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label class="form-label">Title</label>
            <input type="text" name="title" id="" class="form-control" placeholder="Title"
                value="{{ $details->title }}">
            <p @error('title') class="text-danger" @enderror>
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Image</label>
            <input type="file" name="image" accept="image/*" id="image"
                class="@error('image') is-invalid @enderror form-control" value="{{ $details->image }}">
            <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="Ảnh đại diện"
                id="image_preview" class="rounded mt-2" width="150px" height="150px">
            <p @error('image') class="text-danger" @enderror>
                @error('image')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Content</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Content...">{{ $details->content }}</textarea>
            <p @error('content') class="text-danger" @enderror>
                @error('content')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="" selected>Choose Status</option>
                <option value="1" {{ $details->status == '1' ? 'selected' : '' }}>Public</option>
                <option value="0" {{ $details->status == '0' ? 'selected' : '' }}>Private</option>
            </select>
            <p @error('status') class="text-danger" @enderror>
                @error('status')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <button type="submit" name="" id="" class="btn btn-primary">Edit</button>
    </form>
@endsection
