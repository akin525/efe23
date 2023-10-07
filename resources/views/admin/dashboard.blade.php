@extends('admin.layouts.sidebar')
@section('tittle', 'Admin Dashboard')
@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-12 col-sm-12">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="bgl-primary rounded p-3">
                            <h4 class="mb-0">All Wallet</h4>
                            <h4><b>₦{{number_format(intval($wallet *1),2)}}</b></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bgl-primary rounded p-3">
                            <h4 class="mb-0">All Deposit</h4>
                            <h4><b>₦{{number_format(intval($deposite *1),2)}}</b></h4>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-0">
                <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-wallet"></i>All Deposit</button>
            </div>
        </div>

    </div>
    <div class="col-xl-4 col-lg-12 col-sm-12">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="bgl-primary rounded p-3">
                            <i class="fa fa-users"></i>
                            <h4 class="mb-0">All Users</h4>
                            <h4><b>{{$alluser}}</b></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bgl-primary rounded p-3">
                            <i class="fa fa-users"></i>
                            <h4 class="mb-0">New Users</h4>
                            <h4><b>{{$data['user']}}</b></h4>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-0">
                <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-users"></i>All User</button>
            </div>
        </div>

    </div>

    <div class="col-xl-4 col-md-6">
        <div class="card bg-primary">
            <div class="card-header border-0">
                <h4 class="heading mb-0 text-white">Today Bills 😎</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="sales-bx">
                        <i class="fa fa-wallet text-yellow" style="font-size: 40px;"></i>
                        <h4>{{$data['bill']}}</h4>
                        <span>Bills Number</span>
                    </div>
                    <div class="sales-bx">
                        <i class="fa fa-wallet text-yellow" style="font-size: 40px"></i>
                        <h4>₦{{number_format(intval($data['sum_bill']*1))}}</h4>
                        <span>Total Bills</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card" style="background: #394758!important">
            <div class="card-header border-0">
                <h4 class="heading mb-0 text-white">Today Deposit 😎</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="sales-bx">
                        {{--                            <img src="images/analytics/sales.png" alt="">--}}
                        <i class="fa fa-wallet text-blue" style="font-size: 40px"></i>
                        <h4>{{$data['deposit']}}</h4>
                        <span>Deposit Number</span>
                    </div>
                    <div class="sales-bx">
                        <i class="fa fa-wallet text-blue" style="font-size: 40px"></i>
                        <h4>₦{{number_format(intval($data['sum_deposits']  *1))}}</h4>
                        <span>Total Deposit</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-12 col-sm-12">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="bgl-primary rounded p-3">
                            <h4 class="mb-0">All Bills</h4>
                            <h4><b>₦{{number_format(intval($bill *1))}}</b></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bgl-primary rounded p-3">
                            <h4 class="mb-0">MCD Balance</h4>
                            <h4><b>₦{{number_format(intval($tran *1))}}</b></h4>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-0">
                <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-bookmark"></i>MCD Transaction</button>
            </div>
        </div>

    </div>
    <div class="col-xl-4 col-lg-12 col-sm-12">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="bgl-primary rounded p-3">
                            <h4 class="mb-0">MCD Profits</h4>
                            <h4><b>₦{{number_format(intval($profit *1))}}</b></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bgl-primary rounded p-3">
                            <h4 class="mb-0">Total Charges</h4>
                            <h4><b>₦{{ number_format(intval($charge *1))}}</b></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-0">
                <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-bookmark"></i>All Charges</button>
            </div>
        </div>

    </div>


    <div class="col-xl-12">
        <div class="card bg-primary-light analytics-card">
            <div class="card-body mt-4 pb-1">
                <div class="row align-items-center">
                    <div class="col-xl-2">
                        <h3 class="mb-3">Quick Button</h3>
                        <p class="mb-0 text-primary pb-4">Get more bonus<br> on our platform</p>
                    </div>
                    <div class="col-xl-10">
                        <div class="row">
                            <div class="col-xl-2 col-sm-4 col-6" data-bs-toggle="modal" data-bs-target="#airtimeModalCenter">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary">
                                                        <i class="fa fa-solid fa-money-bill text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Credit</h5>
                                                    <span>User</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        <div class="modal fade" id="airtimeModalCenter">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="loading-overlay" id="loadingSpinner" style="display: none;">
                                    <div class="loading-spinner"></div>
                                </div>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Credit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <form id="dataForm">
                                        @csrf
                                        <div class="card card-body">

                                        {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                        <div id="div_id_network" class="form-group">
                                            <label for="network" class=" requiredField">
                                                Username<span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text" id="username" name="username"  class="text-success form-control" required >
                                            </div>
                                        </div>
                                        <br/>
                                        <div id="div_id_network" >
                                            <label for="network" class=" requiredField">
                                                Enter Amount<span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <input type="number" id="amount" name="amount"  class="text-success form-control" required>
                                            </div>
                                        </div>
                                        <br/>

                                        <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                        <button type="submit" class="btn btn-primary">Fund</button>
                                </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    {{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
                                </div>
                            </div>
                        </div>
                        </div>

                            <div class="col-xl-2 col-sm-4 col-6" data-bs-toggle="modal" data-bs-target="#refundModalCenter" >
                                <div class="card ov-card">
                                    <div class="card-body">
                                        <div class="ana-box">
                                            <div class="ic-n-bx">
                                                <div class="icon-box bg-primary">
                                                    <i class="fa  fa-money-bill text-white"></i>
                                                </div>
                                            </div>
                                            <div class="anta-data">
                                                <h5>Refund</h5>
                                                <span>User</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="refundModalCenter">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Refund User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <form id="refundForm">
                                            @csrf
                                            <div class="card card-body">

                                                {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                                <div id="div_id_network" class="form-group">
                                                    <label for="network" class=" requiredField">
                                                        Username<span class="asteriskField">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" id="username1" name="username"  class="text-success form-control" required >
                                                    </div>
                                                </div>
                                                <br/>
                                                <div id="div_id_network" >
                                                    <label for="network" class=" requiredField">
                                                        Enter Amount<span class="asteriskField">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="number" id="amount1" name="amount"  class="text-success form-control" required>
                                                    </div>
                                                </div>
                                                <br/>

                                                <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                                <button type="submit" class="btn btn-primary">Re-Fund</button>
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            {{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-sm-4 col-6" data-bs-toggle="modal" data-bs-target="#chargeModalCenter">
                                <div class="card ov-card">
                                    <div class="card-body">
                                        <div class="ana-box">
                                            <div class="ic-n-bx">
                                                <div class="icon-box bg-primary ">
                                                    <i class="fa fa-money-bill text-white"></i>
                                                </div>
                                            </div>
                                            <div class="anta-data">
                                                <h5>Charge</h5>
                                                <span>Users</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="chargeModalCenter">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Charge User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <form id="chargeForm">
                                            @csrf
                                            <div class="card card-body">

                                                {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                                <div id="div_id_network" class="form-group">
                                                    <label for="network" class=" requiredField">
                                                        Username<span class="asteriskField">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="text" id="username3" name="username"  class="text-success form-control" required >
                                                    </div>
                                                </div>
                                                <br/>
                                                <div id="div_id_network" >
                                                    <label for="network" class=" requiredField">
                                                        Enter Amount<span class="asteriskField">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="number" id="amount3" name="amount"  class="text-success form-control" required>
                                                    </div>
                                                </div>
                                                <br/>

                                                <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                                <button type="submit" class="btn btn-primary">Charge</button>
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            {{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-sm-4 col-6">
                                <a href="{{route('admin/user')}}">
                                <div class="card ov-card">
                                    <div class="card-body">
                                        <div class="ana-box">
                                            <div class="ic-n-bx">
                                                <div class="icon-box bg-primary ">
                                                    <i class="fa fa-gifts text-white"></i>
                                                </div>
                                            </div>
                                            <div class="anta-data">
                                                <h5>User</h5>
                                                <span>Tasks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-2 col-sm-4 col-6">
                                <a href="{{route('admin/deposits')}}">
                                <div class="card ov-card">
                                    <div class="card-body">
                                        <div class="ana-box">
                                            <div class="ic-n-bx">
                                                <div class="icon-box bg-primary rounded-circle">
                                                    <i class="fa fa-money-bill text-white"></i>
                                                </div>
                                            </div>
                                            <div class="anta-data">
                                                <h5>All</h5>
                                                <span>Deposit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-2 col-sm-4 col-6">
                                <a href="{{route('admin/bills')}}">
                                <div class="card ov-card">
                                    <div class="card-body">
                                        <div class="ana-box">
                                            <div class="ic-n-bx">
                                                <div class="icon-box bg-primary rounded-circle">
                                                    <i class="fa fa-money-bill text-white"></i>
                                                </div>
                                            </div>
                                            <div class="anta-data">
                                                <h5>All</h5>
                                                <span>Bills</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
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
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally
                // Get the form data
                var formData = $(this).serialize();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to fund ' + document.getElementById("username").value + ' ₦' + document.getElementById("amount").value + '?',
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
                            url: "{{ route('admin/cr') }}",
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


                // Send the AJAX request
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#refundForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally
                // Get the form data
                var formData = $(this).serialize();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to re-fund ' + document.getElementById("username1").value + ' ₦' + document.getElementById("amount1").value + '?',
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
                            url: "{{ route('admin/ref') }}",
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


                // Send the AJAX request
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#chargeForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally
                // Get the form data
                var formData = $(this).serialize();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to Charge ' + document.getElementById("username3").value + ' ₦' + document.getElementById("amount3").value + '?',
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
                        // The user clicked "Yes", proceed with the action
                        // Add your jQuery code here
                        // For example, perform an AJAX request or update the page content
                        $('#loadingSpinner').show();
                        $.ajax({
                            url: "{{ route('admin/ch') }}",
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


                // Send the AJAX request
            });
        });

    </script>


@endsection

