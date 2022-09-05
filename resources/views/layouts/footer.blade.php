<!--===Start Footer Section===-->
@php
$footerAddress = Helper::getAddress();
@endphp
<div class="int_footer_wrapper">
<div class="container">
  <div class="footer_box_wrapper">
    <div class="row">
      <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="footer_box">
          <div class="int_logo">
            <a href="#"><img src="{{asset('front/images/logo.png')}}" class="img-fluid"
                alt="logo" /></a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="footer_box">
          <div class="footer_hours">
            <img src="{{asset('front/images/Icon material-location-on.svg')}}" />
            <p> {{ $footerAddress->address }}
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="footer_box">
          <div class="footer_hours">
            <img src="{{ asset('front/images/Icon ionic-ios-call.svg')}}" />
            <p>Phone : <a href="tel:+91 2770-240572/73">{{ $footerAddress->phone }}</a> </p>
            <p>Fax : {{ $footerAddress->fax }} </p>
            <p>Mobile : <a href="tel:{{ $footerAddress->mobile }}">{{ $footerAddress->mobile }}</a></p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="footer_box">
          <div class="footer_hours">
            <img src="{{asset('front/images/Icon material-email-1.svg')}}" />
            <a href="mailto:{{ $footerAddress->email }}">{{ $footerAddress->email }}</a>
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
