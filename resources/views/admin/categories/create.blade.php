@extends('layouts.admin')
@section('title','Add new Category')
@section('custom_css')

@endsection
@section('content')

    <div class="container mt-4">
        <h2 class="text-center"> Add New Category</h2>


        <form class="row g-3 "  method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label"> Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" >
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="col-md-6">
                <label for="active" class="form-label">Status</label>
                <select class="form-select" name="active" id="active" >
                    <option selected disabled value="">Choose...</option>
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                </select>
                @error('active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Create </button>
            </div>
        </form>




    </div>




@endsection

@section('custom_js')


@endsection
