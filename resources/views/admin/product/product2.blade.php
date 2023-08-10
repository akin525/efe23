@extends('admin.layouts.sidebar')
@section('tittle', 'product')
@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        /*  Toggle Switch  */

        .toggleSwitch span span {
            display: none;
        }

        @media only screen {
            .toggleSwitch {
                display: inline-block;
                height: 18px;
                position: relative;
                overflow: visible;
                padding: 0;
                margin-left: 50px;
                cursor: pointer;
                width: 40px;
                user-select: none;
            }

            .toggleSwitch * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .toggleSwitch label,
            .toggleSwitch > span {
                line-height: 20px;
                height: 20px;
                vertical-align: middle;
            }

            .toggleSwitch input:focus ~ a,
            .toggleSwitch input:focus + label {
                outline: none;
            }

            .toggleSwitch label {
                position: relative;
                z-index: 3;
                display: block;
                width: 100%;
            }

            .toggleSwitch input {
                position: absolute;
                opacity: 0;
                z-index: 5;
            }

            .toggleSwitch > span {
                position: absolute;
                left: -50px;
                width: 100%;
                margin: 0;
                padding-right: 50px;
                text-align: left;
                white-space: nowrap;
            }

            .toggleSwitch > span span {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 5;
                display: block;
                width: 50%;
                margin-left: 50px;
                text-align: left;
                font-size: 0.9em;
                width: 100%;
                left: 15%;
                top: -1px;
                opacity: 0;
            }

            .toggleSwitch a {
                position: absolute;
                right: 50%;
                z-index: 4;
                display: block;
                height: 100%;
                padding: 0;
                left: 2px;
                width: 18px;
                background-color: #fff;
                border: 1px solid #CCC;
                border-radius: 100%;
                -webkit-transition: all 0.2s ease-out;
                -moz-transition: all 0.2s ease-out;
                transition: all 0.2s ease-out;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            }

            .toggleSwitch > span span:first-of-type {
                color: #ccc;
                opacity: 1;
                left: 45%;
            }

            .toggleSwitch > span:before {
                content: '';
                display: block;
                width: 100%;
                height: 100%;
                position: absolute;
                left: 50px;
                top: -2px;
                background-color: #fafafa;
                border: 1px solid #ccc;
                border-radius: 30px;
                -webkit-transition: all 0.2s ease-out;
                -moz-transition: all 0.2s ease-out;
                transition: all 0.2s ease-out;
            }

            .toggleSwitch input:checked ~ a {
                border-color: #fff;
                left: 100%;
                margin-left: -8px;
            }

            .toggleSwitch input:checked ~ span:before {
                border-color: #0097D1;
                box-shadow: inset 0 0 0 30px #0097D1;
            }

            .toggleSwitch input:checked ~ span span:first-of-type {
                opacity: 0;
            }

            .toggleSwitch input:checked ~ span span:last-of-type {
                opacity: 1;
                color: #fff;
            }

            /* Switch Sizes */
            .toggleSwitch.large {
                width: 60px;
                height: 27px;
            }

            .toggleSwitch.large a {
                width: 27px;
            }

            .toggleSwitch.large > span {
                height: 29px;
                line-height: 28px;
            }

            .toggleSwitch.large input:checked ~ a {
                left: 41px;
            }

            .toggleSwitch.large > span span {
                font-size: 1.1em;
            }

            .toggleSwitch.large > span span:first-of-type {
                left: 50%;
            }

            .toggleSwitch.xlarge {
                width: 80px;
                height: 36px;
            }

            .toggleSwitch.xlarge a {
                width: 36px;
            }

            .toggleSwitch.xlarge > span {
                height: 38px;
                line-height: 37px;
            }

            .toggleSwitch.xlarge input:checked ~ a {
                left: 52px;
            }

            .toggleSwitch.xlarge > span span {
                font-size: 1.4em;
            }

            .toggleSwitch.xlarge > span span:first-of-type {
                left: 50%;
            }
        }


        /*  End Toggle Switch  */

    </style>
    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ session('error') }}
                        </div>
                    @endif
                    <p class="text-muted mb-4 font-13">Product Controller</p>
                    <div class="table-responsive">
                        <table id="example" class="display table" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Network</th>
                                <th>Plan</th>
                                <th>Actual Amount</th>
                                <th>Selling Amount</th>
                                <th>Reseller Amount</th>
                                <th>Status</th>
                                <th>Switch</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $seller)
                                <tr>
                                    <td> {{$seller->network}} </td>
                                    <td > {{$seller->plan}}</td>
                                    <td> {{$seller->amount}}</td>
                                    <td> {{$seller->tamount}}</td>
                                    <td> {{$seller->ramount}}</td>
                                  <td>@if($seller->status=="1")<h6 class="badge badge-primary">Active</h6>@else<h6
                                            class="badge badge-warning">
                                            Not-Active</h6> @endif</td>
                                    <td>
                                        <label class="toggleSwitch nolabel">
                                            <input type="checkbox" name="status" value="0" id="myCheckBox"
                                                   {{$seller->status =="1"?'checked':''}}
                                                   {{--                                            @if($pay->status==1?'checked':'')--}}
                                                   onclick="window.location='{{route('admin/pd2', $seller->id)}}'"/>
                                            <!--                                            <button  type="submit" class="btn-info col-lg">Update</button>-->
                                            <span>
                                                <span>off</span>
                                                <span>on</span>
                                             </span>

                                            <a></a>
                                        </label>
                                    </td>
                                    <td>
                                        <button  type="button" class="btn btn-outline-primary" onclick="openModal(this)" data-user-id="{{$seller->id}}" data-user-name="{{$seller->plan}}" >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$product->links()}}
                        <style>
                            /* Add your CSS styles here */
                            .modal {
                                display: none;
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(0, 0, 0, 0.5);
                            }
                            .modal-content {
                                background-color: white;
                                width: 60%;
                                max-width: 400px;
                                margin: 100px auto;
                                padding: 20px;
                                border-radius: 5px;
                            }
                        </style>
                        <div class="modal" id="editModal">
                            <div class="modal-content">
                                <form id="dataForm" >
                                    @csrf
                                    <div class="card card-body">
                                        <p>EDIT PRODUCT</p>
                                        {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                        <br/>
                                        <div class="form-group">
                                            <label>Product-Plan</label>
                                            <input type="text" class="form-control" id="plan"  name="name" value="" readonly />
                                            <input type="hidden" class="form-control" id="id" name="id" value="" required />
                                        </div>
                                        <br/>
                                        <div id="div_id_network" >
                                            <label for="network" class=" requiredField">
                                                Enter selling Amount<span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <input type="number" id="amount" name="tamount"  class="text-success form-control" required>
                                            </div>
                                        </div>
                                        <br/>
                                        <div id="div_id_network" >
                                            <label for="network" class=" requiredField">
                                                Enter Reseller Amount<span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <input type="number" id="amount" name="ramount"  class="text-success form-control" required>
                                            </div>
                                        </div>
                                        <br/>
                                        <button type="submit" class="btn btn-outline-success">Update</button>
                                    </div>
                                </form>
                                <button class="btn btn-outline-danger" onclick="closeModal()">Cancel</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>

    </div>
@endsection
@section('script')
    <script>
        function openModal(element) {
            const modal = document.getElementById('editModal');
            const newNameInput = document.getElementById('id');
            const net = document.getElementById('plan');
            const userId =element.getAttribute('data-user-id');
            const userName = element.getAttribute('data-user-name');



            newNameInput.value = userId;
            net.value = userName;

            console.log(newNameInput);
            console.log(net);
            modal.style.display = 'block';
            // You can fetch user data using the userId and populate the input fields in the modal if needed
        }

        function closeModal() {
            const modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        function saveChanges() {
            // Add code here to save the changes and update the table
            closeModal();
        }
    </script>
    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                        // The user clicked "Yes", proceed with the action
                        // Add your jQuery code here
                        // For example, perform an AJAX request or update the page content
                        $('#loadingSpinner').show();

                        $.ajax({
                            url: "{{route('admin/do2')}}",
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
            });
        });

    </script>

    @livewireScripts
    <script src="{{asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/jszip.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins-init/datatables.init.js')}}"></script>
@endsection
