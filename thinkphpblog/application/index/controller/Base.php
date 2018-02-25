<?php
namespace app\index\controller;
use think\Controller;
class Base extends Controller
{
    //公共的页面，前台所有的页面都要继承这个
    public function _initialize()
    {
    	$this->right();
        //前台所有模板导航栏，并且按添加顺序进行排序
        //导航栏
    	$cateres=db('cate')->order('id asc')->select();
        //Tags排序
        $tagres=db('tags')->order('id desc')->select();
    	$this->assign(array(
            'cateres'=>$cateres,
            'tagres'=>$tagres
            ));
    }



    //前台所有模板的右侧标签
    public function right(){
        //按照点击量进行排序
    	$clickres=db('article')->order('click desc')->limit(8)->select();
        //按照是否推荐，并且点击量多少来进行排序
    	$tjres=db('article')->where('state','=',1)->order('click desc')->limit(8)->select();
    	$this->assign(array(
    			'clickres'=>$clickres,
    			'tjres'=>$tjres
    		));
    }





}
