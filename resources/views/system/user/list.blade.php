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
                    <li class="breadcrumb-item active"><i class="fa fa-user-circle-o"></i>用户管理</li>
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
                            <div class="row">
                                <div class="col-lg-3">
                                    <h3 class="card-title">用户列表</h3>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-inline">
                                        <div class="form-group col-sm-12">
                                            <label for="userId" style="margin-right: 10px;">用户ID</label>
                                            <input type="text" class="form-control" id="userId" style="margin-right: 20px;">
                                            <label for="userName" style="margin-right: 10px;">用户名</label>
                                            <input type="text" class="form-control" id="userName" style="margin-right: 20px;">
                                            <label for="userStatus" style="margin-right: 10px;">状态</label>
                                            <select class="form-control" id="userStatus" style="margin-right: 50px;">
                                                <option value="0">全部</option>
                                                <option value="1">可用</option>
                                                <option value="2">不可用</option>
                                            </select>
                                        {{--</div>--}}
                                        {{--<div class="col-sm-3">--}}
                                            <button id="searchUser" class="btn btn-default" style="margin-right: 10px;">查询</button>
                                            <button id="addUser" class="btn btn-primary">新增</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="userTable" class="table table-bordered table-hover">
                                <thead style="background-color: #f7f7f7">
                                    <tr align="center">
                                        <th style="width: 5%">用户ID</th>
                                        <th style="width: 15%">用户名</th>
                                        <th style="width: 15%">昵称</th>
                                        <th style="width: 15%">电子邮箱</th>
                                        <th style="width: 15%">电话号码</th>
                                        <th style="width: 10%">状态</th>
                                        <th style="width: 15%">操作</th>
                                    </tr>
                                </thead>
                                <tbody id="userList" align="center"></tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="row">
                                <div class="col-sm-5">
                                    共<label id="userTotal">0</label>条数据
                                </div>
                                <div class="col-sm-7">
                                    <ul class="pagination pagination-sm m-0 float-right" id="paginator"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('js/jqPaginator/jqpaginator.min.js')}}"></script>
    <script src="{{asset('js/system/user/list.js')}}"></script>
@endsection