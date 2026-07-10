@extends('layout')
@section('content')
@if ($message = Session::get('succes'))
<script>
    // alert("{{$message}}");
    Swal.fire({
        title: "異動資訊",
        text: "{{$message}}",
        icon: "success"
    });
</script>
@endif
<div class="col-lg-12">
    <div class="card alert">
        <div class="card-header">
            <h2>會員管理</h2><Br />
            <div class="row">
                <a href="{{route('admin.create')}}">
                    <button type="button" class="col-lg-2 btn btn-primary btn-flat btn-addon m-b-10 m-l-20">
                        <i class="ti-plus"></i>新增會員
                    </button>
                </a>
                <div class="basic-form col-lg-8" style="float:right;">
                    <form method="get" action="{{route('admin.index')}}">
                        <div class="form-group">
                            <div class="input-group input-group-default">
                                @csrf
                                <input type="text" name="Search" class="form-control" placeholder="Search Round：姓名" value="{{$searchKey}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-group-right">
                                        <i class="ti-search"></i> 查詢
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-responsive table-striped m-t-30">
                <thead>
                    <tr style="border-top:1px solid #e7e7e7;">
                        <th>會員編號</th>
                        <th>會員姓名</th>
                        <th>會員密碼</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $ad)
                    <tr>
                        <th scope="row">{{$ad->aid}}</th>
                        <td>{{$ad->aname}}</td>
                        <td>{{$ad->passwd}}</td>
                        <form id="{{$ad->aid}}" action="{{route('admin.destroy', $ad->aid)}}" method="post">
                            <td>
                                <a href="{{route('admin.edit', $ad->aid)}}">
                                    <button type="button" class="btn btn btn-info btn btn-flat btn-addon btn-sm m-b-5 m-l-5">
                                        <i class="ti-pencil-alt"></i>修改
                                    </button>
                                </a>
                                <a href="#">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="javascript:deleteConfirm('{{$ad->aid}}')" class="btn btn btn-default btn btn-flat btn-addon btn-sm m-b-5 m-l-5" onclick='return deleteConfirm("{{$ad->aid}}");'>
                                        <i class="ti-trash"></i>刪除
                                    </button>
                                </a>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            {!! $admin->links() !!}
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div><!-- /# column -->
@endsection