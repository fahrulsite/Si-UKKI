<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $event->title }}</title>
    <link rel=icon href="assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/vendor.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/color.css">

</head>

<body>
    <div class="body-overlay" id="body-overlay"></div>

    <x-navbar></x-navbar>

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url('assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb- text-center">
                    <h2 class="page-title">{{ $event->title }}</h2>
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
                        <img src="{{asset('storage/' . $event->image) }}" alt="img">
                        </div>
                        <p>{!! $event->body !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                    <div class="td-sidebar">

                        

                        <div class="widget widget_event">
                            <h4 class="widget-title text-white">Event Info :</h4>
                            <ul>
                                <li><i class="fa fa-calendar"></i>Tanggal Dimulai:  {{ $event->starts_at->format('M d, Y') }}</li>
                                <li><i class="fa fa-clock-o"></i>Jam Dimulai: {{ $event->starts_at->format('H:i') }} WIB</li>
                                <li><i class="fa fa-calendar"></i>Tanggal Selesai: {{ $event->ends_at->format('M d, Y') }}</li>
                                <li><i class="fa fa-clock-o"></i>Jam Selesai: {{ $event->ends_at->format('H:i') }} WIB</li>
                                <br>
                                <h4 class="widget-title text-white">Category :</h4>
                                @foreach($eventCategories as $category)
                                    <li><i>-</i> {{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget widget_event text-center">
                            <h4 class="widget-title text-white">Organized By :</h4>
                            <ul>
                                <div class="col-lg-12 order-lg-12">
                                    <div class="event-detaila-inner text-center"> <!-- Added Flexbox classes -->
                                        <div class="thumb mb-1 ">
                                            <img src="{{ asset('/storage/' . $event->user->profile_picture) }}" alt="img" class="img-fluid"> <!-- Added img-fluid for responsiveness -->
                                        </div>
                                    </div>
                                </div>
                                
                            </ul>
                            <br>
                            <h5 class="text-white"><a href="http://instagram.com/{{ $event->user->instagram }}">{{ $event->user->name }}</a></h5>
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