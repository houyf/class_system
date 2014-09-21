<?php

class Advice2Controller extends Controller
{

	/**
	 * 只有登录才能进入后台管理
	 */
	public function filters() 
	{
		 return array( 'accessControl' );
	}
	public function accessRules( )
	{
		return array(
			array( 'allow', 'users' => array('@')),
			array( 'deny', 'users' => array('*'))
		);
	}

	/**
	 *  展示所有或者某一类别同时还没有被读过的的信息
	 */
	public function actionIndex( $cid = 0)
	{
		 
		 $criteria = new CDbCriteria;
		// $criteria -> addCondition("uid =:uid ");        //添加查询条件
		// $criteria -> params[':uid'] = $UID;              //绑定查询条件的参数
		 $criteria -> addCondition("status=0");
		  $criteria -> order = 'create_time desc';
		 if($cid != 0)  $criteria -> addCondition("cid=$cid");
		$count= Advice::model()->count($criteria);    //统计查询结果集中记录总数
		$pager= new CPagination($count);            //实例化CPagination类
		$pager ->pageSize = 10;                          //设置一页显示记录数
		// $pager->pageVar = 'p';                            //自定义URL中页码的参数，可以不设置
		$pager->applyLimit($criteria);                  //将结果集进行过滤处理
		$advice_list = Advice::model() ->findAll($criteria);
		if( count($advice_list) == 0)  die('您现在没有未读邮件');

		$this -> render('index', array('advice_list' => $advice_list, 'pager' => $pager));

		/*$criteria = new CDbCriteria ;
		// $criteria -> select = 'aid, cid, create_time'; 
		if($category != 0 ) $criteria -> addCondition("cid = $category");
		 $criteria -> addCondition("status = 0");
		 $criteria -> order = 'create_time desc';
		$advice_list = Advice::model() -> findAll($criteria);
		// header("charset=utf-8");
		if( count($advice_list) == 0)  die('您现在没有未读邮件');
		$this -> render('index', array('advice_list' => $advice_list));*/
	}

	/**
	 * 删除一条具体信息
	 */
	public function actionDelete($aid = 0)
	{
		if($aid != 0)Advice::model() -> deleteByPk($aid) ;
		 $this -> redirect(array('index'));
	}

	/**
	 * 展示一条具体信息
	 */
	public function actionAdvice($aid = 1)
	{	
		$criteria = new CDbCriteria ;
		$criteria -> addCondition("aid = $aid");
		$criteria -> addCondition("status = 0");
		$criteria -> order = 'create_time desc';
		$advice = Advice::model() -> find($criteria);
		$this -> render('advice', array('advice' => $advice)); 
	}

	/**
	 *  发布一则反馈
	 */
	public function actionUpdateStatus($aid = 0)
	{
		if($aid != 0) {
			$model = Advice::model() -> findByPk($aid);
			if(isset($model -> aid)) $model -> attributes = array('status' => 1);
			if($model -> save()){ 
			 $this -> redirect(array('index'));
			}
		}
		$this -> redirect(array('index'));
	}

}