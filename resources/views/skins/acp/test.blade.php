@extends('skins.acp.layout')

@section('page_title') Test @endsection
@section('page_desc') This is just test @endsection

@section('content')
    <form class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Site title</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Site title">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Registration active</label>
                <div class="col-sm-9">
                    <input type="checkbox">
                </div>
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Sign in</button>
        </div><!-- /.box-footer -->
    </form>

    @endsection

@section('content_1')
    Kontent.
    @endsection