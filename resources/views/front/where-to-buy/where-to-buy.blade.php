@include('layouts.header')


<!--===Page Title start===-->
<div class="int_about_page_title">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                <div class="int_bread_crumbs">
                    <h1>Where to buy</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                <div class="int_home_crumbs">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home // </a><span> Where to buy</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===Page Title End===-->
<!--===Start About us page About Section===-->
<div class="int_blog_wrapper int_download int_buy">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Branch City</label>
                    <select class="form-control">
                        <option>Select Branch City</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control">
                        <option>Select Branch</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="blog_box_wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/buy-logo.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/buy-logo.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/buy-logo.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog_box">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('front/images/buy-logo.png')}}" class="img-fluid" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
