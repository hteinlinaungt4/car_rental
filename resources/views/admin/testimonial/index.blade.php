@extends('admin.dashboard')
@section('title', 'User Lists')
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
                                    <th>Testimonials</th>
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
                ajax: 'ssd/testimonial',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        class: 'text-center',
                        orderable: false
                    }
                ],
            });

            @if (session('successmsg'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success...',
                    text: '{{ session('successmsg') }}',
                });
            @endif

            $(document).on('click', '.status-btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var status = $(this).data('status');
            var newStatus = status == '0' ? '1' : '0';
            var url = `/admin-testimonial/${id}/status`;
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: newStatus
                },
                success: function(response) {
                            table.ajax.reload();
                            Swal.fire(
                                'Updated!',
                                'Status has been updated.',
                                'success'
                            )
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            Swal.fire(
                                'Error!',
                                'There was an error updating the status.',
                                'error'
                            )
                        }
            });
        });

        });
    </script>
@endsection
