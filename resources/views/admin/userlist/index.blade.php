@extends('admin.dashboard')
@section('title',"User Lists")
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5 p-3 border-0">
                <div class="card-body">
                    <table class="table table-bordered text-center w-100 display nowrap" id="usertable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th class="nosort">Actions</th>
                            </tr>
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
        var table = $('#usertable').DataTable({
            mark: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: 'ssd/userlist',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'address', name: 'address' },
                { data: 'phone', name: 'phone' },
                { data: 'actions', name: 'actions', class: 'text-center', orderable: false }
            ],
        });

        @if (session('successmsg'))
        Swal.fire({
            icon: 'success',
            title: 'Success...',
            text: '{{ session('successmsg') }}',
        });
        @endif

        $(document).on('click', '.role-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure you want to change the role?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: '/usertoadmin/' + id,
                    data: {
                        _token: '{{ csrf_token() }}', // Include the CSRF token
                        role: 'admin' // Assuming the role to change to is 'user'
                    },
                    success: function(response) {
                        table.ajax.reload();

                        // Handle success response
                        Swal.fire({
                            icon: 'success',
                            title: 'Role Changed!',
                            text: 'The user\'s role has been changed to User.'
                        });
                        // You can also reload the DataTable or update the UI as needed
                    },
                    error: function(xhr) {
                        // Handle error response
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to change the user\'s role. Please try again later.'
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    });
</script>
@endsection
