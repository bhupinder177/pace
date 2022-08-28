@include('layouts.header')
<!--===Page Title start===-->
<div class="int_about_page_title">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                <div class="int_bread_crumbs">
                    <h1>Investor Relations</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                <div class="int_home_crumbs">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home // </a><span> Investor Relations</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===Page Title End===-->

<!--===Start About us page About Section===-->
<div class="int_team_wrapper">
    <div class="container">
        <div class="int_heading">
            <h2>Board of Directors</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="team_box_wrapper text-center">
                    <div class="row">
                      @if(!empty($bob))
                       @foreach($bob as $b)
                        <div class="col-sm-6 col-lg-4">
                            <div class="team_box">
                                <div class="team_content">
                                    <h4><a href="javascript:;">{{ $b->name }}</a></h4>
                                    <p>{{ $b->designation }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="int_team_wrapper bggrey">
    <div class="container">
        <div class="int_heading">
            <h2>Committees of the Board</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="team_box_wrapper text-center">
                    <div class="row">
                      @if(!empty($commitee))
                       @foreach($commitee as $c)
                        <div class="col-sm-6 col-lg-4">
                            <div class="team_box">
                                <div class="team_content">
                                    <h4><a href="javascript:;">{{ $c->name }}</a></h4>
                                    <h5>{{ $c->department }}</h5>
                                    <p>{{ $c->designation}} </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="int_team_wrapper">
    <div class="container">
        <div class="int_heading">
            <h2>Resources</h2>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Shareholding Pattern
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Financial
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Annual Reports
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Announcements
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Notices
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Prospectus
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        Attendance Slip
                    </button>
                </h2>
                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                        Announcements
                    </button>
                </h2>
                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                        Annual Return
                    </button>
                </h2>
                <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                        Corporate Governance Report
                    </button>
                </h2>
                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of 14th AGM</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Notice of Postal Ballot</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="resbox">
                                    <a href="#">
                                        <img src="{{ asset('front/images/pdf.png')}}" />
                                        <p>Postal Ballot Form</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                        Disclosure under Regulation 46 of SEBI (LODR) Regulations
                    </button>
                </h2>
                <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                     <ul class="alphaul">
                        <li>
                            <a href="#">Details of its Business</a>
                        </li>
                        <li>
                            <a href="#">Terms and Conditions of Appointment of Independent Directors</a>
                        </li>
                        <li>
                            <a href="#">Composition of various Committees of Board of Directors</a>
                        </li>
                        <li>
                            <a href="#">Code of Conduct of Board of Directors</a>
                        </li>
                        <li>
                            <a href="#">Code of Conduct of Senior Management Personnel</a>
                        </li>
                        <li>
                            <a href="#">Details of establishment of Vigil Mechanism / Whistle Blower Policy</a>
                        </li>
                        <li>
                            <a href="#">Criteria of making payments to Non-Executive Directors, if the same has not been disclosed in Annual Report</a>
                        </li>
                        <li>
                            <a href="#">All credit ratings obtained by the entity for all its outstanding instruments, updated immediately as and when there is any revision in any of the ratings. – <span class="text-danger">Not Applicable</span></a>
                        </li>
                        <li>
                            <a href="#">Newspaper Advertisement for Financial Results</a>
                        </li>
                        <li>
                            <a href="#"> Complete copy of the annual report including balance sheet, profit and loss account, directors report, corporate governance report etc;</a>
                        </li>
                        <li>
                            <a href="#"> Financial results, on conclusion of the meeting of the board of directors where the financial results were approved;</a>
                        </li>

                     </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="int_team_wrapper">
    <div class="container">
        <div class="int_heading">
            <h2>Investor Contact</h2>
        </div>
        <div class="int_all_service2">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="int_service_box2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px">
                            <path fill-rule="evenodd"
                                d="M50.638,48.702 C50.162,49.509 49.289,49.999 48.351,49.988 L2.650,49.988 C1.711,50.000 0.838,49.509 0.362,48.702 C-0.090,47.945 -0.100,47.004 0.336,46.237 L5.559,36.921 C6.032,36.093 6.917,35.585 7.872,35.591 L13.926,35.591 C14.395,35.591 14.776,35.970 14.776,36.438 C14.776,36.906 14.395,37.285 13.926,37.285 L7.872,37.285 C7.532,37.279 7.215,37.455 7.043,37.747 L1.821,47.063 C1.678,47.305 1.681,47.606 1.828,47.845 C2.002,48.131 2.315,48.302 2.650,48.294 L48.351,48.294 C48.686,48.302 49.000,48.131 49.173,47.845 C49.320,47.606 49.323,47.305 49.181,47.063 L43.958,37.747 C43.786,37.455 43.468,37.278 43.128,37.285 L37.074,37.285 C36.605,37.285 36.225,36.906 36.225,36.438 C36.225,35.970 36.605,35.591 37.074,35.591 L43.128,35.591 C44.084,35.585 44.967,36.094 45.440,36.921 L50.664,46.237 C51.100,47.004 51.090,47.945 50.638,48.702 ZM44.189,44.907 C44.658,44.907 45.038,45.286 45.038,45.753 C45.038,46.221 44.658,46.600 44.189,46.600 L37.393,46.600 C36.924,46.600 36.543,46.221 36.543,45.753 C36.543,45.286 36.924,44.907 37.393,44.907 L44.189,44.907 ZM34.987,42.836 C34.727,42.447 34.832,41.921 35.223,41.661 L37.771,39.968 C37.911,39.875 38.075,39.826 38.242,39.825 L41.640,39.825 C42.109,39.825 42.490,40.205 42.490,40.672 C42.490,41.140 42.109,41.519 41.640,41.519 L38.497,41.519 L36.165,43.071 C35.775,43.330 35.248,43.225 34.987,42.836 ZM14.457,45.753 C14.457,46.221 14.077,46.600 13.608,46.600 L6.812,46.600 C6.343,46.600 5.963,46.221 5.963,45.753 C5.963,45.286 6.343,44.907 6.812,44.907 L13.608,44.907 C14.077,44.907 14.457,45.286 14.457,45.753 ZM9.361,39.825 L12.758,39.825 C12.926,39.825 13.091,39.875 13.231,39.968 L15.779,41.661 C16.091,41.868 16.229,42.255 16.121,42.612 C16.012,42.969 15.681,43.213 15.307,43.213 C15.140,43.213 14.977,43.163 14.838,43.070 L12.504,41.519 L9.361,41.519 C8.891,41.519 8.511,41.140 8.511,40.672 C8.511,40.205 8.891,39.825 9.361,39.825 ZM34.263,34.379 C32.164,37.330 30.069,39.974 28.681,41.668 C28.478,41.915 28.288,42.145 28.105,42.366 L32.296,42.366 C32.765,42.366 33.145,42.745 33.145,43.213 C33.145,43.681 32.765,44.060 32.296,44.060 L18.705,44.060 C18.236,44.060 17.855,43.681 17.855,43.213 C17.855,42.745 18.236,42.366 18.705,42.366 L22.896,42.366 C22.712,42.145 22.523,41.915 22.321,41.668 C20.932,39.969 18.836,37.330 16.737,34.379 C14.654,31.512 12.779,28.500 11.126,25.367 C9.391,21.967 8.511,19.147 8.511,16.983 C8.507,14.715 8.961,12.470 9.847,10.381 C13.498,1.758 23.468,-2.282 32.119,1.356 C32.398,1.474 32.593,1.731 32.630,2.032 C32.668,2.332 32.541,2.630 32.299,2.812 C32.056,2.994 31.735,3.033 31.455,2.915 C27.649,1.324 23.361,1.324 19.554,2.915 C13.889,5.309 10.210,10.849 10.210,16.983 C10.210,18.878 11.026,21.439 12.640,24.593 C14.255,27.656 16.088,30.599 18.124,33.401 C20.195,36.314 22.265,38.923 23.637,40.599 C24.093,41.157 24.503,41.650 24.853,42.066 C25.017,42.252 25.252,42.359 25.500,42.359 C25.748,42.359 25.984,42.252 26.148,42.066 C26.498,41.649 26.908,41.157 27.364,40.599 C28.736,38.923 30.806,36.313 32.877,33.401 C34.913,30.599 36.746,27.656 38.361,24.593 C39.974,21.439 40.791,18.878 40.791,16.983 C40.796,12.934 39.184,9.049 36.312,6.187 C36.092,5.974 36.003,5.659 36.081,5.363 C36.159,5.067 36.391,4.836 36.688,4.758 C36.986,4.681 37.301,4.770 37.514,4.990 C40.705,8.170 42.495,12.485 42.490,16.983 C42.490,19.147 41.610,21.967 39.875,25.363 C38.222,28.497 36.347,31.510 34.263,34.379 ZM30.074,10.499 C30.152,10.202 30.384,9.971 30.681,9.894 C30.978,9.816 31.293,9.905 31.507,10.125 C34.372,12.982 34.815,17.459 32.563,20.818 C30.312,24.177 25.993,25.483 22.249,23.937 C18.505,22.391 16.378,18.423 17.169,14.461 C17.959,10.498 21.448,7.644 25.500,7.644 C25.969,7.644 26.350,8.023 26.350,8.491 C26.350,8.959 25.969,9.338 25.500,9.338 C22.258,9.338 19.468,11.622 18.835,14.791 C18.203,17.962 19.905,21.136 22.900,22.372 C25.895,23.609 29.350,22.564 31.151,19.877 C32.952,17.189 32.598,13.608 30.306,11.322 C30.085,11.109 29.996,10.795 30.074,10.499 Z">
                            </path>
                        </svg>
                        <h4>Share Transfer Agent</h4>
                        <h5>Link Intime India Private Limited</h5>
                        <p>Address: 247, Lal Bahadur Shastri Marg,<br />
                            Surya Nagar, Gandhi Nagar,<br />
                            Vikhroli West, Mumbai,<br />
                            Maharashtra 400083
                        <p>Tel : <a href="tel:022 4918 6000">022 4918 6000</a></p>
                        <p>Website : <a href="www.linkintime.co.in" target="_blank">www.linkintime.co.in</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="int_service_box2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px">
                            <path fill-rule="evenodd"
                                d="M50.638,48.702 C50.162,49.509 49.289,49.999 48.351,49.988 L2.650,49.988 C1.711,50.000 0.838,49.509 0.362,48.702 C-0.090,47.945 -0.100,47.004 0.336,46.237 L5.559,36.921 C6.032,36.093 6.917,35.585 7.872,35.591 L13.926,35.591 C14.395,35.591 14.776,35.970 14.776,36.438 C14.776,36.906 14.395,37.285 13.926,37.285 L7.872,37.285 C7.532,37.279 7.215,37.455 7.043,37.747 L1.821,47.063 C1.678,47.305 1.681,47.606 1.828,47.845 C2.002,48.131 2.315,48.302 2.650,48.294 L48.351,48.294 C48.686,48.302 49.000,48.131 49.173,47.845 C49.320,47.606 49.323,47.305 49.181,47.063 L43.958,37.747 C43.786,37.455 43.468,37.278 43.128,37.285 L37.074,37.285 C36.605,37.285 36.225,36.906 36.225,36.438 C36.225,35.970 36.605,35.591 37.074,35.591 L43.128,35.591 C44.084,35.585 44.967,36.094 45.440,36.921 L50.664,46.237 C51.100,47.004 51.090,47.945 50.638,48.702 ZM44.189,44.907 C44.658,44.907 45.038,45.286 45.038,45.753 C45.038,46.221 44.658,46.600 44.189,46.600 L37.393,46.600 C36.924,46.600 36.543,46.221 36.543,45.753 C36.543,45.286 36.924,44.907 37.393,44.907 L44.189,44.907 ZM34.987,42.836 C34.727,42.447 34.832,41.921 35.223,41.661 L37.771,39.968 C37.911,39.875 38.075,39.826 38.242,39.825 L41.640,39.825 C42.109,39.825 42.490,40.205 42.490,40.672 C42.490,41.140 42.109,41.519 41.640,41.519 L38.497,41.519 L36.165,43.071 C35.775,43.330 35.248,43.225 34.987,42.836 ZM14.457,45.753 C14.457,46.221 14.077,46.600 13.608,46.600 L6.812,46.600 C6.343,46.600 5.963,46.221 5.963,45.753 C5.963,45.286 6.343,44.907 6.812,44.907 L13.608,44.907 C14.077,44.907 14.457,45.286 14.457,45.753 ZM9.361,39.825 L12.758,39.825 C12.926,39.825 13.091,39.875 13.231,39.968 L15.779,41.661 C16.091,41.868 16.229,42.255 16.121,42.612 C16.012,42.969 15.681,43.213 15.307,43.213 C15.140,43.213 14.977,43.163 14.838,43.070 L12.504,41.519 L9.361,41.519 C8.891,41.519 8.511,41.140 8.511,40.672 C8.511,40.205 8.891,39.825 9.361,39.825 ZM34.263,34.379 C32.164,37.330 30.069,39.974 28.681,41.668 C28.478,41.915 28.288,42.145 28.105,42.366 L32.296,42.366 C32.765,42.366 33.145,42.745 33.145,43.213 C33.145,43.681 32.765,44.060 32.296,44.060 L18.705,44.060 C18.236,44.060 17.855,43.681 17.855,43.213 C17.855,42.745 18.236,42.366 18.705,42.366 L22.896,42.366 C22.712,42.145 22.523,41.915 22.321,41.668 C20.932,39.969 18.836,37.330 16.737,34.379 C14.654,31.512 12.779,28.500 11.126,25.367 C9.391,21.967 8.511,19.147 8.511,16.983 C8.507,14.715 8.961,12.470 9.847,10.381 C13.498,1.758 23.468,-2.282 32.119,1.356 C32.398,1.474 32.593,1.731 32.630,2.032 C32.668,2.332 32.541,2.630 32.299,2.812 C32.056,2.994 31.735,3.033 31.455,2.915 C27.649,1.324 23.361,1.324 19.554,2.915 C13.889,5.309 10.210,10.849 10.210,16.983 C10.210,18.878 11.026,21.439 12.640,24.593 C14.255,27.656 16.088,30.599 18.124,33.401 C20.195,36.314 22.265,38.923 23.637,40.599 C24.093,41.157 24.503,41.650 24.853,42.066 C25.017,42.252 25.252,42.359 25.500,42.359 C25.748,42.359 25.984,42.252 26.148,42.066 C26.498,41.649 26.908,41.157 27.364,40.599 C28.736,38.923 30.806,36.313 32.877,33.401 C34.913,30.599 36.746,27.656 38.361,24.593 C39.974,21.439 40.791,18.878 40.791,16.983 C40.796,12.934 39.184,9.049 36.312,6.187 C36.092,5.974 36.003,5.659 36.081,5.363 C36.159,5.067 36.391,4.836 36.688,4.758 C36.986,4.681 37.301,4.770 37.514,4.990 C40.705,8.170 42.495,12.485 42.490,16.983 C42.490,19.147 41.610,21.967 39.875,25.363 C38.222,28.497 36.347,31.510 34.263,34.379 ZM30.074,10.499 C30.152,10.202 30.384,9.971 30.681,9.894 C30.978,9.816 31.293,9.905 31.507,10.125 C34.372,12.982 34.815,17.459 32.563,20.818 C30.312,24.177 25.993,25.483 22.249,23.937 C18.505,22.391 16.378,18.423 17.169,14.461 C17.959,10.498 21.448,7.644 25.500,7.644 C25.969,7.644 26.350,8.023 26.350,8.491 C26.350,8.959 25.969,9.338 25.500,9.338 C22.258,9.338 19.468,11.622 18.835,14.791 C18.203,17.962 19.905,21.136 22.900,22.372 C25.895,23.609 29.350,22.564 31.151,19.877 C32.952,17.189 32.598,13.608 30.306,11.322 C30.085,11.109 29.996,10.795 30.074,10.499 Z">
                            </path>
                        </svg>
                        <h4>Company Secretary & Compliance Officer</h4>
                        <h5>Ms. Ruchi Shah</h5>
                        <p>Airo Lam Limited<br />
                            Address: Survey No. 355, Nananpur Road,<br />
                            N.H. No. 8, Village- Dalpur, Ta. Prantij,<br />
                            Dist. : S.K., Gujarat-383120, India.
                        <p>Tel(o) : <a href="tel:2770-240572">2770-240572</a></p>
                        <p>Email : <a href="mailto:investors@airolam.com">investors@airolam.com</a>, <a
                                href="mailto:cs1@airolam.com">cs1@airolam.com</a></p>
                        <p>Website : <a href="www.airolam.com" target="_blank"> www.airolam.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
