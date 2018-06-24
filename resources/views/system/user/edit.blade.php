@extends('layouts.app')

@section('css')
    {{--<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm">
                    <li class="breadcrumb-item"><i class="fa fa-gear"></i>系统管理</li>
                    <li class="breadcrumb-item"><i class="fa fa-user-circle-o"></i>用户管理</li>
                    <li class="breadcrumb-item active"><i class="fa fa-edit"></i>修改用户信息</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <form class="form-horizontal">                                    @csrf
                                    <div class="form-inline form-group">
                                        <label class="col-sm-2 control-label">用户ID</label>
                                        <div class="col-sm-6">
                                            <label class="col-sm-3 control-label">123</label>
                                        </div>
                                    </div>
                                    <div class="form-inline form-group">
                                        <label class="col-sm-2 control-label">用户名</label>
                                        <div class="col-sm-6">
                                            <label class="col-sm-3 control-label">asdasdasd</label>
                                        </div>
                                    </div>
                                    <div class="form-inline form-group">
                                        <label for="nickname" class="col-sm-2 control-label">昵称</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="form-inline form-group">
                                        <label for="avatar" class="col-sm-2 control-label">头像</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="avatar">
                                        </div>
                                    </div>
                                    <div class="form-inline form-group">
                                        <label for="email" class="col-sm-2 control-label">电子邮箱</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="form-inline form-group">
                                        <label for="phone" class="col-sm-2 control-label">电话号码</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone">
                                        </div>
                                    </div>
                                    <div class="form-inline form-group">
                                        <label for="comment" class="col-sm-2 control-label">备注</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" id="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-inline form-group">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-primary">保存</button>
                                            <button type="button" class="btn btn-info">返回</button>
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

@section('javascript')
    <script src="{{asset('js/system/user/edit.js')}}"></script>
@endsection