<?php
namespace App\Http\Logic\System;

use App\Http\Model\System\UserModel;

class UserLogic
{
    /**
     * 获取列表数据
     * @param array $params 参数数组['id'=>1, 'name'=>'admin'...]
     * @return array
     */
    public function list($params){
       $result = UserModel::where($params)->get()->toArray();
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