@extends('component/app')
@section('content')
    <div class="d-flex justify-content-center container-form">
        <div class="d-flex card box-shadow px-2 my-auto col-sm-4 shadow mx-2">
            <div class="card-body">
                <div>
                    <h1 class="my-3">File Manager</h1>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <b>Oops!</b> {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('checkregister') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="d-block text-center mb-2">
                                <div>
                                    <img id="preview-image-before-upload" src="{{ asset('profiles/default-profile.png') }}" width="240" height="240" class="img-cover mb-2 rounded-circle d-inline-block align-top ml-1 border">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input type="file" name="file" id="image" accept="image/*">
                                @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="text" name="full_name" class="form-control mb-2" placeholder="Your Name" required="">
                            <input type="text" name="username" class="form-control mb-2" placeholder="Your Username" required="">
                            <input type="email" name="email" class="form-control mb-2" placeholder="Example@gmail.com" required="">
                            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required="">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required="">
                        <button type="submit" class="btn btn-primary btn-block col-sm-12 my-3">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection