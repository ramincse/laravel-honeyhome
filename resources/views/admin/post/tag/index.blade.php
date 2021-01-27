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
                            <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-md-12">
                    <a class="btn btn-sm btn-info" data-toggle="modal" href="#tag_modal">Add new tag</a>
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Tags</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_data as $data)
                                        <tr>
                                            <td>{{ $loop -> index + 1 }}</td>
                                            <td>{{ $data -> name }}</td>
                                            <td>{{ $data -> slug }}</td>
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
                                                <a id="tag_edit" class="btn btn-sm btn-info" edit_id="{{ $data -> id }}" data-toggle="modal" href="#tag_modal_update">Edit</a>
                                                <form style="display: inline;" action="{{ route('tag.destroy', $data -> id) }}" method="POST">
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
            {{-- Add Tag Modal --}}
            <div id="tag_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add new tag</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('tag.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block btn-info" type="submit" value="Add tag">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> {{-- //Add Tag Modal --}}
            {{-- Update Tag Modal  --}}
            <div id="tag_modal_update" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update category</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update.tag') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Name">
                                    <input name="id" class="form-control" type="hidden">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block btn-info" type="submit" value="Update category">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> {{-- //Update Tag Modal --}}
        </div>
    </div>
@endsection
