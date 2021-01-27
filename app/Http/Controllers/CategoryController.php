<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest() -> get();
        return view('admin.post.category.index', [
            'all_data' => $data,
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
        $this -> validate($request, [
            'name' => 'required | unique:categories',
        ]);

        Category::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name),
        ]);
        return redirect() -> route('category.index') -> with('success', 'Category added successfull');
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
        $data = Category::find($id);
        return [
            'name'  => $data -> name,
            'id'    => $data -> id,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request -> id;
        $data = Category::find($id);
        $data -> name = $request -> name;
        $data -> slug = Str::slug($request -> name);
        $data -> update();
        return redirect() -> route('category.index') -> with('success', 'Category updated successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data -> delete();
        return redirect() -> route('category.index') -> with('success', 'Category deleted successfull');
    }

    /**
     * Category Unpublished
     */
    public function unpublishedCategory($id)
    {
        $data = Category::find($id);
        $data -> status = 'Unpublished';
        $data -> update();
        return redirect() -> route('category.index') -> with('success', 'Category unpublished successfull');
    }

    /**
     * Category Published
     */
    public function publishedCategory($id)
    {
        $data = Category::find($id);
        $data -> status = 'Published';
        $data -> update();
        return redirect() -> route('category.index') -> with('success', 'Category published successfull');
    }
}
