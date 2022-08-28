@include('layouts.header')
<!--===Page Title start===-->
<div class="int_about_page_title">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_bread_crumbs">
          <h1>Media Center</h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_home_crumbs">
          <ul>
            <li><a href="{{URL::to('/')}}">Home // </a><span> Media Center</span></li>
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
          <h2>Media Center</h2>
        </div>
      </div>
    </div>
    <div class="blog_box_wrapper">
      <div class="row">
        @if($media)
        @foreach($media as $m)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="blog_box">
            <div class="blog_img">
              <a href="#">
                <img src="{{url('storage/media/'.$m->image)}}" class="img-fluid" alt="image">
              </a>
            </div>
            <span class="blog_date">{{ date("d, M, Y", strtotime($m->created_at))  }}</span>
            <h1><a href="#" class="blog_heading">{{ $m->title }}</a></h1>
          </div>
        </div>
        @endforeach
        @endif


      </div>
    </div>
  </div>
</div>



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
                                <div class="gallery_grid">
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
                                <div class="gallery_grid">
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
