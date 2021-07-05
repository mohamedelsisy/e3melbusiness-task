@extends('layouts.site')
@section('title',$category->name)
@section('custom_css')
@endsection
@section('content')

    <div class="container mt-4">
        <div class="row">
            @foreach($category->courses as $course)
                <div class="col-md-3 mb-2 ">
                    <div class="card" >
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                        <div class="card-body">

                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit($course->description, 100) }}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Category : {{ $course->category->name }}</li>
                            <li class="list-group-item">Level : {{ $course->levels }}</li>
                            <li class="list-group-item">Hours : {{ $course->hours }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('site.course.show', $course->id) }}" class="btn btn-primary btn-block">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('custom_js')
@endsection
