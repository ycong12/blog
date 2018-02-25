<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
    //定义规则
    protected $rule = [
        'username'  =>  'require|max:20|unique:admin',
        'password' =>  'require',
    ];
    
    //定义规则的解释
    protected $message  =   [
        'username.require' => '管理员名称必须填写',
        'username.max' => '管理员名称长度不得大于20位',
        'username.unique' => '管理员名称不得重复',
        'password.require' => '管理员密码必须填写',

    ];

    //定义使用方法对应的操作
    protected $scene = [
        'add'  =>  ['username'=>'require|unique:admin','password'=>'require'],
        'edit'  =>  ['username'=>'require|unique:admin'],
    ];




}
