@extends('frontend.layouts.app')
@section('main-content')
<!-- =========================
    single blog section
    ========================== -->
<section id="blog" class="home-section text-center">
    <div class="heading-blog home-section text-centerz">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="section-heading-right">
                        <h2><strong>Single Blog</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog_container blog_container_deatils_leftbar" id="blog-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 blog-content">
                    <article>
                        <!-- slider -->
                        <div class="img-holder">
                            <div id="myCarousel0" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel0" data-slide-to="0"
                                        class="active"></li>
                                    <li data-target="#myCarousel0" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="{{ URL::to('/') }}/frontend/images/blog/1.jpg" alt="images">
                                    </div>
                                    <div class="item">
                                        <img src="{{ URL::to('/') }}/frontend/images/blog/2.jpg" alt="images">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end of slider-->
                        <div class="post-meta clear-fix">
                            <div class="post-date">
                                <ul>
                                    <li><span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <span>Date : </span>
                                        {{ date('M d, Y', strtotime($single_post -> created_at)) }}
                                    </li>
                                    <li><span><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <span>Author :</span>{{ $single_post -> author -> name }}
                                    </li>
                                    <li><span><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                                        <span>Comments :</span>15
                                        Comments
                                    </li>
                                </ul>
                            </div>
                            <div class="post-title">
                                <h2>{{ $single_post -> title }}</h2>
                            </div>
                        </div>
                        <br>
                        {!! htmlspecialchars_decode($single_post -> content) !!}
                        <!-- shear button -->
                        <div class="row shear_area">
                            <div class="col-lg-12">
                                <div class="shear">
                                    <h6>Share :</h6>
                                    <div class="social_button">
                                        <ul>
                                            <li><a href="#" class="tran3s"><i
                                                        class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#" class="tran3s"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#" class="tran3s"><i
                                                        class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li><a href="#" class="tran3s"><i
                                                        class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end of shear button -->
                        <!-- comment area -->
                        <div class="comments_area clear-fix">
                            <h4>comments list</h4>
                            <div class="col-md-12 single_comment clear-fix reply_comment">
                                <img src="frontend/images/blog/15.jpg" alt="images" class="float-left">
                                <div class="comment float-left">
                                    <a href="#" class="tran3s reply">Reply</a>
                                    <h6>Rio Arora</h6>
                                    <span>5 january 2017 at 11:30 pm</span>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever
                                        since, when
                                        unknown printer took a galley of type and scrambled it to make a
                                        type.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 single_comment clear-fix reply_comment wow fadeInDown">
                                <img src="frontend/images/blog/16.jpg" alt="images" class="float-left">
                                <div class="comment float-left">
                                    <a href="#" class="tran3s reply">Reply</a>
                                    <h6>Deo Clark</h6>
                                    <span>5 january 2017 at 11:30 pm</span>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever
                                        since, when
                                        unknown printer took a galley of type and scrambled it to make a
                                        type.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End of comment -->
                        <!-- comment-box -->
                        <div class="comment-box clear-fix">
                            <div>
                                <div>
                                    <div class="comment-box-title">
                                        <div>
                                            <h4>Type Your comments</h4>
                                        </div>
                                    </div>
                                    <form action="#">
                                        <div class="comment-box-field row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 wow fadeInDown">
                                                <div class="comment-box-half">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 wow fadeInDown">
                                                <div class="comment-box-half">
                                                    <input type="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInDown">
                                                <div class="comment-box-full">
                                                    <textarea placeholder="Comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="tran3s theme-button">Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- =========================
                  Blog Sidebar right
                  ========================== -->
                @include('frontend.layouts.partials.sidebar')
                <!-- End blog_sidebar right -->
            </div>
        </div>
    </div>
</section>
<!-- End blog section -->
@endsection
