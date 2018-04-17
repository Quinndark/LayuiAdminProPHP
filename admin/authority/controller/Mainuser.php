<?php
/**
 * @Author: pizepei
 * @Date:   2018-04-04 16:24:10
 * @Last Modified by:   pizepei
 * @Last Modified time: 2018-04-16 14:20:28
 */
namespace app\authority\controller;
use app\login\model\MainUser   as User;
/**
 * 系统后台管理员
 */
class Mainuser extends \VerifiController\AdminLoginVerifi
{
    /**
     * [title 标题]
     * @Effect
     * @return [type] [description]
     */
    static function title()
    {
        return[
            'getList'=>'获取权限组列表',
            'updataStatus'=>'修改用户组状态',
            'addUser'=>'添加权限组',
        ];
    }
    /**
     * [getList 获取权限组列表]
     * @Effect
     * @return [type] [description]
     */
    public function getList()
    {
        (int)$page = input('page');
        (int)$limit = input('limit');
        if(empty(input('whe'))){
            $whe = '';
        }else{
            $whe = input('whe');
        }
        Result(User::getList($page,$limit,$whe));
    }
    /**
     * [updataStatus 修改用户组状态]
     * @Effect
     * @return [type] [description]
     */
    public function updataStatus()
    {
        (int)$Id = input('id');
        $Type = input('type');
        $Type = $Type=='false'?1:0;
        Result(User::updataStatus($Id,$Type));
    }
    /**
     * [addRole 添加权限组]
     * @Effect
     */
    public function addUser()
    {
        Result(User::addRole(input()));
    }


}
