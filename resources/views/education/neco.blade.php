@extends('layouts.sidebar')
@section('tittle', 'Neco Card Purchase')
@section('content')
    <div class="page-wrapper" style="background-color: #0a4021">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="content container-fluid">
            <div class="row justify-content-lg-center">
                <div class="col-lg-10">

                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title text-white">Neco Result Checker</h3>
                                <ul class="breadcrumb">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white rounded text-center">
                        <script>
                            $(document).ready(function() {
                                toastr.options.timeOut = 60000;
                                @if (Session::has('error'))
                                toastr.error('{{ Session::get('error') }}');
                                @elseif(Session::has('success'))
                                toastr.success('{{ Session::get('success') }}');
                                @endif
                            });

                        </script>




                        <form  id="dataForm">
                            @csrf
                            <div class="row text-left">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="numofpins" style="color: #000000">No of Pins</label>
                                        <select id="numofpins" name="value" class="form-control rounded-right"  style="border-radius: 0px; height: 50px;" required="">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-left">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="numofpins" style="color: #000000">Amount per Unit (₦)</label>
                                        <input id="amount"  name="amount" class="form-control rounded-right py-4" value="{{$neco['tamount']}}" style="border-radius: 0px;" readonly="">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{rand(111111111, 999999999)}}">
                            </div>
                            <button class="btn btn-danger rounded btn-block font-weight-bold py-2 my-4" type="submit">Generate</button>
                        </form>
                        <a class="btn-success btn-block rounded text-center font-weight-bold py-2 my-4" href="{{route('account')}}" style="text-decoration: none;">
                            Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="content">
                <div class="module">
                    <div class="module-head">
                        <div class="card">
                            <div class="card-body">
                                <h3>Neco Pins</h3>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table id="example" class="display table" style="min-width: 845px">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Username</th>
                                            <th>Seria-Number</th>
                                            <th>Pin</th>
                                            <th>Ref</th>
                                            <!--                                                    <th>Action</th>-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ne as $re)
                                            <tr>
                                                <td>{{$re->created_at}}</td>
                                                <td>{{$re->username}}</td>
                                                <td>{{$re->seria}}</td>
                                                <td>{{$re->pin}}</td>
                                                <td>{{$re->ref}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
                @section('script')
                    <script>
                        $(document).ready(function() {


                            // Send the AJAX request
                            $('#dataForm').submit(function(e) {
                                e.preventDefault(); // Prevent the form from submitting traditionally

                                // Get the form data
                                var formData = $(this).serialize();
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'Do you want to buy ' + document.getElementById("numofpins").value + ' Neco Scratch card for ₦' + document.getElementById("amount").value +' ?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes',
                                    cancelButtonText: 'Cancel'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // The user clicked "Yes", proceed with the action
                                        // Add your jQuery code here
                                        // For example, perform an AJAX request or update the page content
                                        $('#loadingSpinner').show();

                                        $.ajax({
                                            url: "{{ route('buyneco') }}",
                                            type: 'POST',
                                            data: formData,
                                            success: function(response) {
                                                // Handle the success response here
                                                $('#loadingSpinner').hide();

                                                console.log(response);
                                                // Update the page or perform any other actions based on the response

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
                                            error: function(xhr) {
                                                $('#loadingSpinner').hide();
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'fail',
                                                    text: xhr.responseText
                                                });
                                                // Handle any errors
                                                console.log(xhr.responseText);

                                            }
                                        });

                                    }
                                });
                            });
                        });

                    </script>

@endsection
