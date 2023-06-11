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

    <div class="row card card-body">
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Kindly Fill All Necessary Space For Your Advert Request</h4>
            </div>
        </div>

        <form method="post" action="#" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Advert Name </label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Advert Address</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Enter Your Full Address" type="text" name="address" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Advert Duration</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control datetimepicker" name="duration"  type="text" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category</label>
                <div class="col-sm-12 col-md-10">
                    <select class="form-control datetimepicker" name="category" required>
                        <option value="Appliances">Appliances</option>
                        <option value="Fashions">Fashions</option>
                        <option value="Properties">Properties</option>
                        <option value="Educations">Educations</option>
                        <option value="Businesses">Businesses</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product Price</label>
                <div class="col-sm-12 col-md-10">
                    <input type="number" class="form-control " name="amount" placeholder="Enter Product amount" required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-12 col-md-2 col-form-label">Advert Content</label>
                <div class="html-editor pd-20 card-box mb-30">
                    {{--                        <textarea class="textarea_editor form-control border-radius-0" name="text" placeholder="Enter text ..." required></textarea>--}}
                    <textarea class="form-control border-radius-0" name="text" placeholder="Enter text ..." required></textarea>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="{{Auth::user()->number}}" type="number" name="number" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Cover Image</label>
                <form action="#" class="dropzone dlab-clickable">

                    <div class="dlab-default dlab-message"><button class="dlab-button" type="button">Drop files here to upload</button></div></form>
            </div>
            <button type="submit" class="btn btn-success">Post</button>
        </form>

    </div>

</div>
@endsection
@section('script')
    <script src="{{asset('dashboard/vendor/dropzone/dist/dropzone.js')}}"></script>
    <script src="{{asset('dashboard/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

@endsection
