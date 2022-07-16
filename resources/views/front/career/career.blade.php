@include('layouts.header')

<!--===Page Title start===-->
<div class="int_about_page_title">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_bread_crumbs">
          <h1>Carrier</h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_home_crumbs">
          <ul>
            <li><a href="{{URL::to('/')}}">Home // </a><span> Carrier</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===Page Title End===-->
<!--===Start About us page About Section===-->
<div class="int_about_style2 int_about_section2">
  <div class="container">
    <div class="about_box_wrapper">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 ">
          <div class="about_contentbox">

            <img src="{{ asset('front/images/welcome.jpg')}}" alt="image">


          </div>
        </div>

        <div class="col-lx-6 col-lg-6 col-md-6 ">
          <div class="about_contentbox">
            <div class="about_content">
              <div class="int_heading">
                <h4>About US</h4>
              </div>
              <h2 class="about_head1">Why Airolam?</h2>
              <h5>Elitsed do eiusimod tempor incididunt ut labore et dolore magna aliqua Utnim ad
                minim veniam, quis nostrixercitation ullamco laboris.</h5>
              <p class="about_deatils">Consectetur adipisicing elit Lorem ipsum dolor sit amet,
                consectetur adipisicing elitsed do eiusimod tempor incididunt ut labor e et
                dolore magna aliqua. <u>Ut enimere ad minim veerernireeam qureesgiis
                  nostrixercitation ullamco laboris nisi</u> ut aliquip ex ea commodo
                consequat. Duis aute irure doerlor in repreheinderit tate velit eesse cillum
                dolore eu fugiat nulla parereiatur. Excepteur sint occerewaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim.
              <p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===End About us page About Section===-->
@include('layouts.footer')
