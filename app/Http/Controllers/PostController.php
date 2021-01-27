<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::latest() -> get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.index', [
            'all_data' => $data,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request, [
           'title' => 'required',
           'content' => 'required',
        ]);
        if ($request -> hasFile('fimage')){
            $img = $request -> file('fimage');
            $file_name = md5( time() . rand() ) . '.' . $img -> getClientOriginalExtension();
            $img -> move( public_path('media/posts'), $file_name );
        }else{
            $file_name = '';
        }
        $post_user = Post::create([
            'title' => $request -> title,
            'slug' => Str::slug($request -> title),
            'user_id' => Auth::user() -> id,
            'content' => $request -> content,
            'feat_img' => $file_name,
            //'category_name' => ,
        ]);
        $post_user -> categories() -> attach($request -> category);
        return redirect() -> route('post.index') -> with('success', 'Post added successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::find($id);

        //Category
        $cat_all = Category::all();
        $post_cat = $data -> categories;

        $check_id = [];
        foreach ( $post_cat as $check_cat ) {
            array_push( $check_id , $check_cat -> id );
        }

        $cat_list = '';
        foreach ($cat_all as $cat) {
            if ( in_array($cat -> id, $check_id) ) {
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $cat_list .= '<div class="checkbox"><label><input '.$checked.' type="checkbox" name="category[]" value="'. $cat -> id . '">'. $cat -> name .'</label></div>';
        }

        return [
            'id' => $data -> id,
            'title' => $data -> title,
            'image' => $data -> feat_img,
            'cat_list' => $cat_list,
            //'tag_cat_list' => $tag_cat_list,
            'content' => $data -> content,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::find($id);
        $data -> delete();
        unlink('media/posts/' . $data -> feat_img);
        return redirect() -> route('post.index') -> with('success', 'Post deleted successfull');
    }

    /**
     *
     */
    public function postUpdate(Request $request){
        $post_id = $request -> id;
        $post_data = Post::find($post_id);
        //For Detach Category
        $post_data -> categories() -> detach();

        //Image Validate
        if ($request -> hasFile('new_fimage')){
            $img = $request -> file('new_fimage');
            $file_name = md5( time() . rand() ) . '.' . $img -> getClientOriginalExtension();
            $img -> move( public_path('media/posts'), $file_name );
            //Delete Old Photo
            unlink('media/posts/' . $post_data -> feat_img);
        }else{
            $file_name = $post_data -> feat_img;
        }

        $post_data -> title = $request -> title;
        $post_data -> slug = Str::slug($request -> title);
        $post_data -> user_id = Auth::user() -> id;
        $post_data -> content = $request -> content;
        $post_data -> feat_img = $file_name;
        $post_data -> update();
        //For Add Category
        $post_data -> categories() -> attach($request -> category);
        return redirect() -> route('post.index') -> with('success', 'Post updated successfull');
    }
}
