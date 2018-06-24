<?php
/**
 * 用户模块逻辑处理
 */
namespace App\Http\Logic\System;

use App\Http\Logic\BaseLogic;
use App\Http\Model\System\UserModel;

class UserLogic extends BaseLogic
{
    /**
     * 获取列表数据
     * @param array $params 参数数组['id'=>1, 'name'=>'admin'...]
     * @return array
     */
    public function list($params){
        $page = $params['page'] ?? 1;
        $per_page = $params['per_page'] ?? 10;
        $result = [
            'total' => 0,
            'page' => $page,
            'per_page' => $per_page,
            'list' => []
        ];
        $where = [];
        if(isset($params['id']) && $params['id'] != ''){
            $where[] = ['id', '=', intval($params['id'])];
        }
        if(!empty($params['name'])){
            $where[] = ['name', 'regexp', $params['name']];
        }
        if(!empty($params['email'])){
            $where[] = ['email', 'regexp', $params['email']];
        }
        if(isset($params['status']) && $params['status'] > 0){
            $where[] = ['status', '=', intval($params['status'])];
        }
//        echo json_encode($where);exit;
        $total = UserModel::where($where)->count();
        if($total == 0){
            return $result;
        }

        $offset = ($page - 1) * $per_page;
        $list = UserModel::where($where)->offset($offset)->limit($per_page)->get()->toArray();
        $result = [
            'total' => $total,
            'page' => $page,
            'per_page' => $per_page,
            'list' => $list
        ];
        return $result;
    }

    /**
     * 获取详情信息
     * @param int $user_id 用户id
     * @return array
     */
    public function info($user_id){
        $result = [];
        $model = UserModel::find($user_id);
        if($model){
            $result = $model->first()->toArray();
        }
        return $result;
    }

    /**
     * 保存新增的数据
     */
    public function save(){

    }

    /**
     * 更新数据
     */
    public function update(){

    }

    /**
     * 删除数据
     */
    public function delete(){

    }
}