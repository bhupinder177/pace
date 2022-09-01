
@include('layouts.header')
<!--===Start Revolution Slider===-->
<!--===Page Title start===-->
<!--===Page Title start===-->
<div class="int_about_page_title">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_bread_crumbs">
          <h1>Export</h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_home_crumbs">
          <ul>
            <li><a href="{{URL::to('/')}}">Home // </a><span> Export</span></li>
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
              <p class="about_deatils">The true stature of a brand is enhanced by its presence in
                different corners of the world. Airolam and its brands are constantly striving
                to expand their reach in the market, not only domestically but also
                internationally.</p>
              <p class="about_deatils">
                Airolam’s magic has not been restricted to India, as it has spread its roots to
                different parts of the globe. Airolam has created an extensive and far-reaching
                dealer network that makes sure timely delivery to the various countries it
                caters to. The dealer network has been streamlined to deliver Airolam’s
                exquisite products in a very safe manner, without damaging its integrity or
                beauty. At present this dealer network has allowed Airolam to penetrate the
                markets of 16+ countries such as Singapore, Malaysia, U.S.A., U.K., Kuwait,
                Bangladesh, Saudi Arabia, Sri Lanka, Thailand, Qatar, U.A.E., Syria, Iran,
                Egypt, Nepal & Vietnam.
              <p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===End About us page About Section===-->

<!--===Index2 About us page Service Section start===-->
<div class="int_aboutus_service_section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="int_all_service2">
          <div class="int_service_box2">
            <div class="">
              <img src="{{ asset('front/images/Global-presence-scaled.jpg')}}" class="img-fluid w-100"
                alt="images" />
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="int_all_service2">
          <div class="int_service_box2">
            <div class="">
              <img src="{{ asset('front/images/Global-presence-01-scaled.jpg')}}" class="img-fluid w-100"
                alt="images" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===Index2 About us page Service Section end===-->
<!--======Start Contact Us Form Section======-->
<div class="int_export_form_box">
    <div class="container">
        <div class="int_contact_white_form">
            <h1>Get In Touch</h1>
            <h6>Please fill out the quick form and we will be in touch with lightening speed.</h6>
            <form action="{{route('send.contact.us')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
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
                            <input type="text" placeholder="Subject" name="subject" id="subject" class="require form_field" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form_block">
                            <textarea placeholder="Message" name="message" id="message" class="require form_field"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="int_btn int_btn_two button-disabled">Submit</button>
                <div class="response"></div>
            </form>
        </div>
    </div>
</div>
<!--======End Contact Us Form Section======-->

<!--===Index2 About us page Service Section end===-->
@include('layouts.footer')
