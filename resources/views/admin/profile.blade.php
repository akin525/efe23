@extends('admin.layouts.sidebar')
@section('tittle', $user['name'].' page')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-profile">
                <div class="admin-user">
                    <div class="img-wrraper">
                        <div class="">
                            <img src="{{asset('efe.png')}}" class="rounded-circle"></div>
                        <a class="icon-wrapper" href="#"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="user-details">
                        <div class="title"><a target="_blank" href="#">
                                <h4>{{$user['name']}}</h4></a>
                            <h6>{{$user['username']}}</h6>
                        </div>
                        <ul class="follow-list">
                            <li>
                                <div class="follow-num ">₦{{number_format(intval($user->parentData->balance *1))}}</div><span>Wallet</span>
                            </li>
                            <li>
                                <div class="follow-num ">₦{{number_format(intval($sumtt *1))}}</div><span>All Deposit</span>
                            </li>
                        </ul>
                        <ul class="follow-list">
                            <li>
                                <div class="follow-num ">₦{{number_format(intval($user->parentData->bonus *1))}}</div><span>Bonus</span>
                            </li>
                            <li>
                                <div class="follow-num ">₦{{number_format(intval($sumbo *1))}}</div><span>All Bills</span>
                            </li>
                            <li>
                                <div class="follow-num ">₦{{number_format(intval($sumch *1))}}</div><span>Charges</span>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-xxl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body profile-accordion pb-0">
                            <div class="accordion" id="accordionExample1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                            Account Details
                                        </button>
                                    </h2>
                                    <div id="collapseOne1" class="accordion-collapse collapse show" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
                                        <div class="accordion-body">
                                            <div class="about-me">
                                                <ul>
                                                    <div class="card-body">
                                                        @if($user->parentData->bank==null)
                                                            <center>
                                                                <button type="button" class="btn btn-primary text-center">Generate Account Number</button>
                                                            </center>
                                                        @else
                                                            <div class="basic-list-group">
                                                                <div class="list-group"><a href="javascript:void(0);" class="list-group-item list-group-item-action active">Account
                                                                        Number </a><a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                                                        {{$user->parentData->account_number}}</a>
                                                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action disabled">
                                                                        Account Name
                                                                    </a> <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{$user->parentData->account_name}}</a>
                                                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action active">
                                                                        Bank
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{$user->parentData->bank}}</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </ul>
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
        <div class="col-xl-8">
            <div class="card h-auto">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Purchase</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">Deposit</a>
                                </li>
                                <li class="nav-item"><a href="#noti" data-bs-toggle="tab" class="nav-link">Message</a>
                                <li class="nav-item"><a href="#charge" data-bs-toggle="tab" class="nav-link">Charge</a>
                                <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Update User</a>
                                <li class="nav-item"><a href="#password" data-bs-toggle="tab" class="nav-link">Change Password</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
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
                                                        @foreach($version as $re)
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
{{--                                                    {{ $version->links() }}--}}


                                                </div>
                                                <!-- /Default accordion -->
                                            </div>
                                        </div>
                                        <!--/tab-content-->
                                    </div>

                                </div>
                                <div id="about-me" class="tab-pane fade">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="card-body pt-0">
                                                <div class="table-responsive">
                                                    <table id="example" class="display table" style="min-width: 845px">
                                                        <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Username</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>I. Wallet</th>
                                                            <th>F. Wallet</th>
                                                            <th>Ref</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($td as $dat)
                                                            <tr>
                                                                <td>{{$dat->id}}</td>
                                                                <td>{{$dat->username}}
                                                                </td>
                                                                <td>{{$dat->amount}}</td>
                                                                <td>

                                                                    @if($dat->status=="1")
                                                                        <span class="badge badge-success">Funded</span>
                                                                    @elseif($dat->status=="0" || $dat->status=="Not Delivered" || $dat->status=="Error" || $dat->status=="ORDER_CANCELLED" || $dat->status=="Invalid Number" || $dat->status=="Unsuccessful")
                                                                        <span class="badge badge-warning">{{$dat->status}}</span>
                                                                    @else
                                                                        <span class="badge badge-info">{{$dat->status}}</span>
                                                                    @endif

                                                                </td>
                                                                <td>{{$dat->iwallet}}</td>
                                                                <td>{{$dat->fwallet}}</td>
                                                                <td>{{$dat->payment_ref}}</td>
                                                                <td>{{$dat->date}}</td>
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
                                <div id="about-me" class="tab-pane fade">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="card-body pt-0">
                                                <div class="table-responsive">
                                                    <table id="example" class="display table" style="min-width: 845px">
                                                        <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Username</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>I. Wallet</th>
                                                            <th>F. Wallet</th>
                                                            <th>Ref</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($td as $dat)
                                                            <tr>
                                                                <td>{{$dat->id}}</td>
                                                                <td>{{$dat->username}}
                                                                </td>
                                                                <td>{{$dat->amount}}</td>
                                                                <td>

                                                                    @if($dat->status=="1")
                                                                        <span class="badge badge-success">Funded</span>
                                                                    @elseif($dat->status=="0" || $dat->status=="Not Delivered" || $dat->status=="Error" || $dat->status=="ORDER_CANCELLED" || $dat->status=="Invalid Number" || $dat->status=="Unsuccessful")
                                                                        <span class="badge badge-warning">{{$dat->status}}</span>
                                                                    @else
                                                                        <span class="badge badge-info">{{$dat->status}}</span>
                                                                    @endif

                                                                </td>
                                                                <td>{{$dat->iwallet}}</td>
                                                                <td>{{$dat->fwallet}}</td>
                                                                <td>{{$dat->payment_ref}}</td>
                                                                <td>{{$dat->date}}</td>
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
                                <div id="noti" class="tab-pane fade">
                                    <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1  my-4 px-4">
                                        <a href="#" class="btn btn-danger">Clear all</a>
                                    <ul class="timeline">
                                        @foreach($no as $net)
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
                                <div id="charge" class="tab-pane fade">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="card-body pt-0">
                                                <div class="table-responsive">
                                                    <table id="example" class="display table" style="min-width: 845px">
                                                        <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Username</th>
                                                            <th>Amount</th>
                                                            <th>Refid</th>
                                                            <th>I-Wallet</th>
                                                            <th>F-Wallet</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($charge as $dat)
                                                            <tr>
                                                                <td>{{$dat->id}}</td>
                                                                <td>{{$dat->username}}</td>
                                                                <td>&#8358;{{$dat->amount}}</td>
                                                                <td>{{$dat->payment_ref}}</td>
                                                                <td>{{$dat->iwallet}}</td>
                                                                <td>{{$dat->fwallet}}</td>
                                                                <td>{{$dat->date}}</td>

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

                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <form>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" value="{{$user->email}}" class="form-control" readonly/>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Full Name</label>
                                                        <input type="text" value="{{$user->name}}" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" value="{{$user->address}}" class="form-control"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Number</label>
                                                    <input type="number" value="{{$user->phone}}" class="form-control"/>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Gender</label>
                                                        <input type="text" value="{{$user->gender}}" class="form-control"/>
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label class="form-label">Role</label>
                                                        <select class="form-control default-select wide profile-page" id="inputState">
                                                            <option selected="">{{$user->role}}</option>
                                                            <option value="user">User</option>
                                                            <option value="admin">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check custom-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="gridCheck">
                                                        <label class="form-check-label form-label" for="gridCheck"> Check me out</label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Update User</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control h-50" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
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
