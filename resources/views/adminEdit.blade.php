@extends('layout')
@section('content')
<div class="col-lg-12">
    <div class="card alert">
        <div class="card-header">
            <h2>會員資料修改</h2><Br />
            <div class="row">


            </div>
        </div>

        <div class="card-body">
            <div class="horizontal-form">
                <form class="form-horizontal" method="post" action="{{route('admin.update',$admin->aid)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-sm-2 control-label">會員帳號：</label>
                        <div class="col-sm-10">
                            <input name="aid" value="{{$admin->aid}}" type="text" readonly=readonly class="form-control" placeholder="會員帳號">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">會員名稱：</label>
                        <div class="col-sm-10">
                            <input name="aname" value="{{$admin->aname}}" type="text" class="form-control" placeholder="會員名稱">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">密碼：</label>
                        <div class="col-sm-10">
                            <input name="passwd" value="{{$admin->passwd}}" type="text" class="form-control" placeholder="密碼">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"><i class="ti-check"></i>確認</button>
                            <a href="{{route('admin.index')}}"> <button type="button" class="btn btn-default btn-flat btn-addon m-b-10 m-l-5"><i class="ti-close"></i>離開</button></a>
                        </div>

                    </div>
                    <div class="form-group">

                    </div>
                </form>
            </div>
        </div>

    </div>
</div><!-- /# column -->
@endsection