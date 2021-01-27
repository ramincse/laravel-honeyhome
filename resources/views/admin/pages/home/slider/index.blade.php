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
                            <li class="breadcrumb-item active">Website logo and favicon</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            {{-- Flash Message --}}
            <div class="row">
                <div class="col-md-6">
                    @include('validate')
                </div>
            </div>
            {{-- /Flash Message --}}
            <div class="row">
                @php
                    $all_sliders = json_decode($sliders -> sliders);


                @endphp
                <div class="col-xl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Home Page Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="hh-slider-container">
                                            @foreach( $all_sliders -> slider as $slide )
                                                <div id="slider-card-{{ $slide -> slide_code }}" class="card">
                                                    <div data-toggle="collapse" data-target="#slide-{{ $slide -> slide_code }}" style="cursor: pointer;" class="card-header"><h4>#Slide-{{ $slide -> slide_code }}<button id="hh_remove_btn" remove_id="{{ $slide -> slide_code }}" class="close">&times;</button></h4></div>
                                                    <div id="slide-{{ $slide -> slide_code }}" class="collapse">
                                                        <div class="card-body">

                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Title</label>
                                                                <div class="col-lg-9">
                                                                    <input name="slide_code[]" value="{{ $slide -> slide_code }}" class="form-control" type="hidden">
                                                                    <input name="title[]" class="form-control" type="text" value="{{ $slide -> title }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Sub Title</label>
                                                                <div class="col-lg-9">
                                                                    <textarea name="sub_title[]" class="form-control">{{ $slide -> sub_title }}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Button Text</label>
                                                                <div class="col-lg-9">
                                                                    <input name="btn_text[]" class="form-control" type="text" value="{{ $slide -> btn_text }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Button Link</label>
                                                                <div class="col-lg-9">
                                                                    <input name="btn_link[]" class="form-control" type="text" value="{{ $slide -> btn_link }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Photo</label>
                                                                <div class="col-lg-9">
                                                                    <input type="text" value="{{ $slide -> photo }}">
                                                                    <input name="photo[]" class="form-control" type="file">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">BG Photo</label>
                                                                <div class="col-lg-9">
                                                                    <input name="bg_img[]" class="form-control" type="file">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <button id="hh_slide" class="btn btn-sm btn-dark">Add new slide</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-md btn-info float-right">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
