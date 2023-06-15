@extends('admin.layouts.sidebar')
@section('tittle', 'All Bills')
@section('content')
    <div>
        <div class="row">
            <div class="col-xl-4 col-lg-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="bgl-primary rounded p-3">
                                    <h4 class="mb-0">Sum Of Today Bills Purchase</h4>
                                    <h4><b>₦{{ number_format($am) ?? 'Total Bills Purchase' }}</b></h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bgl-primary rounded p-3">
                                    <h4 class="mb-0">Bills Purchase Today</h4>
                                    <h4><b>{{ number_format($ft) ?? 'Total Today' }}</b></h4>

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
                                    <h4 class="mb-0">Bills Purchase Yesterday</h4>
                                    <h4><b>{{$st}}</b></h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bgl-primary rounded p-3">
                                    <h4 class="mb-0">Sum Of  Yesterday Bills Purchase</h4>
                                    <h4><b>₦{{ $am1 ?? 'Bills Purchase Yesterday' }}</b></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-0">
                        <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-note-sticky"></i>Bills</button>
                    </div>
                </div>

            </div>
            <div class="col-xl-4 col-lg-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="bgl-primary rounded p-3">
                                    <h4 class="mb-0">Sum Of Total Bills Purchase 2Days Ago</h4>
                                    <h4><b>₦{{ number_format($am2) ?? 'Total Bills Purchase' }}</b></h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bgl-primary rounded p-3">
                                    <h4 class="mb-0">Bills Purchase 2Days Ago</h4>
                                    <h4><b>{{$rt}}</b></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-0">
                        <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-users"></i>All User</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive active-projects">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">All Bills</h4>
                    </div>
                    <table id="example" class="display table" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Edit</th>
                            <th>Receipt</th>
                            <th>Plan</th>
                            <th>Amount</th>
                            <th>Balance Before</th>
                            <th>Balance After</th>
                            <th>Phone No</th>
                            <th>Payment_Ref</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $re)
                            <tr>
                                <td>{{$re->timestamp}}</td>
                                <td>{{$re->username}}</td>
                                <td><a href="{{route('admin/profile', $re->username)}}"><i class="fa fa-pencil"></i> </a></td>
                                <td><a href="{{route('viewpdf', $re->id)}}" class="badge badge-success text-white"><i class="fa fa-download">Pdf</i></a> </td>
                                <td>{{$re->product}}</td>
                                <td>{{$re->amount}}</td>
                                <td>{{$re->fbalance}}</td>
                                <td>{{$re->balance}}</td>
                                <td>{{$re->number}}</td>
                                <td>{{$re->transactionid}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables/js/jszip.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins-init/datatables.init.js')}}"></script>
@endsection
