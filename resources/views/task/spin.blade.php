@extends('layouts.sidebar')
@section('tittle', 'Spin & Wheel')
@section('content')
    <link rel="stylesheet" href="{{asset('style.css')}}" />


    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="widget-stat card bg-primary">
            <div class="card-body  p-4">
                <div class="media">
									<span class="me-3">
										<i class="la la-spinner"></i>
									</span>
                    <div class="media-body text-white">
                        <p class="mb-1">Spin&Wheel</p>
                        <h3 class="text-white">Spin</h3>

                        <small>Spin and win a bonus</small>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    <div class="wrapper">
        <div class="container">
            <canvas id="wheel"></canvas>
            <button id="spin-btn">Spin</button>
            <img class="sa" src="{{asset('spinner-arrow-.svg')}}" alt="spinner-arrow" />
        </div>
        <div id="final-value">
            <p>Click On The Spin Button To Start</p>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!-- Chart JS Plugin for displaying text over chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"></script>
    <!-- Script -->
    <script src="{{asset('script.js')}}"></script>
@endsection
@section('script')


@endsection

