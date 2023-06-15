<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title >EFE ADMIN LOGIN PAGE</title>
    <meta name="description" content=" Efe Mobile Money  is a platform offers users opportunity to earn online by simply carrying out simple task such as advert sharing, watching advert ">
    <meta name="keywords" content="advert sharing, watching advert">
    <meta name="author" content="RENO">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('efe1.png')}}">

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{asset('auth/assets/css/core/libs.min.css')}}">



    <!-- qompac-ui Design System Css -->
    <link rel="stylesheet" href="{{asset('auth/assets/css/qompac-ui.minf700.css?v=1.0.1')}}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('auth/assets/css/custom.minf700.css?v=1.0.1')}}">
    <!-- Dark Css -->
    <link rel="stylesheet" href="{{asset('auth/assets/css/dark.minf700.css?v=1.0.1')}}">

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{asset('auth/assets/css/customizer.minf700.css?v=1.0.1')}}" >

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{asset('auth/assets/css/rtl.minf700.css?v=1.0.1')}}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    {{--    @if(Session::has('alert.config'))--}}
    {{--        @if(config('sweetalert.amination.enable'))--}}
    {{--            <link rel="stylesheet" href="{{config('sweetalert.aminatecss')}}">--}}
    {{--        @endif--}}
    {{--        <script src="{{ $cdn?? asset('vendor/sweetalert/sweetalert.all.js')}}"></script>--}}
    {{--        <script>--}}
    {{--            swal.fire({!! Session::pull('alert.config') !!});--}}
    {{--        </script>--}}
    {{--    @endif--}}
</head>

<body class=" ">
<style>
    .subscribe {
        position: relative;
        padding: 20px;
        background-color: #FFF;
        border-radius: 4px;
        color: #333;
        box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
    }

    .subscribe:after {
        position: absolute;
        content: "";
        right: -10px;
        bottom: 18px;
        width: 0;
        height: 0;
        border-left: 0px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 10px solid #0e8006;
    }

    .subscribe p {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 4px;
        line-height: 28px;
    }



    .subscribe .submit-btn {
        position: absolute;
        border-radius: 30px;
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
        background-color: #0e8006;
        color: #FFF;
        padding: 12px 25px;
        display: inline-block;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 5px;
        right: -10px;
        bottom: -20px;
        cursor: pointer;
        transition: all .25s ease;
        box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
    }

    .subscribe .submit-btn:hover {
        background-color: #0e8006;
        box-shadow: -5px 6px 20px 0px rgba(88, 88, 88, 0.569);
    }
    button {
        padding: 20px 30px;
        font-size: 1.5em;
        /*width:200px;*/
        cursor: pointer;
        border: 0px;
        position: relative;
        /*margin: 20px;*/
        transition: all .25s ease;
        /*background: rgba(116, 23, 231, 1);*/
        color: #fff;
        overflow: hidden;
        /*border-radius: 10px*/
    }

    .load {
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: inherit
    }

    .load::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        border: 3px solid #fff;
        width: 30px;
        height: 30px;
        border-left: 3px solid transparent;
        border-bottom: 3px solid transparent;
        animation: loading1 1s ease infinite;
        z-index: 10
    }

    .load::before {
        content: '';
        position: absolute;
        border-radius: 50%;
        border: 3px dashed #fff;
        width: 30px;
        height: 30px;
        border-left: 3px solid transparent;
        border-bottom: 3px solid transparent;
        animation: loading1 2s linear infinite;
        z-index: 5
    }

    @keyframes loading1 {
        0% {
            transform: rotate(0deg)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    button.active {
        transform: scale(.85)
    }

    button.activeLoading .loading {
        visibility: visible;
        opacity: 1
    }

    button .loading {
        opacity: 0;
        visibility: hidden
    }
</style>

<!-- loader Start -->
<div id="loading">
    <div class="loader simple-loader">
        <div class="loader-body ">
            <img width="100" src="{{asset('efe1.png')}}" alt="loader" class="image-loader img-fluid ">
        </div>
    </div>
</div>
@include('sweetalert::alert')

<!-- loader END -->
<div class="wrapper">
    <section class="login-content overflow-hidden">
        <div class="row no-gutters align-items-center bg-white">
            <div class="col-md-12 col-lg-6 align-self-center">
                <a href="/login" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
                    <div class="logo-normal">
                        <img width="100" src="{{asset('efe.png')}}" alt=""/>
                    </div>
                    {{--                    <h2 class="logo-title ms-3 mb-0">EFE MOBILE MONEY</h2>--}}
                </a>
                <div class="row justify-content-center pt-5">
                    <div class="col-md-9">
                        <div class="card  d-flex justify-content-center mb-0 auth-card iq-auth-form">
                            <div class="card-body">
                                <h2 class="mb-2 text-center">Sign In</h2>
                                <p class="text-center">Login to Admin  Dashboard.</p>

                                {{--                                <x-validation-errors class="alert alert-danger" />--}}

                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('admin/log') }}">
                                    @csrf

                                    <div class="row subscribe">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="xyz@example.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="xxxx">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-between">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="submit-btn btn-primary">Sign In <span class="load loading"></span></button>
                                    </div>
                                    <br/>
                                    <script>
                                        const btns = document.querySelectorAll('button');
                                        btns.forEach((items)=>{
                                            items.addEventListener('click',(evt)=>{
                                                evt.target.classList.add('activeLoading');
                                            })
                                        })

                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-lg-block d-none bg-black  p-0  overflow-hidden">
                <img width="100" src="{{asset('bab.png')}}" class="img-fluid gradient-main" alt="images" loading="lazy" >
            </div>
        </div>
    </section>
</div>
<!-- Library Bundle Script -->
<script src="{{asset('auth/assets/js/core/libs.min.js')}}"></script>
<!-- Plugin Scripts -->









<!-- Slider-tab Script -->
<script src="{{asset('auth/assets/js/plugins/slider-tabs.js')}}"></script>





<!-- Lodash Utility -->
<script src="{{asset('auth/assets/vendor/lodash/lodash.min.js')}}"></script>
<!-- Utilities Functions -->
<script src="{{asset('auth/assets/js/iqonic-script/utility.min.js')}}"></script>
<!-- Settings Script -->
<script src="{{asset('auth/assets/js/iqonic-script/setting.min.js')}}"></script>
<!-- Settings Init Script -->
<script src="{{asset('auth/assets/js/setting-init.js')}}"></script>
<!-- External Library Bundle Script -->
<script src="{{asset('auth/assets/js/core/external.min.js')}}"></script>
<!-- Widgetchart Script -->
<script src="{{asset('auth/assets/js/charts/widgetchartsf700.js?v=1.0.1')}}" defer></script>
<!-- Dashboard Script -->
<script src="{{asset('auth/assets/js/charts/dashboardf700.js?v=1.0.1')}}" defer></script>
<!-- qompacui Script -->
<script src="{{asset('auth/assets/js/qompac-uif700.js?v=1.0.1')}}" defer></script>
<script src="{{asset('auth/assets/js/sidebarf700.js?v=1.0.1')}}" defer></script>

</body>


