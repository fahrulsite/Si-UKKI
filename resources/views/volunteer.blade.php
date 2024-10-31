<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kepanitiaan - SKI UKKI UNY</title>
    <link rel=icon href="assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/vendor.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <style>
        .thumbnail {
            width: 770px;
            height: 450px;
            object-fit: cover;
        }
    </style>

</head>

<body>

    

    <!-- search popup start-->
    <div class="td-search-popup" id="td-search-popup">
        <form action="index.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- search popup end-->
    <div class="body-overlay" id="body-overlay"></div>

   <x-navbar></x-navbar>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url('assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title"> Kategori Kepanitiaan </h2>
                    <div class="page-list  mb-0 text-center">
                            <div class="widget widget_tags mb-10">
                                <div class="tagcloud">
                                        @foreach($categories as $category)
                                            <!-- <a href="{{ route('event.category', $category->slug) }}">{{ $category->name }}</a> -->
                                            <a href="{{ route('volunteer.category', $category->slug) }}" class="{{ isset($currentCategorySlug) && $currentCategorySlug == $category->slug ? '' : 'not_active' }}">
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

    <!-- event area start -->
    <div class="blog-area pd-top-100 pd-bottom-120">
        
        <div class="container">
            
            <div class="row">
            
                @if($volunteers->isEmpty())
                    <p>Mohon Maaf tidak ada kepanitaan di dalam kategory</p>
                @else
                    @foreach($volunteers as $volunteer)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-inner style-border">
                            <div class="thumb">
                                <img src="{{asset('storage/' . $volunteer->image) }}" alt="img">
                            </div>
                            <div class="details">
                                <ul class="blog-meta">
                                <li><i class="fa fa-user"></i>{{ $volunteer->user->name}}</li>
                                    <li><i class="fa fa-calendar-check-o"></i>{{ $volunteer->created_at->format('M d, Y') }}</li>
                                </ul>
                                <h5 class="title"><a href="{{ route('volunteer.show', $volunteer->slug) }}">{{ $volunteer->title }}</a></h5>
                                <p>{{ Str::limit(strip_tags($volunteer->body), 100) }}</p>
                                <a class="read-more-text">READ MORE <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                
                
                <div class="col-12 text-center">
                <nav class="td-page-navigation">
                    {{ $volunteers->links('vendor.pagination.custom') }}    
                </nav>
            </div>
            </div>
        </div>
    </div>
    <!-- event area end -->

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