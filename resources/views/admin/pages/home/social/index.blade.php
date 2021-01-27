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
                            <li class="breadcrumb-item active">Social Media</li>
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
                <div class="col-xl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Social Media Update</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $social = $settings -> social;
                                $settings_data = json_decode($social);
                            @endphp
                            <form action="{{ route('social.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Facebook</label>
                                    <div class="col-lg-9">
                                        <input name="fb" type="text" class="form-control" value="{{ $settings_data -> fb }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Twitter</label>
                                    <div class="col-lg-9">
                                        <input name="tw" type="text" class="form-control" value="{{ $settings_data -> tw }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Linkedin</label>
                                    <div class="col-lg-9">
                                        <input name="link" type="text" class="form-control" value="{{ $settings_data -> link }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Instagram</label>
                                    <div class="col-lg-9">
                                        <input name="inst" type="text" class="form-control" value="{{ $settings_data -> inst }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Dribble</label>
                                    <div class="col-lg-9">
                                        <input name="drib" type="text" class="form-control" value="{{ $settings_data -> drib }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Youtube</label>
                                    <div class="col-lg-9">
                                        <input name="yout" type="text" class="form-control" value="{{ $settings_data -> yout }}">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
