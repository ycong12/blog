<?php
namespace app\index\controller;
use app\index\controller\Base;
class Index extends Base
{
	//展示文章列表，按照ID来排序，并且分页
    public function index()
    {
    	$articleres=db('article')->order('id desc')->paginate(3);
    	$this->assign('articleres',$articleres);
        return $this->fetch();
    }




}
