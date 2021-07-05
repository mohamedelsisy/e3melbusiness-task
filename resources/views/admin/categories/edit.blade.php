@extends('layouts.admin')
@section('title',' Edit Category')
@section('custom_css')

@endsection
@section('content')

    <div class="container mt-4">
        <h2 class="text-center"> Add New Category</h2>


        <form class="row g-3 "  method="post" action="{{ route('admin.categories.update') }}">
            @csrf
            <input type="hidden" value="{{ $category->id }}" name="id">
            <div class="col-md-6">
                <label for="name" class="form-label"> Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ? old('name') : $category->name  }}" >
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="col-md-6">
                <label for="active" class="form-label">Status</label>
                <select class="form-select" name="active" id="active" >
                    <option>Choose...</option>
                    <option @if($category->active == 1 ) selected @endif value="1">Active</option>
                    <option @if($category->active == 0 ) selected @endif value="0">Not Active</option>
                </select>
                @error('active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Update </button>
            </div>
        </form>




    </div>




@endsection

@section('custom_js')


@endsection
