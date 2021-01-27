@extends('layouts.app')
@section('main-content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user() -> name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">All Posts</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            {{-- Flash Message --}}
            <div class="row">
                <div class="col-md-12">
                    @include('validate')
                </div>
            </div>
            {{-- /Flash Message --}}
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a class="btn btn-sm btn-info" data-toggle="modal" href="#post_modal">Add new post</a>
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered mb-0">
                                    <thead class="">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Categories</th>
                                            <th>Photo</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_data as $data)
                                        <tr>
                                            <td>{{ $loop -> index + 1 }}</td>
                                            <td>{{ $data -> title }}</td>
                                            <td>
                                                @foreach($data -> categories as $category_name)
                                                {{ $category_name -> name }} <span class="cat">|</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if( !empty($data -> feat_img) )
                                                <img style="width: 50px; height: 50px;" src="{{ URL::to('/') }}/media/posts/{{ $data -> feat_img }}" alt=""></td>
                                            @endif
                                            <td>{{ $data -> user_id }}</td>
                                            <td>{{ date('M d, Y', strtotime($data -> created_at)) }}</td>
                                            <td>
                                                @if($data -> status == 'Published')
                                                    <span class="badge badge-info">Published</span>
                                                @else
                                                    <span class="badge badge-danger">Published</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data -> status == 'Published')
                                                    <a class="btn btn-sm btn-danger" href="{{ route('tag.unpublished', $data -> id) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                @else
                                                    <a class="btn btn-sm btn-success" href="{{ route('tag.published', $data -> id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                @endif
                                                <a id="post_edit" class="btn btn-sm btn-info" edit_id="{{ $data -> id }}" href="#">Edit</a>
                                                <form style="display: inline;" action="{{ route('post.destroy', $data -> id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Add Post Modal --}}
            <div id="post_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add new post</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input name="title" class="form-control" type="text" placeholder="Post Title">
                                </div>
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    @foreach( $categories as $category)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="category[]" value="{{ $category -> id }}"> {{ $category -> name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Tags</label>--}}
{{--                                    @foreach( $tags as $tag)--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <label>--}}
{{--                                                <input type="checkbox" name="tag[]" value="{{ $tag -> slug }}"> {{ $tag -> name }}--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="">Photo</label>
                                    <img style="display: block; width: 150px; height: 150px; border: 1px solid #e9e9e9; border-radius: 4px;" class="fimage_load" src="" alt="">
                                    <input style="display: none;" id="fimage" name="fimage" class="form-control" type="file" placeholder="Name">
                                    <label style="font-size: 40px; cursor: pointer; color: #20c997;" for="fimage"><i class="fa fa-picture-o" aria-hidden="true"></i></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" id="post_editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block btn-info" type="submit" value="Add post">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> {{-- //Add Post Modal --}}
            {{-- Update Post Modal  --}}
            <div id="post_modal_update" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Post</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('post.update.ajax') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <input name="id" type="hidden">
                                    <input name="title" class="form-control" type="text" placeholder="Post Title">
                                </div>
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <div class="cl"></div>
                                </div>
                                <div class="form-group">
                                    <img style="display: block; width: 150px; height: 150px; border: 1px solid #e9e9e9; border-radius: 4px;" class="fimage_load_edit" src="" alt="">
                                    <input style="display: none;" id="new_fimage" name="new_fimage" class="new_fimage" type="file">
                                    <label style="font-size: 40px; cursor: pointer; color: #20c997;" for="new_fimage"><i class="fa fa-picture-o" aria-hidden="true"></i></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" class="form-control" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block btn-info" type="submit" value="Update post">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> {{-- //Update Post Modal --}}
        </div>
    </div>
@endsection
