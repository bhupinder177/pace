@include('layouts.header')

<!--===Page Title start===-->
<div class="int_about_page_title">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                <div class="int_bread_crumbs">
                    <h1>Download</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                <div class="int_home_crumbs">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home // </a><span> Download</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===Page Title End===-->

<!--===Start About us page About Section===-->
<div class="int_blog_wrapper int_download">
    <div class="container">
        <div class="blog_box_wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/download1.jpg')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                        <h1><a href="#" class="blog_heading">Airolam Profile</a></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/download2.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                        <h1><a href="#" class="blog_heading">Airolam Master</a></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/Airo-Exterior.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                        <h1><a href="#" class="blog_heading">Airo Xterior</a></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/Classico.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                        <h1><a href="#" class="blog_heading">Classico</a></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/I-Lam.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                        <h1><a href="#" class="blog_heading">iLam</a></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/Airolite-2.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                        <h1><a href="#" class="blog_heading">Airolite</a></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/1.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                        <h1><a href="#" class="blog_heading">iLite</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
