@extends('layouts.admin')
@section('title','Courses')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="https://salamathospital.net/assets/admin/vendors/css/tables/datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://salamathospital.net/assets/admin/vendors/css/tables/extensions/buttons.dataTables.min.css">

@endsection
@section('content')

    <div class="container mt-4">
        <h2 class="text-center"> All Courses</h2>


        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">New Course</a>
        <table class=" table table-condensed table-sm table-striped table-hover" id="courses">
            <thead>
            <tr>
                <th> Name </th>
                <th>Category</th>
                <th> Status </th>
                <th> Hours </th>
                <th> Views </th>
                <th> Rating </th>

                <th>Control</th>
            </tr>
            </thead>


        </table>


    </div>




@endsection

@section('custom_js')


    <script src="https://salamathospital.net/assets/admin/vendors/js/tables/jquery.dataTables.min.js"></script>
    <script src="https://salamathospital.net/assets/admin/js/scripts/tables/datatables/datatable-basic.min.js"></script>
    <script src="https://salamathospital.net/assets/admin/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>

    <script src="https://salamathospital.net/assets/admin/vendors/js/tables/buttons.flash.min.js"></script>
    <script src="https://salamathospital.net/assets/admin/vendors/js/tables/jszip.min.js"></script>

    <script src="https://salamathospital.net/assets/admin/vendors/js/tables/pdfmake.min.js"></script>
    <script src="https://salamathospital.net/assets/admin/vendors/js/tables/vfs_fonts.js"></script>
    <script src="https://salamathospital.net/assets/admin/vendors/js/tables/buttons.html5.min.js"></script>

    <script>

        $(document).ready(function (){

            $('#courses').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',

                ],
                "order": [[ 0, "desc" ]],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pagingType: 'simple',
                ajax: {
                    url: "{{ route('admin.courses') }}",
                },
                columns: [

                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'category',
                        name: 'category'
                    },

                    {
                        data: 'status',
                        name: 'status'
                    },

                    {
                        data: 'hours',
                        name: 'hours'
                    },

                    {
                        data: 'views',
                        name: 'views'
                    },

                    {
                        data: 'rating',
                        name: 'rating'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

        });
    </script>
@endsection
