@extends('admin.layouts.sidebar')
@section('tittle', 'edit product')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <!-- col-md-6 -->
                <div class="card-body subscribe">

                    <div class="col-md-12">
                        <form action="{{route('admin/do')}}" method="post">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product-Plan</label>
                                        <input type="text" class="form-control"  name="name" value="{{$pro->name}}" required />
                                        <input type="hidden" class="form-control"  name="id" value="{{$pro->id}}" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Actual Amount </label>
                                        <input type="number" name="amount" class="form-control" value="{{$pro->amount}}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Selling Amount </label>
                                        <input type="number" name="tamount" class="form-control" value="{{$pro->tamount}}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Reseller Amount </label>
                                        <input type="number" name="ramount" class="form-control" value="{{$pro->ramount}}" required/>
                                    </div>
                                </div>
                            </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <br>
                            <button type="submit" class="submit-btn">Submit</button>
                        </div>
                    </div>
                        </form>


                </div>


            </div>

        </div>

    </div>

@endsection
