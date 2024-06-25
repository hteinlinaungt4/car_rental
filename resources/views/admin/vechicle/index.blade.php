@extends('admin.dashboard')
@section('title',"Vehicle")
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5 p-3 border-0">
                <div class="card-header bg-white">
                    <a href="{{ route('vehicle.create') }}" class=" text-decoration-none btn btn-sm btn-primary"><i
                        class="fa-solid fa-circle-plus"></i> Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center w-100 display nowrap"  id="usertable" >
                        <thead>
                            <th>ID</th>
                            <th>Vehicle Name</th>
                            <th>Brand</th>
                            <th>Price Per Day</th>
                            <th>Fuel Type</th>
                            <th>Model Year</th>
                            <th class="nosort">Actions</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

     <script>
        $(document).ready(function() {
            var table=$('#usertable').DataTable({
                mark:true,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/ssd/vehicle',
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'brand_name',
                        name: 'brand_name'
                    },
                    {
                        data: 'perDay',
                        name: 'perDay'
                    },
                    {
                        data: 'fuel',
                        name: 'fuel'
                    },
                    {
                        data: 'modelyear',
                        name: 'modelyear'
                    },

                    {
                        data: 'actions',
                        name: 'actions',
                        class: 'text-center'
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    targets: 'nosort'
                },
            ],
            });
            @if (session('successmsg'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success...',
                    text: '{{ session('successmsg') }}',
                });
            @endif
            $(document).on('click','.delete_btn', function(e) {
                e.preventDefault();
                var id= $(this).data('id');
                Swal.fire({
                    title: 'Are you sure you want to Delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        method: "Delete",
                        url:  `vehicle/${id}`,
                        })
                        .done(function( msg ) {
                            table.ajax.reload();
                            Swal.fire(
                            'Deleted!',
                            'Your are successfully deleted.',
                            'success'
                        )
                        });

                    }
                })
            })




        });
    </script>
@endsection
