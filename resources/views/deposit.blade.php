@extends('layouts.sidebar')
@section('tittle', 'Deposit')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive active-projects">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">All Deposit</h4>
                    </div>
                    <table id="projects-tbl" class="table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Amount Fund</th>
                            <th>Amount Before</th>
                            <th>Amount After</th>
                            <th>Payment_Ref</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fund as $po)
                            <tr>
                                <td>{{$po->date}}</td>
                                <td>{{$po->username}}</td>
                                <td>{{$po->amount}}</td>
                                <td>{{$po->iwallet}}</td>
                                <td>{{$po->fwallet}}</td>
                                <td>{{$po->payment_ref}}</td>
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
