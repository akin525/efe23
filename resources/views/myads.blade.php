@extends('layouts.sidebar')
@section('tittle', 'My Ads')
@section('content')
    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <br/>
        <br/>
        <div class="widget-stat card bg-primary">
            <div class="card-body  p-4">
                <div class="media">
									<span class="me-3">
										<i class="la la-shopping-basket"></i>
									</span>
                    <div class="media-body text-white">
                        <p class="mb-1">My Ads Post</p>
                        <h3 class="text-white">Advert</h3>

                        <small>Advertise your product with membership plan</small>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="card card-body">
<div class="table-responsive">
    <table class="table table-responsive-md">
        <thead>
        <tr>
            <th style="width:50px;">
                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                    <input type="checkbox" class="form-check-input" id="checkAll" required="">
                    <label class="form-check-label" for="checkAll"></label>
                </div>
            </th>
            <th><strong>Ads Name</strong></th>
            <th><strong>Cost</strong></th>
            <th><strong>No of Days</strong></th>
            <th><strong>Category</strong></th>
            <th><strong>status</strong></th>
            <th><strong>Action</strong></th>
        </tr>
        </thead>
        <tbody>
        @foreach($ads as $ad)
        <tr>
            <td>
                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                    <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                    <label class="form-check-label" for="customCheckBox2"></label>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <img src="{{url('/', $ad->cover_image)}}" class="rounded-lg me-2" width="24" alt="">
                    <span class="w-space-no">{{$ad->advert_name}}</span>
                </div>
            </td>
            <td>₦{{number_format(intval($ad->amount *1))}}</td>
            <td>{{$ad->duration}} Days</td>
            <td>{{$ad->category}}</td>
            @if($ad->status == "1")
            <td><div class="d-flex align-items-center"><i class="fa fa-circle text-primary me-1"></i>Active</div></td>
            @else
                <td><div class="d-flex align-items-center"><i class="fa fa-circle text-info me-1"></i>Pending</div></td>
            @endif

                <td>
                <div class="d-flex">
                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


</div>
        </div>
    </div>
@endsection
@section('script')

@endsection
