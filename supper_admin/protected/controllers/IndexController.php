<?php

class IndexController extends Controller
{

	public function actions()
	{


		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'maxLength' => 4,
				'minLength' => 4,
				'height' => 40,
				//'fixedVerifyCode' => substr(md5(time()),11,4),	
				),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	/**
	 *  前段首页
	 */
	public function actionIndex()
	{
		echo 'This is the index page';
	}

	/** 
	 * 前端表单 
	 * 验证码有点小问题需要修改
	 */
	public function actionForm()
	{
		$adviceModel = new Advice ;
		$userModel = new User;
		$criteria = new CDbCriteria ;
		$criteria -> select = '*'; 
		$category_info = Category::model() -> findAll($criteria);
		$category = array();
		foreach($category_info as $row ) $category[$row -> cid] = $row -> cname;

		if($_FILES['Advice']) {
			// 保存文件，但是这样不好，需要现验证advice 之后在保存
			$set = array( 'image/jpeg' , 'image/png', 'image/gif' );
			$filename = $_FILES['Advice']['name']['picture'];
			$type = $_FILES['Advice']['type']['picture'];
			$tmp_name = $_FILES['Advice']['tmp_name']['picture'];
			$error = $_FILES['Advice']['error']['picture'];
			$size = $_FILES['Advice']['size']['picture'];
			 
			if($error == 0 ) 
			{
		 		$date  = date('Y-m-d',time());
	                    		$date = str_replace('-',"",$date);
	                    		$dir ='uploads/' . mt_rand(1, 1000) .  $date ;
			 	//if(! is_dir($dir)) { mkdir( $dir , 0777, true);}
			 	$file = $dir. $_FILES['Advice']['name']['picture'] ; 
			 	$success = move_uploaded_file( $_FILES['Advice']['tmp_name']['picture'], $file)  ;
			 	if(!$success) { $adviceModel -> addError('picture', '图片上传失败');} 
			 	$adviceModel -> picture = $file; /*将图片新路径押进model*/
			}	
			else {
				$default_picture = Yii::app() -> baseUrl . '/upload/1.jpeg';
				$adviceModel -> picture = $default_picture;
			}
		}
		
 		if(isset($_POST['Advice']) && isset($_POST['User']))
		{ 

			 /****************************************************/
			$_POST['User']['user_id'] = 12;/*由于user_id 暂时没有让用户输入，所以保留*/
			 /****************************************************/
			$adviceModel -> status = 0; /* 0 means have not read 1 opposite */
			$adviceModel -> create_time = date("Y-m-d H:i:s",time());
			$adviceModel -> user_id = $_POST['User']['user_id'];
			$adviceModel -> content = $_POST['Advice']['content'];
			$adviceModel -> cid = $_POST['Advice']['cid'];

			$userModel  -> user_id = $_POST['User']['user_id'];
			$userModel  -> username = $_POST['User']['username'];
			$userModel  -> mobile_phone = $_POST['User']['mobile_phone'];
			$userModel  -> email = $_POST['User']['email'];
			if( !isset( User::model()->findByPk($userModel -> user_id) -> user_id))
			{
				if ($userModel -> save() && $adviceModel->save()) {
					 // 新增一条反馈的同时相应类别加1
					 $cateModel =Category::model() -> findByPk($adviceModel -> cid);
					 echo $cateModel -> num; 
					 die;
					 $cateModel -> num ++;
					 $cateModel -> save() or die('出现错误');
			
					 $this -> redirect(array('index/success'));  
				}
			}
			else  if($adviceModel->save()) { 
				  // 新增一条反馈的同时相应类别加1
				 $cateModel =Category::model() -> findByPk($adviceModel -> cid);
				 
				 $cateModel -> num ++;
				 $cateModel -> save() or die('出现错误');
				 $this -> redirect(array('index/success'));  

			}
		}
		$this->renderPartial('form',array('adviceModel'=>$adviceModel, 'userModel' => $userModel, 'category' => $category ));
	}
	/**
	 * 提交成功后返回的页面
	 */
	public function actionSuccess()
	{
		 header('location:' . $this -> createUrl('index/index'));
	}
}