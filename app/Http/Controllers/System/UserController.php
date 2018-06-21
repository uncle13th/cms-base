<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Logic\System\UserLogic;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @var UserLogic 用户逻辑处理实例
     */
    protected $userLogic;

    /**
     * 构造函数
     * @param UserLogic $logic 用户逻辑处理类
     */
    public function __construct(UserLogic $logic)
    {
        $this->userLogic = $logic;
    }

    /**
     * 获取列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $params = $request->all();
        $list = $this->userLogic->list($params);
        return view('system.user.list');
    }

    /**
     * 展示添加页面
     */
    public function create(){

    }

    /**
     * 保存新增的数据
     */
    public function store(){

    }

    /**
     * 获取详情
     */
    public function show(Request $request, $user_id){
        $info = $this->userLogic->info($user_id);
        echo json_encode($info);exit;
        return view('home');
    }

    /**
     * 展示编辑页面
     */
    public function edit(){

    }

    /**
     * 保存更新的数据
     */
    public function update(){

    }

    /**
     * 删除数据
     */
    public function destroy(){

    }
}
