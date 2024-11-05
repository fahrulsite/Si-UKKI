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
    <link rel="stylesheet" href="/assets/css/color.css">

</head>
<body>

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