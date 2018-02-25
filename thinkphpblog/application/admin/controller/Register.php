<?php
namespace app\Admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Register extends Controller
{
    public function register()
    {
        //先展示页面
        //判断有没有提交数据
      if(request()->isPost()){

            $data=input('post.');

            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
               $this->error($validate->getError()); die;
            }

           
            $data['password'] = md5(input('password'));
            if(db('admin')->insert($data)){
                return $this->success('注册用户成功！','login/index');
            }else{
                return $this->error('注册管理员失败！');
            }
            return;
        }
        
        return $this->fetch();
    }

    



}
