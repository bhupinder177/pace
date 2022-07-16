@include('layouts.header')
<!--===Page Title start===-->
<div class="int_about_page_title">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_bread_crumbs">
          <h1>Inspiration</h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_home_crumbs">
          <ul>
            <li><a href="{{URL::to('/')}}">Home // </a><span> Inspiration</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===Page Title End===-->

<!--===Start About us page About Section===-->
    <div class="int_blog_wrapper int_blog_box_style2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="int_heading">
          <h4>Recent News</h4>
          <h2>Latest Trends</h2>
        </div>
      </div>
    </div>
    <div class="blog_box_wrapper">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="blog_box">
            <div class="blog_img">
              <a href="#">
                <img src="{{ asset('front//images/news1.jpg')}}" class="img-fluid" alt="image">
              </a>
            </div>
            <span class="blog_date">29, july 2022</span>
            <h1><a href="#" class="blog_heading">Capturing the Essence of Home in Ultra Modern Living</a></h1>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="blog_box">
            <div class="blog_img">
              <a href="#">
              <img src="{{ asset('front/images/news2.jpg')}}" class="img-fluid" alt="image">
              </a>
            </div>
            <span class="blog_date">29, july 2022</span>
            <h1><a href="#" class="blog_heading">The World's Tallest Wooden Sky scraper for Vancouver</a></h1>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="blog_box">
            <div class="blog_img">
              <a href="#">
              <img src="{{ asset('front/images/news3.jpg')}}" class="img-fluid" alt="image">
              </a>
            </div>
            <span class="blog_date">29, july 2022</span>
            <h1><a href="#" class="blog_heading">Historic Courtyards and Gardens in Quito Tower</a></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--===Start Portfolio Gallery Section===-->
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
                                        <svg xmlns="http:/www.w3.org/2000/svg" width="100px" height="100px">
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
<!--======End Portfolio Gallery Section======-->

<!--===Start Index4 Categories Section===-->
<div class="swiper-slide int_vertical_slider">
<div class="swiper_box">
    <div class="int_categories_style3 int_gallery_style5 parallax_vertical_slide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="int_heading_style3">
                        <h4>OUR PROJECT</h4>
                        <h2>Project Spotlight</h2>
                    </div>
                </div>
            </div>
            <div class="project_box_wrapper int_categories_box_section">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="int_project_gallery">
                            <div class="gallery_container">
                                <div class="gallery_grid gallery_grid1">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big01.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini01.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="int_project_gallery gallery_five_mg">
                            <div class="gallery_container">
                                <div class="gallery_grid gallery_grid1">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big05.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini05.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="int_project_gallery gallery_five_mg">
                            <div class="gallery_container">
                                <div class="gallery_grid">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big09.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini09.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="int_project_gallery">
                            <div class="gallery_container">
                                <div class="gallery_grid">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big02.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini02.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="int_project_gallery gallery_five_mg">
                            <div class="gallery_container">
                                <div class="gallery_grid">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big06.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini06.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="int_project_gallery">
                            <div class="gallery_container">
                                <div class="gallery_grid">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big03.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini03.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="int_project_gallery gallery_five_mg">
                            <div class="gallery_container">
                                <div class="gallery_grid">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big07.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini07.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="int_project_gallery gallery_five_mg">
                            <div class="gallery_container">
                                <div class="gallery_grid">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big10.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini10.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="int_project_gallery">
                            <div class="gallery_container">
                                <div class="gallery_grid">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big04.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini04.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="int_project_gallery gallery_five_mg">
                            <div class="gallery_container">
                                <div class="gallery_grid">
                                    <div class="grid-item">
                                        <a href="{{ asset('front/images/gallery/big08.jpg')}}" class="view">
                                            <div class="grid_img">
                                                <img src="{{ asset('front/images/gallery/mini08.jpg')}}" alt="project-img">
                                            </div>
                                            <div class="grid_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M100.000,51.000 L51.000,51.000 L51.000,100.000 L49.000,100.000 L49.000,51.000 L-0.000,51.000 L-0.000,49.000 L49.000,49.000 L49.000,-0.000 L51.000,-0.000 L51.000,49.000 L100.000,49.000 L100.000,51.000 Z"/>
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
    </div>
    </div>
</div>
<!--===End Index4 Categorie Section===-->

@include('layouts.footer')
