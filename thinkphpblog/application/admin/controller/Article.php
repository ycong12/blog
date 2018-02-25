<?php
namespace app\Admin\controller;
use app\Admin\model\Article as ArticleModel;
use app\admin\controller\Base;
class Article extends Base
{
    public function lst()
    {
    	//展示文章，分页
        $list = ArticleModel::paginate(3);
    	$this->assign('list',$list);
        return $this->fetch();
    }


    //添加文章
    public function add()
    {	
        //判断用户有没有点击提交
    	if(request()->isPost()){
            
            //接收数据 
			$data=[
    			'title'=>input('title'),
                'author'=>input('author'),
                'desc'=>input('desc'),
                //将用户所输入的中文转化成英文
                'keywords'=>str_replace('，', ',', input('keywords')),
                'content'=>input('content'),
                'cateid'=>input('cateid'),
    			'time'=>time(),
            ];
            //这个前端页面框架
            if(input('state')=='on'){
                $data['state']=1;
            }
            //判断用户是否已经提交，，并将文件移动根目录的static/uploads上
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic']='/uploads/'.$info->getSaveName();
            }
            //验证数据 
    		$validate = \think\Loader::validate('Article');
    		if(!$validate->scene('add')->check($data)){
			   $this->error($validate->getError()); die;
			}
    		if(db('Article')->insert($data)){
    			return $this->success('添加文章成功！','lst');
    		}else{
    			return $this->error('添加文章失败！');
    		}
    		return;
    	}
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }


    //编辑文章
    public function edit(){
        //接收当前文章的ID
    	$id=input('id');
        //根据当前的ID找出这条文章的信息
    	$articles=db('Article')->find($id);
        //接收用户摇提交的数据
    	if(request()->isPost()){
    		$data=[
    			'id'=>input('id'),
                'title'=>input('title'),
                'author'=>input('author'),
                'desc'=>input('desc'),
                'keywords'=>str_replace('，', ',', input('keywords')),
                'content'=>input('content'),
                'cateid'=>input('cateid'),
    		];
            if(input('state')=='on'){
                $data['state']=1;
            }else{
                $data['state']=0;
            }
            if($_FILES['pic']['tmp_name']){
                
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic']='/uploads/'.$info->getSaveName();
            }
            //验证数据
			$validate = \think\Loader::validate('Article');
    		if(!$validate->scene('edit')->check($data)){
			   $this->error($validate->getError()); die;
			}
    		if(db('Article')->update($data)){
    			$this->success('修改文章成功！','lst');
    		}else{
    			$this->error('修改文章失败！');
    		}
    		return;
    	}
        //分配变量，将找出文章的信息分配到模版上去
    	$this->assign('articles',$articles);
        //需要将之前所添加的分类，查询出来，分配到模板上去
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
    	return $this->fetch();
    }

    public function del(){
    	$id=input('id');
		if(db('Article')->delete(input('id'))){
			$this->success('删除文章成功！','lst');
		}else{
			$this->error('删除文章失败！');
		}
    	
    }



}
