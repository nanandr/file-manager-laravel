@extends('component/app')
@section('nav')
    @include('component/nav')
@endsection
@section('content')
<div class="min-vh-100 d-flex align-items-center flex-column">
    <h1 class="error-title">404</h1>
    <p>Sorry, but the page you're looking for doesn't exist</p>
</div>
@endsection
