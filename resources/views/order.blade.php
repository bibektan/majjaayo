@extends('layout')
@section('main')

    <div class="position-relative">
        <div class="position-absolute start-50 translate-middle-x">
            <div class="card shadow m-3">
                <form class="p-3" method="POST" action="/order/submit">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        @if($name !== null)
                            <input name="name" type="text" class="form-control" id="name" value="{{old('name', $name)}}">
                        @else
                            <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">
                        @endif
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        @if($mobile !== null)
                        <input name="mobile" type="number" class="form-control" id="mobile" value="{{old('mobile', $mobile)}}">
                        @else
                        <input name="mobile" type="number" class="form-control" id="mobile" value="{{old('mobile')}}">
                        @endif
                    </div>
                    @error('mobile')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        @if($address !== null)
                        <input name="address" type="text" class="form-control" id="address" value="{{old('address', $address)}}">
                        @else
                        <input name="address" type="text" class="form-control" id="address" value="{{old('address')}}">
                        @endif
                    </div>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
