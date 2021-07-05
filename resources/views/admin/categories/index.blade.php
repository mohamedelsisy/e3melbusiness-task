@extends('layouts.admin')
@section('title','Categories')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="https://salamathospital.net/assets/admin/vendors/css/tables/datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://salamathospital.net/assets/admin/vendors/css/tables/extensions/buttons.dataTables.min.css">

@endsection
@section('content')

    <div class="container mt-4">
        <h2 class="text-center"> All Categories</h2>


        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">New Category</a>
        <table class=" table table-condensed table-sm table-striped table-hover" id="categories">
            <thead>
            <tr>
                <th> Name </th>
                <th> Status </th>
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

            $('#categories').DataTable({
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
                    url: "{{ route('admin.categories') }}",
                },
                columns: [

                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'status',
                        name: 'status'
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
