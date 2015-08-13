@extends('skins.acp.layout')

@section('page_title') Dashboard @endsection
@section('page_desc') @endsection

@section('content_top')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua-gradient"><i class="fa fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Posts</span>
                    <span class="info-box-number">{{\App\Post::all()->count()}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow-gradient"><i class="fa fa-comment-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Topics</span>
                    <span class="info-box-number">{{\App\Topic::all()->count()}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red-gradient"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">{{\App\User::all()->count()}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple-gradient"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Groups</span>
                    <span class="info-box-number">{{\App\Group::all()->count()}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    </div>
@endsection

@section('content')
    Welcome to dashboard.
@endsection

@section('content_2')
        Welcome haha
    @endsection