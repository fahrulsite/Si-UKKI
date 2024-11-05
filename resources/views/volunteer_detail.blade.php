<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $volunteer->title }}</title>
    <link rel=icon href="assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/vendor.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/color.css">
    <style>
        .thumbnail {
            width: 770px;
            height: 450px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="body-overlay" id="body-overlay"></div>

    <x-navbar></x-navbar>

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url('/assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb- text-center">
                    <h2 class="page-title">{{ $volunteer->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- course-single area start -->
    <div class="course-single-area pd-top-80 pd-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-12">
                    <div class="event-detaila-inner">
                        <div class="thumb mb-2">
                        <img src="{{asset('storage/' . $volunteer->image) }}" alt="img">
                        </div>
                        <p>{!! $volunteer->body !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                    <div class="td-sidebar">
                        <a href="http://{{$volunteer->url}} ">
                            <div class="widget widget_url text-center">
                                <h4 class="widget-title text-white">Link Pendaftaran</h4>
                            </div>
                        </a>
                        
                        <div class="widget widget_event">
                            <h4 class="widget-title text-blue">Info Kepanitiaan:</h4>
                            <ul>
                                                                <br>
                                <h4 class="widget-title text-blue">Category :</h4>
                                @foreach($volunteerCategories as $category)
                                    <li><i>-</i> {{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    
                        
                        <div class="widget widget_event text-center">
                            <h4 class="widget-title text-blue">Organized By :</h4>
                            <ul>
                                <div class="col-lg-12 order-lg-12">
                                    <div class="event-detaila-inner text-center"> <!-- Added Flexbox classes -->
                                        <div class="thumb mb-1 ">
                                            <img src="{{ asset('/storage/' . $volunteer->user->profile_picture) }}" alt="img" class="img-fluid"> <!-- Added img-fluid for responsiveness -->
                                        </div>
                                    </div>
                                </div>
                                
                            </ul>
                            <br>
                            <h5 class="text-blue"><a href="http://instagram.com/{{ $volunteer->user->instagram }}">{{ $volunteer->user->name }}</a></h5>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course-single area end -->

    <x-footer></x-footer>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="assets/js/vendor.js"></script>
    <!-- main js  -->
    <script src="assets/js/main.js"></script>
</body>

</html>