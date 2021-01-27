@php
    $settings = App\Models\Settings::find(1);
@endphp
<header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <a href="#body"><img style="width: {{ $settings -> width }}; height: {{ $settings -> height }}; " src="media/settings/logo/{{ $settings -> logo_name }}" alt=""/></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right" id="nav">
                    <li><a href="#main-slider" class="smoothScroll">HOME</a></li>
                    <li><a href="#service" class="smoothScroll">SERVICE</a></li>
                    <li><a href="#about" class="smoothScroll">ABOUT</a></li>
                    <li><a href="#project" class="smoothScroll">PROJECT</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0"
                           data-close-others="false">PAGES<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog.html">BLOG</a></li>
                            <li><a href="singleblog.html">SINGLE BLOG</a></li>
                            <li><a href="shop.html">SHOP</a></li>
                        </ul>
                    </li>
                    <li><a href="#price" class="smoothScroll">PRICE</a></li>
                    <li><a href="#contact" class="smoothScroll">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
