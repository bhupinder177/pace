<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
  <ul class="side-menu-list">

    <!-- *******************Admin start menu ************************-->
    <?php
                $url = URL::to('/');
                $string = request()->route()->getPrefix();
                $getprefix = str_replace('/', '', $string);
                $segment   = Request::segment(2);
                $prefixurl = $url.'/'.$getprefix.'/';
                $authuser = Auth::user();
                ?>


    <li  <?php if(request()->segment(2) == "dashboard"){ ?>class="active" <?php } ?> >
      <a href="{{URL::to($getprefix.'/dashboard')}}">
        <span><i class="fa fa-tachometer"></i><span class="lbl">Dashboard</span></span>
      </a>
    </li>

        <li <?php if(request()->segment(2) == "categories" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/categories')}}">
            <span><i class="fa fa-tasks"></i><span class="lbl">Categories</span></span>
          </a>

        </li>





        <li <?php if(request()->segment(2) == "settings" ){ ?>class="active" <?php } ?>>
            <a href="{{route('settings.index')}}">
                <span><i class="fa fa-cog" aria-hidden="true"></i><span class="lbl">General Settings</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "investors" ){ ?>class="active" <?php } ?>>
            <a href="{{route('investor.index')}}">
                <span><i class="fa fa-user" aria-hidden="true"></i><span class="lbl">Investors</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "product" ){ ?>class="active" <?php } ?>>
            <a href="{{route('product.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Products</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "testimonials" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/testimonials')}}">
            <span><i class="fa fa-history"></i><span class="lbl">Testimonials</span></span>
          </a>
        </li>
        <li <?php if(request()->segment(2) == "media" ){ ?>class="active" <?php } ?>>
            <a href="{{route('media.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Media</span></span>
            </a>
        </li>
        <!-- <li <?php if(request()->segment(2) == "gallary" ){ ?>class="active" <?php } ?>>
            <a href="{{route('gallary.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Gallary</span></span>
            </a>
        </li> -->
        <li <?php if(request()->segment(2) == "career" ){ ?>class="active" <?php } ?>>
            <a href="{{route('career.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Career</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "certification" ){ ?>class="active" <?php } ?>>
            <a href="{{route('certification.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Certifications</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "filter" ){ ?>class="active" <?php } ?>>
            <a href="{{route('filter.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Filter</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "meta" ){ ?>class="active" <?php } ?>>
            <a href="{{route('meta.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Meta</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "commitee" ){ ?>class="active" <?php } ?>>
            <a href="{{route('commitee.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Bod & commitees</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "resources" ){ ?>class="active" <?php } ?>>
            <a href="{{route('resources.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Resources</span></span>
            </a>
        </li>
        <li <?php if(request()->segment(2) == "page" ){ ?>class="active" <?php } ?>>
            <a href="{{route('page.index')}}">
                <span><i class="fa fa-tasks" aria-hidden="true"></i><span class="lbl">Pages</span></span>
            </a>
        </li>
    </ul>
</nav>

<!--.side-menu-->
