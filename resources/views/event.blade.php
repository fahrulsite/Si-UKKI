<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event - SKI UKKI UNY</title>
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
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title"> Kategori Event</h2>
                    <div class="page-list  mb-0 text-center">
                            <div class="widget widget_tags mb-10">
                                <div class="tagcloud">
                                        @foreach($categories as $category)
                                            <!-- <a href="{{ route('event.category', $category->slug) }}">{{ $category->name }}</a> -->
                                            <a href="{{ route('event.category', $category->slug) }}" class="{{ isset($currentCategorySlug) && $currentCategorySlug == $category->slug ? 'active' : '' }}">
                                                {{ $category->name }}
                                                </a>
                                        @endforeach
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

   <!--blog-area start-->
   <div class="blog-area pd-top-120 pd-bottom-90">
        <div class="container">
            @if($events->isEmpty())
                <p>Mohon maaf tidak ada event yang sesuai</p>
            @else
                
                <div class="row justify-content-center">
                    @foreach($events as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-inner">
                            <div class="thumb">
                                <img src="{{asset('storage/' . $event->image) }}" alt="img">
                                <span class="date">{{$event->starts_at->format('M d, Y')}}</span>
                            </div>
                            <div class="details">
                                <ul class="blog-meta">
                                    <li><i class="fa fa-user"></i>{{ $event->user->name }}</li>
                                </ul>
                                <h5><a href="{{ route('event.show', $event->slug) }}">{{ $event->title }}</a></h5>
                                <a class="read-more-text" href="{{ route('event.show', $event->slug) }}">READ MORE <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach    
                </div>
                
            @endif
            <div class="col-12 text-center">
                <nav class="td-page-navigation">
                    {{ $events->links('vendor.pagination.custom') }}    
                </nav>
            </div>
        </div>
    </div>
    <!--blog-area end-->

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