@extends('layouts.sidebar')
@section('tittle', $ad['advert_name'])
@section('content')
    <div class="row">


        <br/>
        <br/>
        <div class="widget-stat card bg-primary">
            <div class="card-body  p-4">
                <div class="media">
									<span class="me-3">
										<i class="la la-shopping-basket"></i>
									</span>
                    <div class="media-body text-white">
                        <p class="mb-1">Advertisement</p>
                        <h3 class="text-white">{{$ad['advert_name']}}</h3>

                        <small>Date: {{$ad['created_at']}}</small>
                    </div>
                </div>
            </div>
        </div>
        <br/>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <!-- Tab panes -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <img class="img-fluid rounded  " src="{{url('/', $ad->cover_image)}}" alt="">
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <img class="img-fluid rounded " src="{{url('/', $ad->other)}}" alt="">
                                </div>

                            </div>
                            <div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs slide-item-list mt-3" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#first" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"  role="tab" aria-controls="home-tab-pane" aria-selected="true"><img class="img-fluid me-2 rounded" src="{{url('/', $ad->cover_image)}}" alt="" width="80"></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#second" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"  role="tab" aria-controls="profile-tab-pane" aria-selected="false"><img class="img-fluid me-2 rounded" src="{{url('/', $ad->other)}}" alt="" width="80"></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!--Tab slider End-->
                        <div class="col-xl-9 col-lg-6 col-md-6 col-sm-12">
                            <div class="product-detail-content">
                                <!--Product details-->
                                <div class="new-arrival-content pr">
                                    <h4>{{$ad->advert_name}}</h4>
                                    <div class="comment-review star-rating d-flex">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="review-text ms-3">(34 reviews) / </span><a class="product-review" href="#"  data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
                                    </div>
                                    <div class="d-table mb-2">
                                        <p class="price float-start d-block">₦{{number_format(intval($ad->amount *1))}}</p>
                                    </div>
                                    <p>Availability: <span class="item"> In stock <i
                                                class="fa fa-shopping-basket"></i></span>
                                    </p>
                                    <p>Product code: <span class="item">{{$ad->id}}</span> </p>
                                    <p>Product tags:&nbsp;&nbsp;
                                        <span class="badge badge-success light">{{$ad->category}}</span>
                                    </p>
                                    <p class="text-content">{{$ad->content}}</p>
                                    <div class="d-flex align-items-end flex-wrap mt-4">
                                        <!--Quantity start-->
{{--                                        <div class="col-2 px-0  mb-1 me-3">--}}
{{--                                            <input type="number" name="num" class="form-control input-btn input-number" value="1">--}}
{{--                                        </div>--}}
                                        <!--Quanatity End-->
                                        <div class="shopping-cart  mb-1 me-3">
                                            <a class="btn btn-primary" href="javascript:void(0);;"><i
                                                    class="fa fa-shopping-basket me-2"></i>Contact Stock</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="reviewModal">
            <div class="modal-dialog modal-dialog-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="text-center mb-4">
                                <img class="img-fluid rounded" width="78" src="images/avatar/1.jpg" alt="DexignZone">
                            </div>
                            <div class="mb-3">
                                <div class="rating-widget mb-4 text-center">
                                    <!-- Rating Stars Box -->
                                    <div class="rating-stars">
                                        <ul id="stars">
                                            <li class="star" title="Poor" data-value="1">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Fair" data-value="2">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Good" data-value="3">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Excellent" data-value="4">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="WOW!!!" data-value="5">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                            </div>
                            <button class="btn btn-success btn-block">RATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
