@extends('templates.layout')
@section('content')
    <h2 class="text-center">{{ $title }}</h2>
    <form action="{{ route('edit_project', ['id' => $details->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label class="form-label">Project name</label>
            <input type="text" name="project_name" id="" class="form-control" placeholder="Project name"
                value="{{ $details->project_name }}">
            <p @error('project_name') class="text-danger" @enderror>
                @error('project_name')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Image</label>
            <input type="file" name="image" accept="image/*" id="image"
                class="@error('image') is-invalid @enderror form-control" value="{{ $details->image }}">
            <img src="{{ $details->image ? '' . Storage::url($details->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                alt="Ảnh đại diện" id="image_preview" class="rounded mt-2" width="150px" height="150px">
            <p @error('image') class="text-danger" @enderror>
                @error('image')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Owner</label>
            <input type="text" name="owner" id="" class="form-control" placeholder="Owner"
                value="{{ $details->owner }}">
            <p @error('owner') class="text-danger" @enderror>
                @error('owner')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Room</label>
            <input type="number" name="room" id="" class="form-control" placeholder="Room"
                value="{{ $details->room }}">
            <p @error('room') class="text-danger" @enderror>
                @error('room')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Price</label>
            <input type="number" name="price" id="" class="form-control" placeholder="Price"
                value="{{ $details->price }}">
            <p @error('price') class="text-danger" @enderror>
                @error('price')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label class="form-label">Acreage</label>
            <input type="text" name="acreage" id="" class="form-control" placeholder="Acreage"
                value="{{ $details->acreage }}">
            <p @error('acreage') class="text-danger" @enderror>
                @error('acreage')
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
            <label class="form-label">Detail</label>
            <textarea name="detail" id="" cols="30" rows="10" class="form-control" placeholder="Detail...">{{ $details->detail }}</textarea>
            <p @error('detail') class="text-danger" @enderror>
                @error('detail')
                    <span>{{ $message }}</span>
                @enderror
            </p>
        </div>
        <button type="submit" name="" id="" class="btn btn-primary">Edit</button>
    </form>
@endsection
