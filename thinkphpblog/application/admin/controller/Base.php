<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
	//避免用户的翻墙，在登录的时候已经保存了用户的信息
    public function _initialize(){
        if(!session('username')){
            $this->error('请先登录系统！','Login/index');
        }
    }
}
