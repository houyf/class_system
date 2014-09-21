<?php
class IndexController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex( )
	{	

		 $this -> layout = '/layouts/admin'; 
		 $this -> render('index');
		/*echo '<pre>';
		print_r($model -> username);
		echo '</pre>';
		echo '<pre>';
		print_r($model -> last_logintime);
		echo '</pre>';
		if(!empty($model -> email)) {
			echo '<pre>';
			print_r($model -> email);
			echo '</pre>';
		}
		if($model -> send_email) {
			echo '<pre>';
			print_r('您已经设置了邮件提醒');
			echo '</pre>';
		}
		else {
			echo '<pre>';
			print_r('您没有设置邮件提醒');
			echo '</pre>';
		}
		echo '<br/>', '<hr/>';
		 
		// 未读邮件数目 
		 echo '<pre>';
		 print_r('未读邮件数目 ');
		 echo '</pre>';
		$criteria = new CDbCriteria ;
		$criteria -> select = "* ";
		$criteria -> addCondition('status=0');
		$advice_list = Advice::model() -> findAll($criteria);
		echo count($advice_list);
		 
		//历史邮件数目
		echo '<pre>';
		print_r('历史邮件数目');
		echo '</pre>';
		$criteria = new CDbCriteria ;
		$criteria -> select = "* ";
		$advice_list = Advice::model() -> findAll($criteria);
		echo count($advice_list);
		echo '<br/>', '<hr/>';
		
		// 未读邮件按照类件分类
		
		//每一类邮件的总份数
		$criteria = new CDbCriteria ;
		$advice_list = Category::model() -> findAll($criteria);
		foreach ($advice_list as  $row) {
			echo '<pre>';
			echo $row -> cname ."  ".  count($row->advices); 
			echo '</pre>';
		}
*/
	}

	/**
	 * 是否通过邮件提醒
	 */
	public function actionSend_email()
	{
		$model = Admin::model() -> findByPk(Yii::app( )-> user-> admin_id);
		if($_POST['Admin'])  
		{
			$isset = $_POST['Admin']['send_email'];
			if($isset == 0) 
			{
				$model -> attributes = array('sent_email' => $isset);
				if($model -> save()) { echo ' 取消邮件提醒成功'; die;}
			}
			else {
				$model -> attributes = array('sent_email' => $isset);
				if($model -> save()) { echo '修改成功，我们将会每天晚上7点通过邮件通知'; die;}
			}
		} 
		$this -> render('send_email', array('model' => $model));
	}
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);	
	}

	public function actionSelf_info()
	{
		$this -> redirect(array('admin2/view/id/' . Yii::app( )-> user-> admin_id ));
	}

	public function  actionModify_info()
	{
	 	$this -> redirect(array('admin2/update/id/' . Yii::app( )-> user-> admin_id ));		 
	}
	public function actionModify_psw() 
	{
		$model = Admin::model() -> findByPk(Yii::app( )-> user-> admin_id);
		if($_POST['Admin'])
		{
			// $b = true;
			$usr = $_POST['Admin']['old_username'];
			$psw = $_POST['Admin']['old_password'];
			$new_psw =   $_POST['Admin']['password'];
			$new_usr  =  $_POST['Admin']['username']; 
			/* if( empty(trim($new_usr)) ) { $model -> addError('username', '用户名不能为空') ; $b= false;}
			 if( empty(trim($new_psw ) )){ $model -> addError('password', '密码不能为空'); $b =false; }  */
			if($model -> judge($usr, $psw ) ) {	
				$model -> attributes = $_POST['Admin'];
				if($model -> save() ) {
					echo "alert('修改成功')";
					die;
				}
			} 
		}
		$this -> renderPartial('modify_psw', array('model' => $model));
	}
}


