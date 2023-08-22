@extends('layouts.sidebar')
@section('tittle', 'Ads Placement')
@section('content')

    <style>

        .dropzone {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
        }

        .message {
            font-size: 18px;
            color: #999;
        }

        .dropzone:hover {
            border-color: #aaa;
        }

        .dropzone.dragover {
            border-color: #337ab7;
        }

        .dropzone.dragover .message {
            color: #337ab7;
        }

    </style>
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
										<i class="la la-key"></i>
									</span>
                    <div class="media-body text-white">
                        <p class="mb-1">Post Ads/Product</p>
                        <h3 class="text-white">Advert</h3>

                        <small>Advertise your product with membership plan</small>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <form action="{{ route('padvert') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-xl-6">
            <div class="row card card-body">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4"><b>Kindly Fill All Necessary Space For Your Advert Request</b></h4>
            </div>
        </div>

            <div class="input-group mb-3 input-success-o">
                <span class="input-group-text">Advert Name</span>
                <input class="form-control" type="text" name="name" required>
            </div>
            <div class="input-group mb-3 input-info-o">
                <span class="input-group-text">Advert Address</span>
                <input class="form-control" placeholder="Enter Your Full Address" type="text" name="address" required>
            </div>
            <div class="input-group mb-3 input-primary">
                <input class="form-control datetimepicker" name="duration" placeholder="Enter numbers of days"  type="text" required>
                <span class="input-group-text border-0">Advert Duration</span>
            </div>
            <div class="input-group mb-3  input-success">
                <span class="input-group-text border-0">Category</span>
                <select class="form-control datetimepicker" name="category" required>
                    <option value="Appliances">Appliances</option>
                    <option value="Fashions">Fashions</option>
                    <option value="Properties">Properties</option>
                    <option value="Educations">Educations</option>
                    <option value="Businesses">Businesses</option>
                </select>
            </div>
{{--            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
            <div class="input-group mb-3 input-success-o">
                <span class="input-group-text">Product Price</span>
                <input type="number" class="form-control " name="amount" placeholder="Enter Product amount" required>
            </div>
{{--            <div class="input-group mb-3 input-primary">--}}
{{--                <textarea class="form-control border-radius-0" id="summernote" name="text" placeholder="Enter text ..." required></textarea>--}}
{{--                <span class="input-group-text border-0">Advert Content</span>--}}
{{--            </div>--}}

            <div class="input-group mb-3 input-info-o">
                <span class="input-group-text">Telephone</span>
                <input class="form-control" value="{{Auth::user()->phone}}" type="number" name="number" >
            </div>
        <style>
            #imageContainer {
                margin-top: 20px;
            }

            #displayedImage {
                max-width: 100%;
                height: auto;
                margin-top: 10px;
                display: none;
            }
        </style>
            <div class="card-header">
                <h4 class="card-title">Addition Image</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="dropzone">
                        <div class="dlab-default dlab-message">
                            <input class="dlab-button" name="add" id="imageInput" type="file" required/>
                            <div  id="imageContainer">
                                <img width="400" id="displayedImage" alt="Displayed Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
            </div>
    </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title">Advert Content</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                    <div class="mb-3">
                                        <textarea class="form-txtarea form-control" id="summernote" name="text" rows="8" ></textarea>
                                    </div>
                            </div>
                        </div>
                        <script>
                            // Initialize Summernote
                            $(document).ready(function() {
                                $('#summernote').summernote();
                            });
                        </script>
                        {{--            <div id="summernote">Hello Summernote</div>--}}

                        <div class="card-header">
                            <h4 class="card-title">Cover Image</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="dropzone dlab-clickable">

                                    <div class="dlab-default dlab-message">
                                        <input class="dlab-button" name="cover" id="imageInput1"  type="file" required/>
                                        <div id="imageContainer1">
                                            <img width="400" id="displayedImage1" alt="">
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Post Advert</button>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        const imageInput = document.getElementById("imageInput");
        const displayedImage = document.getElementById("displayedImage");

        imageInput.addEventListener("change", () => {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    displayedImage.src = e.target.result;
                    displayedImage.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });

    </script>
    <script>
        const imageInput1= document.getElementById("imageInput1");
        const displayedImage1 = document.getElementById("displayedImage1");

        imageInput1.addEventListener("change", () => {
            const file = imageInput1.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    displayedImage1.src = e.target.result;
                    displayedImage1.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });

    </script>
    <script src="{{asset('dashboard/vendor/dropzone/dist/dropzone.js')}}"></script>
    <script src="{{asset('dashboard/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
@endsection
