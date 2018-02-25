<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use app\admin\controller\Base;
class Admin extends Base
{

    //展示后台管理的列表，并且查询数据分布
    public function lst()

    {   
        //实例化模型，查询记录并且分布
        $model= new AdminModel();
    	$list = AdminModel::paginate(3);
        //分配变量
    	$this->assign('list',$list);
        return $this->fetch();
    }

    //添加管理员
    public function add()
    {	
        //判断是否点击提交
    	if(request()->isPost()){

            //接收数据
			$data=[
    			'username'=>input('username'),
    			'password'=>input('password'),
    		];
            //验证数据
            //实例化验证器类
    		$validate = \think\Loader::validate('Admin');
            //表明验证场景是add
    		if(!$validate->scene('add')->check($data)){
			   $this->error($validate->getError()); die;
			}
            //入库，添加成功，则跳转
    		if(db('admin')->insert($data)){
    			return $this->success('添加管理员成功！','lst');
    		}else{
    			return $this->error('添加管理员失败！');
    		}
    		return;
    	}
        return $this->fetch();
    }


    //编辑用户名
    public function edit(){
        //接收数据
    	$id=input('id');

        //利用接收到的数据id，查询到用户的信息，再将用户作为变量传递给模板，来显示在模板上
    	$admins=db('admin')->find($id);
    	
        //判断是否点击提交
        if(request()->isPost()){

            //接收用户提交的数据 
    		$data=[
    			'id'=>input('id'),
    			'username'=>input('username'),
    		];
            //进行数据的加密，因为在后台管理页注册的时候没有加密，如果不输入密码，则默认为上一次的密码
    		if(input('password')){
				$data['password']=md5(input('password'));
			}else{
				$data['password']=$admins['password'];
			}

            //进行数据的验证
			$validate = \think\Loader::validate('Admin');
    		if(!$validate->scene('edit')->check($data)){
			   $this->error($validate->getError()); die;
			}
            //进行数据的更新
            $save=db('admin')->update($data);

            //不输入密码返回0，会转化为false，这样就会出现修改管理失败，所以要不全等于
    		if($save !== false){
    			$this->success('修改管理员成功！','lst');
    		}else{
    			$this->error('修改管理员失败！');
    		}
    		return;
    	}
    	$this->assign('admins',$admins);
    	return $this->fetch();
    }

    public function del(){
    	$id=input('id');
        //这里不允许删除默认的管理员
    	if($id != 2){
    		if(db('admin')->delete(input('id'))){
    			$this->success('删除管理员成功！','lst');
    		}else{
    			$this->error('删除管理员失败！');
    		}
    	}else{
    		$this->error('初始化管理员不能删除！');
    	}
    	
    }

    public function logout(){
        session(null);
        $this->success('退出成功！','Login/index');
    }
}
