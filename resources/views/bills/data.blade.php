@extends('layouts.sidebar')
@section('tittle', 'Buy Data')
@section('content')
    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div style="padding:90px 15px 20px 15px">
            {{--            @if(Auth::user()->pin !="0")--}}
            {{--                <form action="{{ route('pin') }}" method="post">--}}
            {{--                    @else--}}
            <form id="dataForm">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <br>
                        <br>
                        <div id="AirtimePanel">
                            <div class="subscribe">
                                <p>DATA PURCHASE</p>
                                {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                <br/>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                     Select Your Network<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <select name="id" id="firstSelect" class="text-success form-control" required="">

                                            <option >Select Network</option>
                                            <option value="mtn-data">MTN</option>
                                            <option value="glo-data">GLO</option>
                                            <option value="airtel-data">AIRTEL</option>
                                            <option value="etisalat-data">9MOBILE</option>

                                        </select>
                                    </div>
                                </div>
                                <br/>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        Select Your Plan<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <select name="productid" id="secondSelect" class="text-success form-control" required="" onchange='document.getElementById("po").value = this.value.id;'>

                                            <option>Select Your Plan</option>
                                        </select>
                                    </div>
                                </div>
{{--                                <div id="div_id_network" >--}}
{{--                                    <label for="network" class=" requiredField">--}}
{{--                                        Enter Amount<span class="asteriskField">*</span>--}}
{{--                                    </label>--}}
{{--                                    <div class="">--}}
{{--                                        <input type="number" name="amount" id="po" value="" min="100" max="4000" class="text-success form-control" readonly>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <br/>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        Enter Phone Number<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <input type="number" id="number" name="number" minlength="11" class="text-success form-control" required>
                                    </div>
                                </div>
                                <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                <button type="submit" class="submit-btn" >PURCHASE</button>
                            </div>

                        </div>


                    </div>
                    <br/>
                    <br/>
                    <div class="col-sm-4 ">
                        <br/>
                        <br/>
                        <div class="card bg-primary">
                            <div class="card-header border-0">
                                <h4 class="heading mb-0 text-white">Wallet & Bonus 😎</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="sales-bx">
                                        <i class="fa fa-wallet text-yellow" style="font-size: 40px;"></i>
                                        <h4>₦{{number_format(intval(Auth::user()->parentData->balance *1),2)}}</h4>
                                        <span>Balance</span>
                                    </div>
                                    <div class="sales-bx">
                                        <i class="fa fa-wallet text-yellow" style="font-size: 40px"></i>
                                        <h4>₦{{number_format(intval(Auth::user()->parentData->bonus *1),2)}}</h4>
                                        <span>Bonus</span>
                                    </div>
                                </div>
{{--                                <ul class="list-group ">--}}
{{--                                    <b><li class="list-group-item list-group-item-primary text-white"> MTN *310#</li></b>--}}
{{--                                    <b><li class="list-group-item list-group-item-success text-white">MTN [CG] *131*4# or *460*260#</li></b>--}}
{{--                                    <b><li class="list-group-item list-group-item-action text-white">9mobile  *223#</li></b>--}}
{{--                                    <b><li class="list-group-item list-group-item-info text-white">Airtel *123#</li></b>--}}
{{--                                    <b><li class="list-group-item list-group-item-secondary text-white">Glo *124*0#</li></b>--}}
{{--                                </ul>--}}
                            </div>
                        </div>
                    </div>

                </div>

            </form>


        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#firstSelect').change(function() {
                var selectedValue = $(this).val();
                // Show the loading spinner
                $('#loadingSpinner').show();
                // Send the selected value to the '/getOptions' route
                $.ajax({
                    url: '{{ url('getOptions') }}/' + selectedValue,
                    type: 'GET',
                    success: function(response) {
                        // Handle the successful response
                        var secondSelect = $('#secondSelect');
                        $('#loadingSpinner').hide();
                        // Clear the existing options
                        secondSelect.empty();

                        // Append the received options to the second select box
                        $.each(response, function(index, option) {
                            secondSelect.append('<option  value="' + option.id + '">' + option.name +  ' --₦' + option.tamount + '</option>');
                        });

                        // Select the desired value dynamically
                        var desiredValue = 'value2'; // Set the desired value here
                        secondSelect.val(desiredValue);
                    },
                    error: function(xhr) {
                        // Handle any errors
                        console.log(xhr.responseText);
                    }
                });
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally
                // Get the form data
                var formData = $(this).serialize();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to buy ' + document.getElementById("secondSelect").options[document.getElementById("secondSelect").selectedIndex].text + ' on ' + document.getElementById("number").value + '?',
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
                            url: "{{ route('buydata') }}",
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
