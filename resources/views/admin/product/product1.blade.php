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
                                    <td> {{$seller->name}}</td>
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
                                                   onclick="window.location='{{route('admin/pd', $seller->id)}}'"/>
                                            <!--                                            <button  type="submit" class="btn-info col-lg">Update</button>-->
                                            <span>
                                                <span>off</span>
                                                <span>on</span>
                                             </span>

                                            <a></a>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="{{route('admin/editproduct', $seller->id)}}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$product->links()}}

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>

    </div>
@endsection
@section('script')
    @livewireScripts
    <script src="{{asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/jszip.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins-init/datatables.init.js')}}"></script>
@endsection
