@include('layouts.header')
<!--===Start Revolution Slider===-->
<div class="int_banner_slider">
  <div class="banner_box_wrapper">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 align-self-center">
          <div class="main_contentblock">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="swiper_imgbox imgbox1">
                    <div class="swipper_img">
                      <h4>Serenity of nature</h4>
                      <h2>Innovative</h2>
                      <h3>exterior protection</h3>
                      <p>Airolam is a young and growing company with commendable 12+
                        years of experience in the laminates industry.</p>
                      <a href="#" class="int_btn">View Products <span
                          class="btn_caret"><i
                            class="fas fa-caret-right"></i></span></a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="swiper_imgbox imgbox2">
                    <div class="swipper_img">
                      <h4>Serenity of nature</h4>
                      <h2>Innovative</h2>
                      <h3>exterior protection</h3>
                      <p>Airolam is a young and growing company with commendable 12+
                        years of experience in the laminates industry.</p>
                      <a href="#" class="int_btn">View Products <span
                          class="btn_caret"><i
                            class="fas fa-caret-right"></i></span></a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-7 align-self-center pr-0">
          <!--=== Swiper ===-->
          <div class="main_imgblock">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="swiper_contbox">
                    <div class="swipper_conntent">
                      <img src="{{ asset('front/images/slider1.jpg')}}" class="img-fluid"
                        alt="images" />
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="swiper_contbox">
                    <div class="swipper_conntent">
                      <img src="{{ asset('front/images/slider1.jpg')}}" class="img-fluid"
                        alt="images" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--=== Add Arrows ===-->
      <div class="banner_navi">
        <div class="swiper-button-next">Next</div>
        <div class="swiper-button-prev">Prev</div>
      </div>
    </div>
  </div>

</div>
<!--===End Revolution Slider===-->

</div>
<!--=== End content ===-->

<!--===Start Service Section===-->
<div class="int_service_wrapper">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="int_heading">
        <h4>Our Products</h4>
        <h2>Our Latest Collections</h2>
      </div>
    </div>
  </div>
  <div class="service_box_wrapper">
    <div class="row no-gutters">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="#">
          <div class="service_box serivce_first">
            <div class="service_img">
              <img src="{{ asset('front/images/product1.jpg')}}" class="img-fluid" alt="images" />
            </div>
            <div class="service_content">
              <h4>Laminate</h4>
              <p>Dolore magna aliqua Ut enim ad minim veniam, quis nostrud</p>
            </div>
            <div class="service_designation">
              <h2>Laminate</h2>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="#">
          <div class="service_box serivce_second">
            <div class="service_img">
              <img src="{{ asset('front/images/product2.jpg')}}" class="img-fluid" alt="images" />
            </div>
            <div class="service_content">
              <h4>Plywood</h4>
              <p>Dolore magna aliqua Ut enim ad minim veniam, quis nostrud</p>
            </div>
            <div class="service_designation">
              <h2>Plywood</h2>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="#">
          <div class="service_box serivce_first">
            <div class="service_img">
              <img src="{{ asset('front/images/product3.jpg')}}" class="img-fluid" alt="images" />
            </div>
            <div class="service_content">
              <h4>Panel</h4>
              <p>Dolore magna aliqua Ut enim ad minim veniam, quis nostrud</p>
            </div>
            <div class="service_designation">
              <h2>Panel</h2>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="#">
          <div class="service_box serivce_second">
            <div class="service_img">
              <img src="{{ asset('front/images/product4.jpg')}}" class="img-fluid" alt="images" />
            </div>
            <div class="service_content">
              <h4>Exterior Wall Cladding</h4>
              <p>Dolore magna aliqua Ut enim ad minim veniam, quis nostrud</p>
            </div>
            <div class="service_designation">
              <h2>Exterior Wall Cladding</h2>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
<!--===End Start Service Section===-->



<!--===Start Project Section===-->
<div class="int_project_wrapper">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="int_heading">
        <h4>Photo Gallery</h4>
        <h2>Application</h2>
      </div>
    </div>
  </div>
  <div class="project_box_wrapper">
    <div class="int_project_gallery text-center">
      <div class="gallery_container">
        <div class="gallery_grid row">
          <div class="col-md-6">
            <div class="grid-item">
              <a href="{{ asset('front/images/application1.jpg')}}" class="view">
                <div class="grid_img">
                  <img src="{{ asset('front/images/application1.jpg')}}" alt="project-img">
                </div>
                <div class="bottom_content">
                  <h3>Kitchens</h3>
                </div>
                <div class="grid_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                      d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z" />
                  </svg>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="grid-item">
              <a href="{{ asset('assets/images/application2.jpg')}}" class="view">
                <div class="grid_img">
                  <img src="{{ asset('front/images/application2.jpg')}}" alt="project-img">
                </div>
                <div class="bottom_content">
                  <h3>Bathroom</h3>
                </div>
                <div class="grid_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                      d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z" />
                  </svg>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="grid-item">
              <a href="{{ asset('front/images/application3.jpg')}}" class="view">
                <div class="grid_img">
                  <img src="{{ asset('front/images/application3.jpg')}}" alt="project-img">
                </div>
                <div class="bottom_content">
                  <h3>Interiors</h3>
                </div>
                <div class="grid_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                      d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z" />
                  </svg>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="grid-item design">
              <a href="{{ asset('front/images/application5.jpg')}}" class="view">
                <div class="grid_img">
                  <img src="{{ asset('front/images/application5.jpg')}}" alt="project-img">
                </div>
                <div class="bottom_content">
                  <h3>Furniture</h3>
                </div>
                <div class="grid_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                      d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z" />
                  </svg>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="grid-item">
              <a href="{{ asset('front/images/application2.jpg')}}" class="view">
                <div class="grid_img">
                  <img src="{{ asset('front/images/application2.jpg')}}" alt="project-img">
                </div>
                <div class="bottom_content">
                  <h3>Facades or Exterior</h3>
                </div>
                <div class="grid_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                      d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z" />
                  </svg>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="grid-item">
              <a href="{{ asset('front/images/application4.jpg')}}" class="view">
                <div class="grid_img">
                  <img src="{{ asset('front/images/application4.jpg')}}" alt="project-img">
                </div>
                <div class="bottom_content">
                  <h3>Office</h3>
                </div>
                <div class="grid_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                      d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z" />
                  </svg>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--===End Start Project Section===-->



<div class="int_premium ">
			<div class="container">

				<div class="int_all_service2">
					<div class="row justify-content-center">
						<div class="col-12">
							<div class="int_heading">
								<h2>Tactile Aesthetics</h2>
								<p>More than 60 years of experience in creating the perfect combination between decor, colour, design and texture.
									Thanks to continuous innovation, Arpa’s finishes interpret in a unique way the material dimension of high pressure laminates.
								</p>
									<a href="#" class="int_btn">Discover our premium finishes</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


    <div class="int_pro_finish ">
			<div class="container">
				<div class="int_heading">
					<h2>Products by Finish</h2>
				</div>
				<div class="int_all_service2">
					<div class="row justify-content-center">
						<div class=" col-md-4 col-sm-4 col-6">
							<div class="int_pro_box">
								<div class="int_pro">
									<a href="#"><img src="{{ asset('front/images/int_about02.jpg')}}"></a>
								</div>
								<div class="bottom_content">
									<h4>Stones</h4>
								</div>
							</div>
						</div>
						<div class=" col-md-4 col-sm-4 col-6">
							<div class="int_pro_box">
								<div class="int_pro">
									<a href="#"><img src="{{ asset('front/images/int_about02.jpg')}}"></a>
								</div>
								<div class="bottom_content">
									<h4>Fabric</h4>
								</div>
							</div>
						</div>
						<div class=" col-md-4 col-sm-4 col-6">
							<div class="int_pro_box">
								<div class="int_pro">
									<a href="#"><img src="{{ asset('front/images/int_about02.jpg')}}"></a>
								</div>
								<div class="bottom_content">
									<h4>Wood</h4>
								</div>
							</div>
						</div>
						<div class=" col-md-4 col-sm-4 col-6">
							<div class="int_pro_box">
								<div class="int_pro">
									<a href="#"><img src="{{ asset('front/images/int_about02.jpg')}}"></a>
								</div>
								<div class="bottom_content">
									<h4>Absorbent / Patterns</h4>
								</div>
							</div>
						</div>
						<div class=" col-md-4 col-sm-4 col-6">
							<div class="int_pro_box">
								<div class="int_pro">
									<a href="#"><img src="{{ asset('front/images/int_about02.jpg')}}"></a>
								</div>
								<div class="bottom_content">
									<h4>Plain</h4>
								</div>
							</div>
						</div>
						<div class=" col-md-4 col-sm-4 col-6">
							<div class="int_pro_box">
								<div class="int_pro">
									<a href="#"><img src="{{ asset('front/images/int_about02.jpg')}}"></a>
								</div>
								<div class="bottom_content">
									<h4>Pastels</h4>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

    <!--===Start About Section===-->
    <div class="int_about_wrapper">
    <div class="container">
      <div class="about_box_wrapper">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 order-last">
            <div class="about_contentbox">
              <div class="about_content">
                <div class="int_heading">
                  <h4>About US</h4>
                  <h2>Why Airolam?</h2>
                </div>
                <p class="about_deatils">Airolam is a young and growing company with commendable 12+
                  years of experience in the laminates industry. Established in 2008, today
                  Airolam and its products reach over 18 countries all around the world. On the
                  domestic front it has 10+ company depots, 100+ authorized distributors and 5000+
                  dealers. </p>
                <p class="about_deatils">Airolam has two state of the art manufacturing facilities
                  dedicated to
                  the production of laminates. With 4 presses, the annual combined capacity of
                  these facilities in 19 million sq. meter in addition, Airolam also boasts of a
                  highly advanced plywood manufacturing facility.</p>
                <a href="#" class="int_btn">Know more <span class="btn_caret"><i
                      class="fas fa-caret-right"></i></span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="about_imgbox">
              <div class="about_img">
                <img src="{{ asset('front/images/int_about01.jpg')}}" class="img-fluid parent_img" alt="image">
                <div class="child_imgbox">
                  <img src="{{ asset('front/images/int_about02.jpg')}}" class="img-fluid child_img"
                    alt="image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!--===End Start About Section===-->


</div>
<!--===End Start Testimonial Section===-->
@if(!empty($certifications))
<div class="int_dark_client_section">
<div class="container">
  <div class="int_heading">
    <h2>Certifications</h2>
  </div>
  <div class="int_client_logo_section_style2">
    <ul>
      @foreach($certifications as $certification)
      <li><img src="{{url('storage/certification/'.$certification->image)}}" class="img-fluid" alt="image"></li>
      @endforeach
    </ul>
  </div>
</div>
</div>
@endif

@include('layouts.footer')
