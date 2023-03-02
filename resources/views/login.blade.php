@extends('component/app')
@section('content')
    <div class="d-flex justify-content-center container-form">
        <div class="d-flex card box-shadow px-2 my-auto col-sm-4 shadow mx-2">
            <div class="card-body">
                <div class="pl-2">
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
                    <form action="{{ route('checklogin') }}" method="post">
                        {{ csrf_field() }}
                            <input type="email" name="email" class="form-control mb-2" placeholder="Example@gmail.com" required="">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        <button type="submit" class="btn btn-primary btn-block col-sm-12 my-3">Login</button>
                        <hr>
                        <p class="text-center">Don't Have an Account? <a href="{{ route('register') }}" class="text-primary">Register</a> Now!</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection