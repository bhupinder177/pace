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

<div class="int_career">
  <div class="container">
    <div class="int_heading">
      <h2>Current Openings</h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_block">
          <select class="require form_field">
            <option>
              Chooose Location
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form_block">
          <select class="require form_field">
            <option>
              Chooose a Department
            </option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      @if(!empty($career))
      @foreach($career as $c)
      <div class="col-lg-6">
        <div class="careerblock">
          <h3>{{ $c->title }}</h3>
          <p>
            <strong><i class="fas fa-history"></i>Experience:</strong>{{ $c->experience }} Years
          </p>
          <!-- <p>
            <strong><i class="fas fa-map-marker-alt"></i>Location:</strong>Pune
          </p> -->
          <p>
            <strong><i class="far fa-calendar-alt"></i>Posted on:</strong>{{ date("d, M, Y", strtotime($c->created_at))  }}
          </p>
        </div>
      </div>
      @endforeach
      @endif

    </div>
  </div>
</div>
<div class="int_export_form_box">
  <div class="container">
    <div class="int_contact_white_form">
      <h1>Apply Online</h1>
      <h6>You may apply by filling up the form provided herewith OR Mail to hr@airolam.com</h6>
      <form action="{{route('send.career')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
        @csrf
        <div class="row">
          <div class="col-md-6">
              <div class="form_block">
                  <input type="text" placeholder="First Name" name="full_name" id="full_name" class="require form_field" />
              </div>
          </div>
          <div class="col-md-6">
              <div class="form_block">
                  <input type="text" placeholder="Last Name" name="last_name" id="last_name" class="require form_field" />
              </div>
          </div>
          <div class="col-md-6">
              <div class="form_block">
                  <input type="text" placeholder="Email Address" name="email" id="email" class="require form_field" data-valid="email" data-error="Email should be valid." />
              </div>
          </div>
          <div class="col-md-6">
            <div class="form_block">
              <input type="text" placeholder="Phone Number" name="phone" id="phone" class="require form_field" data-valid="phone"  >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form_block">
              <input type="text" placeholder="Location Preferred" id="location" name="location"  class="require form_field">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form_block">
              <input type="text" placeholder="Qualification" id="Qualification" name="qualification" class="require form_field">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form_block">
              <select class="require form_field" id="post" name="post">
                <option value="">Post Applied For</option>
                <option value="Project Manager">Project Engineer</option>
                <option value="HR/Admin">HR/Admin</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form_block">
              <select name="experience" id="experience" class="require form_field">
                <option value="">Work Experience</option>
                <option value="0 to 2 years">0 to 2 Years</option>
                <option value="2 to 3 years">2 to 3 Years</option>
                <option value="3 to 4 years">3 to 4 Years</option>
                <option value="4 to 5 years">4 to 5 Years</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form_block">
              <input type="text" id="ctc" name="ctc" placeholder="Current CTC(per month)" class="require form_field">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form_block">
              <input type="text" id="expectedCtc" name="expectedCtc" placeholder="Expected CTC(per month)" class="require form_field">
            </div>
          </div>
        </div>
        <button type="submit" class="int_btn int_btn_two submitForm">Submit</button>
        <div class="response"></div>
      </form>
    </div>
  </div>
</div>
<!--===End About us page About Section===-->
@include('layouts.footer')
