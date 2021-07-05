@extends('layouts.admin_auth')
@section('title','Admin Login')
@section('custom_css')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-4 ">
            <div class="col-md-6 ">
                <h2 class="text-center pt-3 pb-3">Admin Login</h2>
                <div class="alert alert-info">
                    Use this info for Login After run Seeder
                    <br>
                    Email is : admin@admin.com
                    <br>
                    Pass is  : admin123
                </div>
                <form   action="{{route('admin.login')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
@endsection
