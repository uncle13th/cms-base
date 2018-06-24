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
     * 展示用户列表页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('system.user.list');
    }

    /**
     * 获取列表数据
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request){
        $params = $request->all();
//        echo json_encode($params);exit;
        $list = $this->userLogic->list($params);
        return response()->json([
            'code' => $this->userLogic->errorCode,
            'msg' => $this->userLogic->errorMsg,
            'data' => $list
        ]);
    }

    /**
     * 展示新增用户页面
     */
    public function create(){

    }

    /**
     * 保存新增/修改的用户数据
     */
    public function save(){

    }

    /**
     * 获取用户详情信息
     * @param Request $request
     * @param int $user_id 用户id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info(Request $request, $user_id){
        return $this->userLogic->info($user_id);
    }

    /**
     * 展示修改用户信息页面
     */
    public function edit(){
        return view('system.user.edit');
    }

    /**
     * 删除用户数据
     */
    public function delete(){

    }
}
