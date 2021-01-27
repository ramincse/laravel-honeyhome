<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="">
                    <a href="{{ route('home') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="appointment-list.html"><i class="fe fe-users"></i> <span>Users</span></a>
                </li>
                <li class="submenu">
                    <a href="#" class=""><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('post.index') }}">All Posts</a></li>
                        <li><a href="{{ route('category.index') }}">Categories</a></li>
                        <li><a href="{{ route('tag.index') }}">Tags</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#" class=""><i class="fe fe-vector"></i> <span> Home Settings</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('slider.index') }}">Slider</a></li>
                        <li><a href="#">Home Setup</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Aboout Us</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Prices</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Clients</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#" class=""><i class="fe fe-vector"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('logo.index') }}">Logo</a></li>
                        <li><a href="{{ route('social.index') }}">Social Icon</a></li>
                        <li><a href="">Clients</a></li>
                        <li><a href="">Footer</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>
{{--                <li>--}}
{{--                    <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</div>
