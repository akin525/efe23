@extends('admin.layouts.sidebar')
@section('tittle', 'Airtime server')
@section('content')
    <style>
        .toggle-button-cover {
            display: table-cell;
            position: relative;
            width: 200px;
            height: 140px;
            box-sizing: border-box;
        }

        .button-cover {
            height: 100px;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 10px 20px -8px #c5d6d6;
            border-radius: 4px;
        }

        .button-cover:before {
            counter-increment: button-counter;
            content: counter(button-counter);
            position: absolute;
            right: 0;
            bottom: 0;
            color: #d7e3e3;
            font-size: 12px;
            line-height: 1;
            padding: 5px;
        }

        .button-cover,
        .knobs,
        .layer {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .button {
            position: relative;
            top: 50%;
            width: 74px;
            height: 36px;
            margin: -20px auto 0 auto;
            overflow: hidden;
        }

        .button.r,
        .button.r .layer {
            border-radius: 100px;
        }

        .button.b2 {
            border-radius: 2px;
        }

        .checkbox {
            position: absolute;
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            opacity: 0;
            cursor: pointer;
            z-index: 3;
        }

        .knobs {
            z-index: 2;
        }

        .layer {
            width: 100%;
            background-color: #ebf7fc;
            transition: 0.3s ease all;
            z-index: 1;
        }

        /* Button 1 */
        #button-1 .knobs:before {
            content: "Off";
            position: absolute;
            top: 4px;
            left: 4px;
            width: 20px;
            /*height: 10px;*/
            color: #fff;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            line-height: 1;
            padding: 9px 4px;
            background-color: #f44336;
            border-radius: 50%;
            transition: 0.3s cubic-bezier(0.18, 0.89, 0.35, 1.15) all;
        }

        #button-1 .checkbox:checked + .knobs:before {
            content: "ON";
            left: 42px;
            background-color: #03A9F4FF;
        }

        #button-1 .checkbox:checked ~ .layer {
            background-color: #fcebeb;
        }

        #button-1 .knobs,
        #button-1 .knobs:before,
        #button-1 .layer {
            transition: 0.3s ease all;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ session('error') }}
                        </div>
                    @endif
                    <p class="text-muted mb-4 font-13">Airtime Controller</p>
                    <div class="table-responsive">
                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                            <thead>
                            <tr>
                                <th>Server</th>
                                <th>Status</th>
                                <th>Switch</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($air as $seller)
                                <tr>
                                    <link rel="stylesheet" href="{{asset('style.css')}}">
                                    <!--Only for demo purpose - no need to add.-->
                                    <link rel="stylesheet" href="{{asset('demo.css')}}"/>
                                    <td> {{$seller->server}} </td>
                                <td>@if($seller->status=="1")<h6 class="btn-success">Active</h6>@else<h6
                                            class="btn-warning">
                                            Not-Active</h6> @endif</td>
                                    <td>
                                        <div class="button r" id="button-1">
                                            <input type="checkbox" class="checkbox" name="status" value="0" id="myCheckBox"
                                                   {{$seller->status =="1"?'checked':''}}
                                                   {{--                                            @if($pay->status==1?'checked':'')--}}
                                                   onclick="window.location='{{route('admin/up1', $seller->id)}}'"/>
                                            <!--                                            <button  type="submit" class="btn-info col-lg">Update</button>-->
                                            <<div class="knobs"></div>
                                            <div class="layer"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

@endsection
