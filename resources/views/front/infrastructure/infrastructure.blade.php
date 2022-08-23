@include('layouts.header')
<!--===Start Revolution Slider===-->
<!--===Page Title start===-->
<div class="int_about_page_title">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_bread_crumbs">
          <h1>Infrastructure</h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
        <div class="int_home_crumbs">
          <ul>
            <li><a href="{{URL::to('/')}}">Home // </a><span> Infrastructure</span></li>
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
              <p class="about_deatils">Airolam limited is located at a convenient distance of 70
                km from Ahmedabad. State –of-the art infrastructure, equipped with a complete
                range of ultra modern and latest machinery procured from Germany ensures a
                cutting edge quality with contemporary designs in the products.</p>
              <p class="about_deatils">
                The products are manufactured according to the Global Standards meeting the high
                expectations of Indian as well as overseas market. Adding to that, dry weather
                conditions of Ahmedabad, proximity to major vendors of raw material and 10 acres
                of waste land greatly favours the manufacturing of seasoned laminates. With
                these advantages, the company looks forward to step in international market with
                an elan seeking to carve a trustworthy position for itself. The company has an
                enviable annual production capacity of 1.5 million sheets.
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
    <div class="int_all_service2">
      <div class="int_service_box2">
        <div class="">
          <img src="{{ asset('front/images/mission.jpg')}}" class="img-fluid w-100" alt="images" />
        </div>
        <p>With ISO 9001:2000 certification and German technology, Airolam has the ability to deliver
          both quantity and quality with a zero-tolerance approach towards errors. Airolam is now
          fully geared to roll out the near perfect laminate, one which is free of smudges, crinkles,
          peel-offs and other anomalies.</p>
        <p>
          Airolam believes a good foundation for manufacturing always translates into the character of
          the products. And Airolam has developed a state-of-the-art manufacturing facility in
          Gujarat, which is equipped with all modern machinery. This manufacturing plant is a modern
          marvel, when it comes to the machinery and systems installed here. From pre-production
          processes, production and post-production quality control is carried out at this facility in
          the best manner possible under the watchful eyes of Airolam’s quality control team. The
          facility has also been developed in line with Airolam’s commitment to being an
          environmentally conscious company and it has systems in place to minimize its carbon
          footprint.</p>
        <p>

          Export Network – Airolam’s magic has not been restricted to India, as it has spread its
          roots to different parts of the globe. Airolam has created an extensive and far-reaching
          dealer network that makes sure timely delivery to the various countries it caters to. The
          dealer network has been streamlined to deliver Airolam’s exquisite products in a very safe
          manner, without damaging its integrity or beauty. At present this dealer network has allowed
          Airolam to penetrate the markets of 16+ countries such as Singapore, Malaysia, U.S.A., U.K.,
          Kuwait, Bangladesh, Saudi Arabia, Sri Lanka, Thailand, Qatar, U.A.E., Syria, Iran, Egypt,
          Nepal & Vietnam.</p>
      </div>
    </div>
  </div>
</div>
<!--===Index2 About us page Service Section end===-->
@include('layouts.footer')
