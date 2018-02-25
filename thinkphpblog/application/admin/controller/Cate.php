<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
use app\admin\controller\Base;
class Cate extends Base
{
    //展示分类信息
    public function lst()
    {
    	$list = CateModel::paginate(3);
    	$this->assign('list',$list);
        return $this->fetch();
    }

    //添加分类信息
    public function add()
    {	
        //判断用户有没有点击
    	if(request()->isPost()){

			$data=[
    			'catename'=>input('catename'),
    		];
            //验证数据
    		$validate = \think\Loader::validate('Cate');
    		if(!$validate->scene('add')->check($data)){
			   $this->error($validate->getError()); die;
			}
            //插入数据
    		if(db('cate')->insert($data)){
    			return $this->success('添加栏目成功！','lst');
    		}else{
    			return $this->error('添加栏目失败！');
    		}
    		return;
    	}
        return $this->fetch();
    }


    //编辑数据
    public function edit(){
        //接收当前分类的id
    	$id=input('id');
    	$cates=db('cate')->find($id);

    	if(request()->isPost()){
            //接收提交的数据
    		$data=[
    			'id'=>input('id'),
    			'catename'=>input('catename'),
    		];
			$validate = \think\Loader::validate('cate');
    		if(!$validate->scene('edit')->check($data)){
			   $this->error($validate->getError()); die;
			}
            //更新数据
            $save=db('cate')->update($data);
    		if($save !== false){
    			$this->success('修改栏目成功！','lst');
    		}else{
    			$this->error('修改栏目失败！');
    		}
    		return;
    	}
    	$this->assign('cates',$cates);
    	return $this->fetch();
    }
    //删除分类列表
    public function del(){
    	$id=input('id');
    	if($id != 2){
    		if(db('cate')->delete(input('id'))){
    			$this->success('删除栏目成功！','lst');
    		}else{
    			$this->error('删除栏目失败！');
    		}
    	}else{
    		$this->error('初始化栏目不能删除！');
    	}
    	
    }



}
