@extends('templates.link')
@section('content')
    @if (Session::has('error'))
        <p style="color: red">{{ Session::get('error') }}</p>
    @endif

    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">PDN Land</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>

                                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourFullname" class="form-label">Fullname</label>
                                        <input type="text" name="fullname" class="form-control" id="yourFullname"
                                            value="{{ old('fullname') }}" required>
                                        <div class="invalid-feedback">Please enter your fullname!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                value="{{ old('username') }}" required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail"
                                            value="{{ old('email') }}" required>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            value="{{ old('password') }}" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="exampleInputPassword1" value="{{ old('password_confirmation') }}" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Giới tính</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault1" value="1"
                                                {{ old('gender') == '1' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Nam
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault2" value="0"
                                                {{ old('gender') == '0' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Nữ
                                            </label>
                                        </div>
                                        <div class="invalid-feedback">Please choose your gender!</div>
                                        <p @error('gender') class="text-danger" @enderror>
                                            @error('gender')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Avatar</label>
                                        <input type="file" name="avatar" accept="image/*"
                                            class="@error('avatar') is-invalid @enderror form-control" id="image"
                                            value={{ old('avatar') }}>
                                        <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                                            alt="Ảnh đại diện" id="image_preview" class="rounded mt-2 w-50">
                                        <p @error('avatar') class="text-danger" @enderror>
                                            @error('avatar')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="col-12">
                                        <label for="" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="" name="phone"
                                            value="{{ old('phone') }}" required>
                                        <div class="invalid-feedback">Please enter your phone number!</div>
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="" name="address"
                                            value="{{ old('address') }}" required>
                                        <div class="invalid-feedback">Please enter your address!</div>
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox"
                                                value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a
                                                    href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log
                                                in</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
