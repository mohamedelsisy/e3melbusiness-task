@extends('layouts.admin')
@section('title','Add new Course')
@section('custom_css')

@endsection
@section('content')

    <div class="container mt-4">
        <h2 class="text-center"> Add New Course</h2>


        <form class="row g-3 "  method="post" action="{{ route('admin.courses.store') }}">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" >
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="col-md-6">
                <label for="category_id" class="form-label">Category Name</label>
                <select class="form-select" name="category_id" id="category_id" >
                    <option selected disabled value="">Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label">Course description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>




            <div class="col-md-6">
                <label for="active" class="form-label">Status</label>
                <select class="form-select" name="active" id="active" >
                    <option selected disabled value="">Choose...</option>
                    <option @if ( old('active') ==  1) selected @endif }} value="1">Active</option>
                    <option @if ( old('active') ==  0) selected @endif }}  value="0">Not Active</option>
                </select>
                @error('active')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="rating" class="form-label">Rating</label>
                <select class="form-select" name="rating" id="rating" >
                    <option selected disabled value="">Choose...</option>
                    <option @if ( old('rating') ==  0) selected @endif }}  value="0">0</option>
                    <option @if ( old('rating') ==  1) selected @endif }}  value="1">1</option>
                    <option @if ( old('rating') ==  2) selected @endif }}  value="2">2</option>
                    <option @if ( old('rating') ==  3) selected @endif }}  value="3">3</option>
                    <option @if ( old('rating') ==  4) selected @endif }}  value="4">4</option>
                    <option @if ( old('rating') ==  5) selected @endif }}  value="5">5</option>
                </select>
                @error('rating')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="hours" class="form-label">Course Hours</label>
                <input type="number" name="hours" class="form-control" id="hours" value="{{ old('hours') }}" >
                @error('hours')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="views" class="form-label">Course views</label>
                <input type="number" name="views" class="form-control" id="views" value="{{ old('views') }}" >
                @error('views')
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
