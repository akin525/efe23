@extends('layouts.sidebar')
@section('tittle', 'Tasks')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-primary-light analytics-card">
                <div class="card-body mt-4 pb-1">
                    <div class="row align-items-center">
                        <div class="col-xl-2">
                            <h3 class="mb-3">Avaliable Tasks</h3>
                            <p class="mb-0 text-primary pb-4">Get more bonus<br> on our platform</p>
                        </div>
                        <div class="col-xl-10">
                            <div class="row">
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <a href="{{url('spin')}}">
                                        <div class="card ov-card">
                                            <div class="card-body">
                                                <div class="ana-box">
                                                    <div class="ic-n-bx">
                                                        <div class="icon-box bg-primary">
                                                            <i class="fa fa-solid fa-network-wired text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div class="anta-data">
                                                        <img width="100" src="{{asset('sp.jpg')}}"/>
                                                        <h6><b>Spin & Win</b></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary">
                                                        <i class="fa  fa-mobile-phone text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <img width="100" src="{{asset('tk.png')}}"/>
                                                    <h6><b>Task & Earn</b></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <a href="{{route('advert')}}">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary ">
                                                        <i class="fa fa-cart-shopping text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <img width="100" src="{{asset('images.jpg')}}"/>
                                                    <h6><b>Advert placemen</b></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
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
                                                    <img width="100" src="{{asset('air.jpeg')}}"/>
                                                    <h6><b>Buy Airtime</b></h6>
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
                                                    <img width="100" src="{{asset('dat.png')}}"/>
                                                    <h6><b>Buy Data</b></h6>
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
                                                    <img width="100" src="{{asset('efe1.png')}}"/>
                                                    <h6><b>Notification</b></h6>
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

        <div class="col-xl-4 col-lg-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="text-center p-5 overlay-box" style="background-image: url(images/big/img5.jpg);">
                        <img src="{{asset('pro.png')}}" width="100" class="img-fluid rounded-circle" alt="">
                        <h3 class="mt-3 mb-0 text-white">{{Auth::user()->name}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="bgl-primary rounded p-3">
                                    <h4 class="mb-0">My Wallet</h4>
                                    <h4><b>₦{{number_format(intval(Auth::user()->parentData->balance *1),2)}}</b></h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bgl-primary rounded p-3">
                                    <h4 class="mb-0">My Bonus</h4>
                                    <h4><b>₦{{number_format(intval(Auth::user()->parentData->bonus *1),2)}}</b></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-0">
                        <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-user"></i> View Profile</button>
                    </div>
                </div>

        </div>


        <div class="col-xl-8 col-xxl-8 col-lg-12 col-sm-12">
            <div  class="card">
                <div class="card-body">
                    <h3><b>Activities</b></h3>
                    <div class="tab-content">

                        <table id="projects-tbl" class="table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Game</th>
                                <th>Win</th>
                                <th>Narration</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all as $po)
                                <tr>
                                    <td>{{$po->created_at}}</td>
                                    <td>{{$po->game}}</td>
                                    <td>{{$po->win}}</td>
                                    <td>{{$po->narration}}</td>
                                    <td>{{$po->amount}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
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
