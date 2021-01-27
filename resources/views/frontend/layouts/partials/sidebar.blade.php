<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 blog_content_left blog_sidebar">
    <form action="{{ route('post.search') }}" method="POST">
        @csrf
        <div class="search_item_holder">
            <input name="search" type="text" placeholder="search">
            <button class="p-color-bg"><i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </form>
    <div class="category_list">
        <h4>Categories</h4>
        <ul>
            @php
            $categories = App\Models\Category::latest() -> take(5) -> get();
            @endphp
            @foreach($categories as $cat)
                <li><a href="{{ route('blog.search.category', $cat -> slug) }}" class="tran3s">{{ $cat -> name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="recent_blog">
        <h4>Recent blog</h4>
        @php
            $posts = App\Models\Post::latest() -> take(5) -> get();
        @endphp
        @foreach($posts as $post)
            <div class="recent_blog_single_item clear-fix">
                <div class="img-content float-left">
                    <img style="width: 75px; height: 60px;" src="{{ URL::to('/') }}/media/posts/{{ $post -> feat_img }}" alt="image">
                </div>
                <div class="text float-left">
                    <a style="display: block; text-align: left;" href="#">{{ $post -> title }}</a>
                    <span style="display: block; text-align: left;">{{ date('M d,Y', strtotime($post -> created_at)) }}</span>
                </div>
            </div>
        @endforeach
    </div>
    <!-- end recent_blog -->
    <div class="tags_widget">
        <h4>Tags</h4>
        <ul>
            @php
                $tags = App\Models\Tag::latest() -> take(5) -> get();
            @endphp
            @foreach($tags as $tag)
                <li><a href="#" class="hvr-bounce-to-right-two">{{ $tag -> name }}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- End tags_widget -->
</div>

