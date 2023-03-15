@extends('component/app')
@section('nav')
    @include('component/nav')
@endsection
@section('content')
<div class="min-vh-100 d-flex align-items-center flex-column">
    <h1 class="error-title">403</h1>
    <p>Sorry, but you don't have access to this folder</p>
</div>
@endsection
