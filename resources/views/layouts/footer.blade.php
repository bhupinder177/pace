<!--===Start Footer Section===-->
@php
$footerAddress = Helper::getAddress();
@endphp
<div class="int_footer_wrapper">
<div class="container">
  <div class="footer_box_wrapper">
    <div class="row">
    						<div class="col-lg-2 col-md-6 col-sm-6 col-12">
    							<div class="footer_box">
    								<h3 class="footer_heading">Useful Links</h3>
    								<div class="footer_linkbox">
    									<ul class="footer_support_link">
    										<li><a href="{{URL::to('/')}}">Home </a></li>
    										<li><a href="{{URL::to('/about-us')}}">About Us</a></li>
    										<li><a href="{{URL::to('/careers')}}">Careers </a></li>
    										<li><a href="{{URL::to('/where-to-buy')}}">Where to buy</a></li>
    										<li><a href="{{URL::to('/contact-us')}}">Contact</a></li>
    									</ul>
    								</div>
    							</div>
    						</div>
    						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
    							<div class="footer_box">
    								<h3 class="footer_heading">Products</h3>
    								<div class="footer_linkbox">
    									<ul class="footer_support_link">
    										<li><a href="{{URL::to('/media-center')}}">Laminates</a></li>
    										<li><a href="{{URL::to('/media-center')}}">Compact Laminates </a></li>
    										<li><a href="{{URL::to('/media-center')}}">Speciality Laminates </a></li>
    										<li><a href="{{URL::to('/media-center')}}">Performance Laminates </a></li>
    										<li><a href="{{URL::to('/media-center')}}">Plywood</a></li>
    										<li><a href="{{URL::to('/media-center')}}">Panel</a></li>
    									</ul>
    								</div>
    							</div>
    						</div>
    						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
    							<div class="footer_box">
    								<h3 class="footer_heading">Contact Info</h3>
    								<div class="footer_hours"> <img src="{{ asset('front/images/Icon ionic-ios-call.svg')}}">
    									<p>Phone : <a href="tel:{{ $footerAddress->phone }}">{{ $footerAddress->phone }}</a> </p>
    									<p>Fax : {{ $footerAddress->fax }} </p>
    									<p>Mobile : <a href="tel:{{ $footerAddress->mobile }}">{{ $footerAddress->mobile }}</a></p>
    								</div>
    								<div class="footer_hours"> <img src="{{asset('front/images/Icon material-email-1.svg')}}"> <a href="mailto:{{ $footerAddress->email }}">{{ $footerAddress->email }}</a> </div>
    							</div>
    						</div>
    						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
    							<div class="footer_box">
    								<h3 class="footer_heading">Subscribe to us</h3>
    								<div class="int_textbox_subscribe4">
    									<div class="int_search_wrapper"> <input type="text" placeholder="Email Address..." id="searchInput"> <a class="index4_btn" id="searchInputBtn"><i class="fa fa-paper-plane"></i></a> </div>
    								</div>
    							</div>
    						</div>
    					</div>

  </div>
</div>
</div>

</div>

<!--===End Footer Section===-->

<!--===Start Bottom Footer Section===-->
<div class="int_bottom_footer_wrapper">
<div class="container">
  <div class="bottom_footer_box_wrapper">
    <p>{{ $footerAddress->copy_right }}</p>
  </div>
</div>
</div>
<!--===Start Bottom Footer Section===-->

<!--=== End Main wraapper ===-->

<!--=== Optional JavaScript ===-->
<script src="{{ asset('front/js/jquery.min.js')}}"></script>
<script src="{{ asset('front/js/popper.min.js')}}"></script>
<script src="{{ asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('front/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('front/js/swiper.min.js')}}"></script>
<script src="{{ asset('front/js/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('front/js/plugin/countto/jquery.appear.js')}}"></script>
<script src="{{ asset('front/js/plugin/countto/jquery.countTo.js')}}"></script>

<script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.toast.js') }}"></script>

<script src="{{ asset('front/js/custom.js')}}"></script>
<!--=== Optional JavaScript ===-->
</body>

</html>
