@extends('layouts.sidebar')
@section('tittle','Dashboard')
@section('content')
    <script src="{{ asset('js/Chart.min.js') }}"></script>

    <div class="row">
        <div class="col-xl-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="any-card">
                        <div class="c-con">
                            <h4 class="heading mb-0">{{$greet}}<strong>{{Auth::user()->username}}!!</strong></h4>
                            <span>Notification:</span>
                            <p class="mt-3">Loading......</p>

                            <a href="#" class="btn btn-primary btn-sm">View Profile</a>
                        </div>
                        <img src="{{asset('dashboard/images/analytics/developer_male.png')}}" class="harry-img" alt="">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary">
                <div class="card-header border-0">
                    <h4 class="heading mb-0 text-white">Wallet & Deposit 😎</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="sales-bx">
                            <i class="fa fa-wallet text-yellow" style="font-size: 40px;"></i>
                            <h4>₦{{number_format(intval($wallet['balance'] *1),2)}}</h4>
                            <span>Balance</span>
                        </div>
                        <div class="sales-bx">
                            <i class="fa fa-wallet text-yellow" style="font-size: 40px"></i>
                            <h4>₦{{number_format(intval($tdepo *1),2)}}</h4>
                            <span>Total deposit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: #394758!important">
                <div class="card-header border-0">
                    <h4 class="heading mb-0 text-white">Purchase & Bonus 😎</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="sales-bx">
{{--                            <img src="images/analytics/sales.png" alt="">--}}
                            <i class="fa fa-wallet text-blue" style="font-size: 40px"></i>
                            <h4>₦{{number_format(intval($tbill *1),2)}}</h4>
                            <span>Total Bills</span>
                        </div>
                        <div class="sales-bx">
                            <i class="fa fa-wallet text-blue" style="font-size: 40px"></i>
                            <h4>₦{{number_format(intval($wallet['bonus'] *1),2)}}</h4>
                            <span>Bonus</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deposit Chart</h4>
                </div>
                <div class="card-body">
                    <canvas id="transactionChart" class="flot-chart"></canvas>
{{--                    <div id="transactionChart" class="flot-chart"></div>--}}

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Purchase Chart</h4>
                </div>
                <div class="card-body">
                    <canvas id="transactionChart1" class="flot-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-sm-12">
            <div class="card overflow-hidden">
                <div class="text-center  overlay-box" style="background-image: url(images/big/img5.jpg);">
                    <img src="{{asset('pro.png')}}" width="100" class="img-fluid rounded-circle" alt="">
                    <h3 class="mt-3 mb-0 text-white">{{Auth::user()->name}}</h3>
                </div>
                <div class="card-body">
                    @if(Auth::user()->parentData->bank==null)
                        <center>
                            <button type="button" class="btn btn-primary text-center">Generate Account Number</button>
                        </center>
                    @else
                        <div class="basic-list-group">
                            <div class="list-group"><a href="javascript:void(0);" class="list-group-item list-group-item-action active">Account
                                    Number </a><a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                    {{Auth::user()->parentData->account_number}}</a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action disabled">
                                    Account Name
                                </a> <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{Auth::user()->parentData->account_name}}</a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action active">
                                    Bank
                                </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{Auth::user()->parentData->bank}}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-xxl-8 col-lg-12 col-sm-12">
            <div  class="card">
                <div class="card-body">
                    <h3><b>Activities</b></h3>
                    <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1  my-4 px-4">
                        <ul class="timeline">
                            @foreach($trans as $net)
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

        <div class="col-xl-12">
            <div class="card bg-primary-light analytics-card">
                <div class="card-body mt-4 pb-1">
                    <div class="row align-items-center">
                        <div class="col-xl-2">
                            <h3 class="mb-3">Quick Transaction</h3>
                            <p class="mb-0 text-primary pb-4">Get more bonus<br> on our platform</p>
                        </div>
                        <div class="col-xl-10">
                            <div class="row">
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <a href="{{route('select')}}">
                                        <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary">
                                                        <i class="fa fa-solid fa-network-wired text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Buy</h5>
                                                    <span>Data</span>
                                                    <h3>+23%</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6" data-bs-toggle="modal" data-bs-target="#airtimeModalCenter">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary">
                                                        <i class="fa  fa-mobile-phone text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Buy</h5>
                                                    <span>Airtime</span>
                                                    <h3>-2%</h3>
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
                                                <h5 class="modal-title">Airtime Recharge</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <form id="dataForm" >
                                                @csrf
                                            <div class="card card-body">
                                                <p>AIRTIME PURCHASE</p>
                                                {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                                <br/>
                                                <div id="div_id_network" class="form-group">
                                                    <label for="network" class=" requiredField">
                                                        Network<span class="asteriskField">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select name="id" class="text-success form-control" required="">

                                                            <option value="m">MTN</option>
                                                            <option value="g">GLO</option>
                                                            <option value="a">AIRTEL</option>
                                                            <option value="9">9MOBILE</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div id="div_id_network" >
                                                    <label for="network" class=" requiredField">
                                                        Enter Amount<span class="asteriskField">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="number" id="amount" name="amount" min="100" max="4000" class="text-success form-control" required>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div id="div_id_network" class="form-group">
                                                    <label for="network" class=" requiredField">
                                                        Enter Phone Number<span class="asteriskField">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="number" id="number" name="number" minlength="11" class="text-success form-control" required >
                                                    </div>
                                                </div>
                                                <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                                <button type="submit" class="btn btn-primary">PURCHASE</button>
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
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary ">
                                                        <i class="fa fa-cart-shopping text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Buy</h5>
                                                    <span>& Sell</span>
                                                    <h3>-3%</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary ">
                                                        <i class="fa fa-gifts text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Spin</h5>
                                                    <span>& Win</span>
                                                    <h3>+25%</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="fa fa-tasks text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Task</h5>
                                                    <span>& Earn</span>
                                                    <h3>+30%</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="fa fa-bookmark text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>My</h5>
                                                    <span>Plan</span>
                                                    <h3>-32%</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                    text: 'Do you want to buy airtime of ₦' + document.getElementById("amount").value + ' on ' + document.getElementById("number").value +' ?',
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
                            url: "{{ route('buyairtime') }}",
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
    <script>
        var ctx = document.getElementById('transactionAreaChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dates) !!},
                datasets: [{
                    label: 'Transaction Amount',
                    data: {!! json_encode($amounts) !!},
                    backgroundColor: 'rgba(250,189,6,0.95)',
                    borderColor: 'rgb(114,222,12)',
                    borderWidth: 1,
                    fill: 'origin' // To fill the area below the line
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time', // Assuming transaction_date is a date field
                        time: {
                            unit: 'day' // Display by day
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        fetch('/transaction')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('transactionChart').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'Deposit Amount',
                            data: data.amounts,
                            backgroundColor: 'rgb(33,114,11)',
                            borderColor: 'rgb(33,114,11)',
                            borderWidth: 1,
                            fill: 'origin' // Fill the area below the line

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/transaction1')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('transactionChart1').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'Purchase Charts',
                            data: data.amounts,
                            backgroundColor: 'rgba(211,161,11,0.95)',
                            borderColor: 'rgba(211,161,11,0.95)',
                            borderWidth: 1,
                            fill: 'origin' // Fill the area below the line

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
@endsection
