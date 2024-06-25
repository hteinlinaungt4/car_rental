@extends('admin.dashboard')
@section('title',"Booking Lists")
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5 p-3 border-0">
                <div class="card-body">
                    <table class="table table-bordered text-center w-100 display nowrap" id="usertable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order Code</th>
                                <th>Name</th>
                                <th>Vehicle</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Posting Date</th>
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
            ajax: '/ssd/book',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'bookNumber', name: 'bookNumber' },
                { data: 'name', name: 'name' },
                { data: 'vehicle', name: 'vehicle' },
                { data: 'from_date', name: 'from_date' },
                { data: 'to_date', name: 'to_date' },
                { data: 'message', name: 'message' },
                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
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

        // AJAX call for pending, confirm, and cancel actions
        $(document).on('click', '.pending, .confirm, .cancel', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var action = $(this).hasClass('pending') ? 'pending' : $(this).hasClass('confirm') ? 'confirm' : 'cancel';
            var url = `book/${id}/${action}`;

            Swal.fire({
                title: `Are you sure you want to ${action}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}'
                        }
                    })
                    .done(function(msg) {
                        table.ajax.reload();
                        Swal.fire(
                            `${action.charAt(0).toUpperCase() + action.slice(1)}!`,
                            `Booking successfully ${action}ed.`,
                            'success'
                        );
                    });
                }
            });
        });
    });
</script>
@endsection
