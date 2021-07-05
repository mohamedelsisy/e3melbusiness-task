@extends('layouts.admin')
@section('title','Dashboard')
@section('custom_css')
@endsection
@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-right">
                                    <h5 class="text-muted text-bold-500">Categories</h5>
                                    <h3 class="text-bold-600">{{ $total_categories }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-right">
                                    <h5 class="text-muted text-bold-500">Courses</h5>
                                    <h3 class="text-bold-600">{{ $total_courses }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-right">
                                    <h5 class="text-muted text-bold-500">Users</h5>
                                    <h3 class="text-bold-600">{{ $total_users }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('custom_js')
@endsection
