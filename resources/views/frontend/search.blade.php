@extends('frontend.layouts.app')
@section('main-content')
    <!-- =========================
    blog section
    ========================== -->
    <section id="blog" class="home-section text-center">
        <div class="heading-blog home-section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="section-heading-right">
                            <h2><strong>Blog</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-blog p-t-60 p-b-60">
            <div class="container">
                @foreach($search_posts as $posts)
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 p-l-0 pull-right wow animated fadeInRight">
                                <div class="blog-img hover-img">
                                    <img style="width: 570px; height: 370px;" src="{{ URL::to('/') }}/media/posts/{{ $posts -> feat_img }}" alt="image">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6" style="text-align: justify;">
                                <div class="bp-content" >
                                    <div class="s1">
                                        <h2 style="text-align: left;" class="blog-title"><a href="singleblog.html">{{ $posts -> title }}</a></h2>
                                        {!! Str::of( htmlspecialchars_decode($posts -> content) ) -> words(50, '<span style="color: #f2af00; margin-left:10px;">>> >> >></span>') !!}
                                        <a style="display: table;" href="{{ route('blog.single', $posts -> slug) }}" class="btn-blog">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-xs-12">
                    <nav class="pagination  text-center">
{{--                        {{ $all_post -> links() }}--}}
                        <ul class="page-numbers">
                            <li><a class="previous page-numbers" href="#"><i class="fa fa-caret-left"></i></a></li>
                            <li><span class="page-numbers current"><span class="sr-only">Page </span>1</span></li>
                            <li><a class="page-numbers" href="#"><span class="sr-only">Page </span>2</a></li>
                            <li><a class="page-numbers" href="#"><span class="sr-only">Page </span>3</a></li>
                            <li><a class="page-numbers" href="#"><span class="sr-only">Page </span>4</a></li>
                            <li><a class="page-numbers" href="#"><span class="sr-only">Page </span>5</a></li>
                            <li><a class="next page-numbers" href="#"><i class="fa fa-caret-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog section -->
@endsection
