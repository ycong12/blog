<?php
namespace app\index\controller;
use app\index\controller\Base;
class Article extends Base
{

    //进入显示文章的页面
    public function index()
    {
        //当前文章的ID
    	$arid=input('arid');
        
        //根据当前文章的ID查询出该文章的内容
    	$articles=db('article')->find($arid);

        
       
        //点击数
    	db('article')->where('id','=',$arid)->setInc('click');

        //当前的分类，小导航栏
    	$cates=db('cate')->find($articles['cateid']);


    	$this->assign(array(
    		'articles'=>$articles,
    		'cates'=>$cates,
    		
    		));
        return $this->fetch('article');
    }



   



    




}
