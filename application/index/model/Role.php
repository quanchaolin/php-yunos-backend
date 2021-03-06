<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/15
 * Time: 18:22
 */
namespace app\index\model;

use think\Model;
use think\Request;

class Role extends Model
{
    /**
     * 初始化函数
     */
    public static function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        Role::event("before_write",function($role){
            $role->privilege_text=self::formatterPrivilegeList($role->privilege_list);
        });
    }

    /**
     * 格式化权限列表
     * @param $privilege_list
     * @return array
     */
    public static function formatterPrivilegeList($privilege_list)
    {
        $priarr=Privilege::where(["id"=>["in",$privilege_list]])->column("name");
        return implode(",",$priarr);
    }

}