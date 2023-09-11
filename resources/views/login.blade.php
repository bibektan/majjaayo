@extends('layout')
@section('main')

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="position-relative">
    <div class="position-absolute start-50 translate-middle-x">
        <div class="card shadow m-3">
            <form class="p-3" method="POST" action="/dashboard">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    @if($username !== null)
                    <input name="username" type="text" class="form-control" id="username" value="{{old('username', $username)}}">
                    @else
                        <input name="username" type="text" class="form-control" id="username" value="{{old('username')}}">
                    @endif
                </div>
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    @if($password !== null)
                    <input name="password" type="password" class="form-control" id="password" value="{{old('password', $password)}}">
                    @else
                    <input name="password" type="password" class="form-control" id="password" value="{{old('password')}}">
                    @endif
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection