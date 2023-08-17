@extends('layouts.sidebar')
@section('tittle', 'MyApi')
@section('content')
<div class="row">
<br/>
<br/>
<div class="widget-stat card bg-primary">
    <div class="card-body  p-4">
        <div class="media">
									<span class="me-3">
										<i class="la la-key"></i>
									</span>
            <div class="media-body text-white">
                <p class="mb-1">API Access</p>
                <h3 class="text-white">ApiKey</h3>

                <small>Use your apikey for your website Authentication</small>
            </div>
        </div>
    </div>
</div>
<br/>

<style>
    .code-frame {
        border: 1px solid #ddd;
        border-radius: 3px;
        overflow: auto;
        margin-bottom: 1em;
    }

    pre {
        margin: 0;
        padding: 1em;
        font-size: 14px;
        font-family: Consolas, monospace;
        line-height: 1.5;
    }
</style>

    <style>
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
{{--    <div class="card-body">--}}
{{--        <center>--}}
{{--            <img width="100" src="{{asset('efe1.png')}}" alt="#" />--}}
{{--        </center>--}}
{{--    </div>--}}

    <br/>

    <div class="product-add global-shadow px-sm-30 py-sm-50 px-0 py-20 bg-white radius-xl w-100 mb-40">
        <div class="row justify-content-center">
            <div class="col-xxl-7 col-lg-10">
                <div class="mx-sm-30 mx-20 ">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{asset('dashboard/images/items.png')}}" alt="">
                        </div>
                        <h4><strong>Notification: </br></strong><b class='align-content-center'>Note that You can request for a website . You will have access to cheaper prices of products too! </b></h4>
                        <p>Before you access our API, Kindly note the conditions below:</p>
                        <ul class="w3-ul w3-card" style="">
                            <li>1. You have successfully requested for Api Key ({{ Auth::user()->apikey}})</li>
                            <li>2. You can access our api documentation via <a href="https://documenter.getpostman.com/view/16410443/UzXPwG8p#b00323c6-d738-46fc-8feb-3a484ebe3d00" target="_blank"><b>efemobilemoney.com/API/docs/index</b></a></li>
                            <li>3. API service is available for DATA, AIRTIME VTU and BILLS PAYMENT(Dstv, Gotv, Startimes, Smile Bundle, Smile Recharge, Spectranet, Waec Result Checker)</li>
                            <li>4. You can generate a new API key free of charge, note that the formal key will no longer be functional once you generate a new key</li>
                            <li>5. Do not disclose your API key to anyone, Primedata staffs will never request for it</li>
                            <li>6. Updates about API service will be sent via mail to <b>{{ Auth:: user()->email}}</b></li>
                            <li>7. For any issue about this API service kindly mail our technical department via <b>info@efemobilemoney.com</b></li>
                        </ul>
                        <br/>

                        <div class="w3-container w3-card-4 w3-light-grey">
                            <br>
                            <p class="w3-hide-small"><b class="w3-xlarge"><span class="w3-round w3-button w3-hover-black w3-border w3-black w3-text-white">Api Key:</span>{{ Auth::user()->apikey}}</b></p><br>

                            <a href="#" class="badge badge-primary">Generate New Api Key</a>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

</div>



<style>
    .tooltip {
        position: relative;
        display: inline-block;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 380px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: 150%;
        left: 50%;
        margin-left: -75px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip .tooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }
</style>
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        document.execCommand("copy");

        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied: " + copyText.value;
    }

    function outFunc() {
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copy to clipboard";
    }
</script>
@endsection
