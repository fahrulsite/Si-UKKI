<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    <link rel=icon href="/assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/vendor.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">

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

    

    <!-- blog area start -->
    <div class="blog-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-page-content">
                        <div class="single-blog-inner">
                            <div>
                            <img src="{{asset('storage/' . $post->thumbnail) }}" alt="img">
                            </div>
                            <div class="details">
                                <ul class="blog-meta">
                                    <li><i class="fa fa-user"></i>{{ $post->user->name }}</li>
                                    <li><i class="fa fa-calendar-check-o"></i>{{ $post->created_at->format('M d, Y') }}</li>
                                </ul>
                                <h3 class="title">{{ $post->title }}</h3>
                                <p>{!! $post->body !!}</p>
                            </div>
                        </div>
                        <div class="tag-and-share">
                        <div class="row">
                            <div class="widget widget_tags mb-0">
                                <h6>Categories</h6>
                                <div class="tags, tagcloud">
                                    @foreach($post->category_id as $categoryId)
                                        @php
                                            $category = $categories->firstWhere('id', $categoryId);
                                        @endphp
                                        @if($category)
                                            <a class="active">{{ ucfirst($category->name) }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                     </div>

                        
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="td-sidebar">
                        
                        <div class="widget widget-recent-post">
                            <h4 class="widget-title">Kabar UKKI Terbaru</h4>
                            <ul>
                                @foreach($recentPosts as $recentPost)
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ asset('storage/' . $recentPost->thumbnail) }}" alt="blog">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5 class="title"><a href="{{ route('blog.show', $recentPost->slug) }}">{{ $recentPost->title }}</a></h5>
                                            <div class="post-info"><i class="fa fa-calendar"></i><span>{{ $recentPost->created_at->format('M d, Y') }}</span></div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="widget widget_tags mb-0">
                            <h4 class="widget-title">Pilihan Kategori</h4>
                            <div class="tagcloud">
                                @foreach($categories as $category)
                                    <a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->

    <!-- footer area start -->
    <footer class="footer-area bg-gray">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget_contact">
                            <h4 class="widget-title">Contact Us</h4>
                            <ul class="details">
                                <li><i class="fa fa-map-marker"></i> 420 Love Sreet 133/2 Street NewYork</li>
                                <li><i class="fa fa-envelope"></i> info.contact@gmail.com</li>
                                <li><i class="fa fa-phone"></i> 012 345 678 9101</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget_nav_menu">
                            <h4 class="widget-title">Course</h4>
                            <ul>
                                <li><a href="course.html">Branding design</a></li>
                                <li><a href="course.html">Ui/Ux designing </a></li>
                                <li><a href="course.html">Make Elements</a></li>
                                <li><a href="course.html">Business</a></li>
                                <li><a href="course.html">Graphics design</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget_blog_list">
                            <h4 class="widget-title">News & Blog</h4>
                            <ul>
                                <li>
                                    <h6><a href="blog-details.html">Big Ideas Of Business Branding Info.</a></h6>
                                    <span class="date"><i class="fa fa-calendar"></i>December 7, 2021</span>
                                </li>
                                <li>
                                    <h6><a href="blog-details.html">Ui/Ux Ideas Of Business Branding Info.</a></h6>
                                    <span class="date"><i class="fa fa-calendar"></i>December 7, 2021</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget_contact">
                            <h4 class="widget-title">Twitter Feed</h4>
                            <ul class="details">
                                <li>
                                    <i class="fa fa-twitter"></i>
                                    Simply dummy brand <a href="#">https//tweets/c3l.com</a>
                                    <div class="time">9 Hours ago</div>
                                </li>
                                <li>
                                    <i class="fa fa-twitter"></i>
                                    Simply dummy brand <a href="#">https//tweets/c7l.com</a>
                                    <div class="time">9 Hours ago</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 align-self-center">
                        <a href="index.html"><img src="assets/img/footer-logo.png" alt="img"></a>
                    </div>
                    <div class="col-lg-4  col-md-6 order-lg-12 text-md-right align-self-center">
                        <ul class="social-media mt-md-0 mt-3">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 order-lg-8 text-lg-center align-self-center mt-lg-0 mt-3">
                        <p>copyright 2022 by solverwp.com</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

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