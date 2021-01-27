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
                <div class="col-md-6">
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Logo Upload</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <img style="width: {{ $logo -> width }}; height: {{ $logo -> height }}; display: block;" src="{{ URL::to('/') }}/media/settings/logo/{{ $logo -> logo_name }}" alt="" ><br><br>
                                    <input name="old_logo" class="form-control" type="hidden" value="{{ $logo -> logo_name }}">
                                    <input name="logo" class="form-control" type="file">
                                </div>
                                <div class="form-group">
                                    <input name="logo_width" class="form-control" type="text" value="{{ $logo -> width }}">
                                </div>
                                <div class="form-group">
                                    <input name="logo_height" class="form-control" type="text" value="{{ $logo -> height }}">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-sm btn-info" type="submit" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
