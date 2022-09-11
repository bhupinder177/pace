		<!DOCTYPE html>
		<html lang="en">

		<head>
			<!--=== Required meta tags ===-->
			<meta charset="utf-8">
			<meta content="width=device-width, initial-scale=1.0" name="viewport">
			<meta name="description" content="">
			<meta name="keywords" content="">
			<meta name="author" content="">
			<meta name="MobileOptimized" content="320">

			<!--=== custom css ===-->
			<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css')}}">
			<link rel="stylesheet" href="{{ asset('front/css/font.css')}}">
			<link rel="stylesheet" href="{{ asset('front/css/bootstrap-datepicker.min.css')}}">
			<link rel="stylesheet" href="{{ asset('front/css/fontawesome.min.css')}}">
			<link rel="stylesheet" href="{{ asset('front/css/swiper.min.css')}}">
			<link rel="stylesheet" href="{{ asset('front/css/animate.css')}}">
			<link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{ asset('admin/css/jquery.toast.css') }}">
			<link rel="stylesheet" href="{{ asset('front/css/style.css')}}">
			<link rel="shortcut icon" type="image/ico" href="{{ asset('front/images/fav.jpg')}}" />
			<!--=== custom css ===-->
			<title>Airolam</title>
		</head>

		<body>
			<div class="loader_panel" style="display: none;">
			    <img src="{{ asset('admin/images/preloader.gif') }}">
		  	</div>
				<div class="search_input_box">

					<input type="text" placeholder="Search here..." />

					<span><i class="fas fa-times"></i></span>

				</div>

				<!--=== start Main wraapper ===-->

				<div class="int_main_wraapper">

					<div class="int_infosidebar int_infosidebar_style2">

						<div class="siderbar_social">

							<ul>

								<li><a href="https://www.facebook.com/AirolamOfficial/" target="_blank"><i
											class="fab fa-facebook-f"></i></a></li>

								<li><a href="https://www.instagram.com/airolamlaminates/?hl=en"><i class="fab fa-instagram"></i></a>
								</li>

								<li><a href="https://twitter.com/airolamlaminate"><i class="fab fa-twitter"></i></a></li>

								<li><a href="https://in.linkedin.com/company/airolam-laminates"><i class="fab fa-linkedin"></i></a>
								</li>

								<li><a href="tel:+91 99099 54411"><i class="fa fa-phone-alt"></i></a></li>

								<li><a href="mailto:marketing@airolam.com"><i class="fa fa-envelope"></i></a></li>

							</ul>

						</div>

					</div>

					<div class="int_content_wraapper int_content_left">

						<div class="int_header_wrapper int_header_style2">

							<div class="container-fluid">

								<div class="row">

									<div class="col-lg-3 col-md-4 col-sm-4 col-12">

										<div class="int_logo">

											<a href="{{URL::to('/')}}"><img src="{{asset('front/images/logo.png')}}" class="img-fluid"
													alt="logo" /></a>

										</div>

									</div>

									<div class="col-lg-9 col-md-8 col-sm-8 col-12">

										<div class="int_nav">

											<div class="int_menu">

												<span class="close_menu_int">

													<svg xmlns="http://www.w3.org/2000/svg" width="9px" height="8px">

														<defs>

															<filter>

																<feFlood flood-color="rgb(255, 255, 255)" flood-opacity="1"
																	result="floodOut"></feFlood>

																<feComposite operator="atop" in="floodOut" in2="SourceGraphic"
																	result="compOut"></feComposite>

																<feBlend mode="normal" in="compOut" in2="SourceGraphic"></feBlend>

															</filter>



														</defs>

														<g>

															<path fill-rule="evenodd" fill="#ffffff"
																d="M4.713,3.998 L7.864,0.850 C8.060,0.654 8.060,0.337 7.864,0.142 C7.668,-0.054 7.351,-0.054 7.155,0.142 L4.005,3.290 L0.854,0.142 C0.659,-0.054 0.342,-0.054 0.146,0.142 C-0.050,0.337 -0.050,0.654 0.146,0.850 L3.296,3.998 L0.146,7.146 C-0.050,7.341 -0.050,7.658 0.146,7.854 C0.244,7.952 0.372,8.001 0.500,8.001 C0.628,8.001 0.756,7.952 0.854,7.854 L4.005,4.706 L7.155,7.854 C7.253,7.952 7.381,8.001 7.510,8.001 C7.638,8.001 7.766,7.952 7.864,7.854 C8.060,7.658 8.060,7.341 7.864,7.146 L4.713,3.998 Z">

															</path>

														</g>

													</svg>

												</span>

												<ul>

													<li><a href="{{URL::to('/')}}">Home</a></li>

													<li class="int_home_dropdown"><a href="javascript:;">About us<i
																class="fas fa-caret-down toggle_caret"></i></a>

														<ul>
															<li><a href="{{URL::to('/infrastructure')}}">Infrastructure</a></li>


															<li><a href="{{URL::to('/about-us')}}">Directors</a></li>



															<li><a href="#">CSR</a></li>

														</ul>

													</li>
													<li><a href="{{URL::to('/investors')}}">Investors</a></li>
													<li class="int_home_dropdown">
											<a href="#">Sectors<i class="fas fa-caret-down toggle_caret"></i></a>
											<ul>
												<li><a href="{{URL::to('/healthcare')}}">Healthcare</a></li>
												<li><a href="#">Hospitality</a></li>
												<li><a href="#">Retail</a></li>
												<li><a href="#">Education</a></li>
												<li><a href="#">Commercial</a></li>
												<li><a href="#">Residences</a></li>
											</ul>
										</li>

													<li class="int_home_dropdown megamenu"><a href="#">Products<i
																class="fas fa-caret-down toggle_caret"></i></a>

														<ul class="sub-menu">

															<li>

																<div class="sub-menu-item">

																	<a href="#" class="ProductLink">

																		<img src="https://www.merinolaminates.com/wp-content/uploads/2020/01/Laminates_small.jpg"
																			class="NavThumbnail" alt="Kitchen Pannels">

																		<h3>Laminates</h3>

																	</a>

																	<ol>

																		<li>

																			<a href="product-listing.html">Airolam </a>

																		</li>

																		<li>

																			<a href="product-listing.html">Airolite </a>

																		</li>

																		<li>

																			<a href="product-listing.html">I Lam </a>

																		</li>

																		<li>

																			<a href="product-listing.html">I Lite </a>

																		</li>

																	</ol>

																</div>

															</li>

															<li>

																<div class="sub-menu-item">

																	<a href="#" class="ProductLink">

																		<img src="https://www.merinolaminates.com/wp-content/uploads/2020/01/Laminates_small.jpg"
																			class="NavThumbnail" alt="Kitchen Pannels">

																		<h3>Compact Laminates</h3>

																	</a>

																	<ol>

																		<li>

																			<a href="product-listing.html">Airo Exterior </a>

																		</li>

																		<li>

																			<a href="product-listing.html">Internal Wall Cladding
																			</a>

																		</li>

																	</ol>

																</div>

															</li>

															<li>

																<div class="sub-menu-item">

																	<a href="#" class="ProductLink">

																		<img src="https://www.merinolaminates.com/wp-content/uploads/2020/01/Laminates_small.jpg"
																			class="NavThumbnail" alt="Kitchen Pannels">

																		<h3>Speciality Laminates</h3>

																	</a>

																	<ol>

																		<li>

																			<a href="product-listing.html">Cholkal Grade </a>

																		</li>

																		<li>

																			<a href="product-listing.html">Maker Grade</a>

																		</li>

																		<li>

																			<a href="product-listing.html">Duragloss Pro </a>

																		</li>

																		<li>

																			<a href="product-listing.html">Color Core </a>

																		</li>

																		<li>

																			<a href="product-listing.html">AFPL </a>

																		</li>

																		<li>

																			<a href="product-listing.html">Airo Digital </a>

																		</li>

																		<li>

																			<a href="product-listing.html">Luce</a>

																		</li>

																	</ol>

																</div>

															</li>

															<li>

																<div class="sub-menu-item">

																	<a href="#" class="ProductLink">

																		<img src="https://www.merinolaminates.com/wp-content/uploads/2020/01/Laminates_small.jpg"
																			class="NavThumbnail" alt="Kitchen Pannels">

																		<h3>Performance Laminates</h3>

																	</a>

																	<ol>

																		<li>

																			<a href="product-listing.html">Electrostatic
																				Dissipatine</a>

																		</li>

																		<li>

																			<a href="product-listing.html">Fire Retardant</a>

																		</li>

																		<li>

																			<a href="product-listing.html">Chemical Resistant</a>

																		</li>

																		<li>

																			<a href="product-listing.html">Magnetic Laminates</a>

																		</li>

																	</ol>

																</div>

															</li>

															<li>

																<div class="sub-menu-item">

																	<a href="#" class="ProductLink">

																		<img src="https://www.merinolaminates.com/wp-content/uploads/2020/01/Laminates_small.jpg"
																			class="NavThumbnail" alt="Kitchen Pannels">

																		<h3>Plywood</h3>

																	</a>

																	<ol>

																		<li>

																			<a href="product-listing.html">Airoply Silver IS 303
																			</a>

																		</li>

																		<li>

																			<a href="product-listing.html">Airoply Silver IS 710
																			</a>

																		</li>

																		<li>

																			<a href="product-listing.html">Airoply Gold IS 303 </a>

																		</li>

																		<li>

																			<a href="product-listing.html">Airoply Gold IS 710</a>

																		</li>

																		<li>

																			<a href="product-listing.html">Airoply Royal Ultra IS
																				710 </a>

																		</li>

																		<li>

																			<a href="product-listing.html">Airoply Royal Red IS 710
																			</a>

																		</li>

																	</ol>

																</div>

															</li>

															<li>

																<div class="sub-menu-item">

																	<a href="#" class="ProductLink">

																		<img src="https://www.merinolaminates.com/wp-content/uploads/2020/01/Laminates_small.jpg"
																			class="NavThumbnail" alt="Kitchen Pannels">

																		<h3>Panel</h3>

																	</a>

																	<ol>

																		<li>

																			<a href="product-listing.html">Airo Glam</a>

																		</li>

																		<li>

																			<a href="product-listing.html">Airo Lami Panel</a>

																		</li>

																	</ol>

																</div>

															</li>

														</ul>



													</li>


													<li><a href="{{URL::to('/export')}}">Export</a></li>

													<li class="int_home_dropdown">
											<a href="#">Resources<i class="fas fa-caret-down toggle_caret"></i></a>
											<ul>
												<li><a href="{{URL::to('/download')}}">Ecatalog</a></li>
												<li><a href="#">Documentation(Tech)</a></li>
												<li><a href="{{URL::to('/media-center')}}">Videos</a></li>
											</ul>
										</li>

													<li class="int_home_dropdown">

														<a href="#">More<i class="fas fa-caret-down toggle_caret"></i></a>

														<ul>





															<li><a href="#">Care & Maintenance</a></li>
															<li><a href="#">Blog</a></li>

															<li><a href="{{URL::to('/careers')}}">Career</a></li>

															<li><a href="{{URL::to('/contact-us')}}">Contact</a></li>


														</ul>

													</li>

												</ul>

											</div>

											<div class="int_cartsec">

												<ul>

													<li><a href="javascript:;" class="open_search_bar">

															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.239 30.239">

																<g>

																	<g>

																		<path
																			d="M20.194,3.46c-4.613-4.613-12.121-4.613-16.734,0c-4.612,4.614-4.612,12.121,0,16.735   c4.108,4.107,10.506,4.547,15.116,1.34c0.097,0.459,0.319,0.897,0.676,1.254l6.718,6.718c0.979,0.977,2.561,0.977,3.535,0   c0.978-0.978,0.978-2.56,0-3.535l-6.718-6.72c-0.355-0.354-0.794-0.577-1.253-0.674C24.743,13.967,24.303,7.57,20.194,3.46z    M18.073,18.074c-3.444,3.444-9.049,3.444-12.492,0c-3.442-3.444-3.442-9.048,0-12.492c3.443-3.443,9.048-3.443,12.492,0   C21.517,9.026,21.517,14.63,18.073,18.074z"
																			data-original="#000000" class="active-path"
																			data-old_color="#000000" fill="currentColor" />

																	</g>

																</g>

															</svg>

														</a>

													</li>

												</ul>

											</div>

											<div class="int_toggle">

												<span></span>

												<span></span>

												<span></span>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>
