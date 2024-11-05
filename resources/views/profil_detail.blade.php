<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $profil->title }}</title>
    <link rel=icon href="/assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/vendor.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/color.css">

</head>

<body>
<div class="body-overlay" id="body-overlay"></div>

    <x-navbar></x-navbar>
    <div class="breadcrumb-area bg-overlay" style="background-image:url('/assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">{{ $profil->title }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- blog area start -->
    <div class="team-area pd-top-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-details-page-content">
                        <div class="single-blog-inner">
                            <p>{!! $profil->body !!}</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    
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