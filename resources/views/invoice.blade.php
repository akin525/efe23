@extends('layouts.sidebar')
@section('tittle', 'All Invoice')
@section('content')
    <!-- row -->
    <div class="element-area">
        <div class="">
            <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
                <div class="row">
                    <div class="">
                        <div class="card dz-card" id="accordion-one">
                            <div class="card-header flex-wrap">
                                <div>
                                    <h4 class="card-title">Product Invoice</h4>
                                </div>
                            </div>
                            <!--tab-content-->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table id="example" class="display table" style="min-width: 845px">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Username</th>
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
                                                @foreach($bill as $re)
                                                    <tr>
                                                        <td>{{$re->timestamp}}</td>
                                                        <td>{{$re->username}}</td>
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
                                    <!-- /Default accordion -->
                                </div>
                            </div>
                            <!--/tab-content-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection

