@extends('layouts.sidebar')
@section('tittle', 'Notifications')
@section('content')
    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title"> Notifications</h4>
                    <button type="button" id="confirmButton" class="badge badge-danger" >Clear all notification</button>
                </div>
                <div class="card-body p-0">
                    <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1  my-4 px-4">
                        <ul class="timeline">
                            @foreach($no as $net)
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel" href="#">
                                    <span>{{$net['created_at']}}</span>
                                    <h6 class="mb-0">{{$net['activities']}}</h6>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
<script>
    // Add an event listener to the button
    document.getElementById("confirmButton").addEventListener("click", function() {
        // Display the confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing',
                    text: 'Please wait...',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false
                });

                // Perform an AJAX request
                $.ajax({
                    url: '{{route('clearall')}}',
                    type: 'GET',
                    data: { /* Your request data */ },
                    success: function(response) {
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message
                            }).then(() => {
                                location.reload(); // Reload the page
                            });
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Pending',
                                text: response.message
                            });
                            // Handle any other response status
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred!',
                            icon: 'error'
                        });
                        // Handle the error response here
                    }
                });

            }
        });
    });

</script>
@endsection
