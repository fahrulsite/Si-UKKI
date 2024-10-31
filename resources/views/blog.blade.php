<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kabar UKKI</title>
    <link rel=icon href="../assets/img/favicon.png" sizes="20x20" type="image/png">

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
                    <h2 class="page-title">Kabar UKKI</h2>
                    <ul class="page-list">
                        @if(isset($categoryModel))
                        <li><a class="active">Category :{{ ucfirst($categoryModel->name) }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog area start -->
    <div class="blog-area pd-top-80 pd-bottom-120">
        <div class="container">
            
            <div class="row">
            @foreach($posts as $post)
            

                @if($posts->isEmpty())
                    <p>No posts available in this category.</p>
                @else
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-inner style-border">
                        <div class="thumb">
                            <img src="{{asset('storage/' . $post->thumbnail) }}" alt="img">
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                            
                            </ul>
                            <ul class="blog-meta">
                            <li><i class="fa fa-user"></i>{{ $post->user->name }}</li>
                            <li><i class="fa fa-calendar-check-o"></i>{{ $post->created_at->format('M d, Y') }}</li>
                            
                            </ul>
                            
                            <h5 class="title"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
                            <p>{{ Str::limit(strip_tags($post->body), 100) }}</p>
                            <a href="{{ route('blog.show', $post->slug) }} class="read-more-text">READ MORE <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                
                <div class="col-12 text-center">
                <nav class="td-page-navigation">
                    {{ $posts->links('vendor.pagination.custom') }}    
                </nav>
            </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->
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
