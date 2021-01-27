<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homePage(){
        return view('frontend.home');
    }
    /**
     * Blog Post Page
     */
    public function blogPage(){
        $all_post = Post::latest() -> paginate(5);
        return view('frontend.blog', compact('all_post'));
    }

    /**
     * Single Blog Post Page
     */
    public function singlePage($slug){
        $single_post = Post::where('slug', $slug) -> first();
        return view('frontend.blog-single', compact('single_post'));
    }

    /**
     * Search Post By Category
     */
    public function postByCategory($slug){
        $cats = Category::where('slug', $slug) -> first();

        return view('frontend.category-search', compact('cats'));
    }

    public function postBySearch(Request $request){
        $search_text = $request -> search;
        $search_posts = Post::where('title', 'like', '%'. $search_text .'%') -> orWhere('category_name', 'like', '%'. $search_text .'%') -> get();
        return view('frontend.search', compact('search_posts'));
    }
}
