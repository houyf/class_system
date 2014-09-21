<?php
class IndexController extends Controller
{

	public $layout = '/layouts/main';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				// 'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

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

	public function actionIndex( )
	{
		// echo Yii::app() -> user -> username;
		 $this -> render('index');
	}	 	

	public function  actionCourse()
	{
										 
	}

	public function actionRegister()
	{
		$model=new Student;
		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			if($model->save())
			{
				echo '提交成功，等待管理员确认';
				die;
			}
		}
		$this->render('register',array(
			'model'=>$model,
		));	 
	}
	public function actionAnnounce($cate_id = -1, $announce_id = -1)
	{
		// 所有类型的公告和最新的10 条公告
		if($cate_id == -1) 
		{
			// 取出所有公告分类
			$criteria =new  CDbCriteria;
			$criteria -> addCondition('class_id=' . Yii::app()->user->class_id); 
			$model = AnnounceCategory::model() -> findAll($criteria);
			
			 // 取出前若干条最新公告
			$criteria = new CDbCriteria;
			$criteria -> order = 'level desc, start_time desc';
			$criteria -> limit = 10;
			$criteria -> addCondition('class_id=' . Yii::app()->user->class_id); 
			$lastest_announces = ClassAnnounce::model() -> findAll($criteria);
			// echo count($lastest_announces);die;
			$this -> render('announce_cates', array('announce_cates' => $model, 'lastest_announces' => $lastest_announces ));

		}
		// 某一类公告
		else if($announce_id == -1) 
		{
			$_GET['cate_id'] = $cate_id;
			$_GET['cate_name'] = AnnounceCategory::model() -> findByPk($cate_id) -> cate_name;
			$criteria =new  CDbCriteria;
			$criteria -> order = 'level desc, start_time desc';
			$criteria -> limit = 10;
			$criteria -> addCondition('class_id=' . Yii::app()->user->class_id); 
			if($cate_id != -1)  $criteria -> addCondition('cate_id=' .  $cate_id); 
			$model = ClassAnnounce::model() -> findAll($criteria);
			$this -> render('announces', array('model' => $model));			
		}
		// 具体某一条公告
		else 
		{
			$criteria =new  CDbCriteria; 
			$criteria -> addCondition('announce_id=' .  $announce_id); 
			$model = ClassAnnounce::model() -> find($criteria);
			$this -> render('announce_view', array('model' => $model));
		}
	}
	public function actionResources($cate_id = -1, $id = -1)
	{
		 
	}
	
	public function actionTucao($cate_id = -1, $self =  false)
	{
		// 全部吐槽分类
		

		// 自己来吐槽
		if($self == true) 
		{
			$_GET['cateI_id'] =  $cate_id;
			 $model=new Tucao;
			if(isset($_POST['Tucao']))
			{
				$model->attributes=$_POST['Tucao'];
				$model->save() or die ('发布失败');
				$this -> redirect(array('index/tucao'));		
			}	
			$this->render('createTucao',array(
				'model'=>$model,
			));
		}

		else if($cate_id == -1) 
		{
			$criteria =new  CDbCriteria;
			$criteria -> addCondition('class_id=' . Yii::app()->user->class_id); 
			$model = TucaoCategory::model() -> findAll($criteria);	
			$this -> render('tucaoCategory', array('model' => $model));
		} 
		 // 某一类吐槽的前若干条 
		else  
		{
			$_GET['cate_id'] = $cate_id;
			$_GET['cate_name'] =  TucaoCategory::model() -> findByPk($cate_id) -> tucao_cate_name;
			$criteria =new  CDbCriteria;
			$criteria -> addCondition('tucao_cate_id=' . $cate_id); 
			$criteria -> limit  = 10;
			$model = Tucao::model() -> findAll($criteria);	
			$this -> render('tucaos', array('model' => $model));
		}
		
	}
	 
	public function  actionAdvice ()
	{
					 
	}
	public function actionVote($competitor_id = -1 , $position_id)
	{
		if($competitor_id == -1) {
			  $model = ClassCommittee::model() -> findByPk($position_id);
			  if( count($model ->competitors) == 0) {     
			  	$_GET['error']  = 1;  //没有竞选者
			  	$this -> render('vote');
			  }
			  else 
			  {
			  	$_GET['error']  = 0;  	 //有竞选者 ， 正常
			  	$this -> render('vote', array('model' => $model -> competitors));
			  }
		}
		else 
		{
			$model = Competitor::model() -> findByPk($competitor_id);
			$model -> votes ++;
			$model -> save()  or die('投票失败');
			$_GET['error']  = 2; //投票成功 	
			$this -> render('vote');
		}
	}
 
	public function actionCommittee($position_id = -1)
	{
		if($position_id == -1) 
		{
			$criteria = new CDbCriteria;
			$criteria -> addCondition('class_id=' . Yii::app() -> user->class_id );
			$model = ClassCommittee::model() -> findAll($criteria);
			$this -> render('committees',  array('model' => $model));
		}
		else {
			$model = ClassCommittee::model() -> findByPk($position_id);
			$this -> render('committee', array('model' => $model));
		}
	}
	public function actionCompete($position_id)
	{
		$model = new Competitor;
		$model-> position_id = $position_id;
		$num =  Competitor::model() ->findByPk( Yii::app() -> user-> student_id);
		if($num -> position_id ) 
		{
			$_GET['error'] = 1; //重复竞选
			$this -> render('compete', array('model' => $num ));
			die;
			  // '你已经竞选了'  . $num -> position-> position_name.   ' 职位， 不能重复竞选'; 
		}
		$model -> competitor_id = Yii::app() -> user-> student_id;
		$model->save() or die ('竞选失败');
		$_GET['error'] = 0;
		$this -> render('compete', array('model' => $model ));
		// echo '竟选成功'; die;	 
	}


	public function  actionClassmate($student_id = -1)
	{
		if($student_id == -1) 
		{
			$criteria =new  CDbCriteria;
			$criteria -> addCondition('class_id=' . Yii::app()->user->class_id); 
			$model = Student::model() -> findAll($criteria);

			$this-> render('student_all', array('model' => $model));
		}
		else 
		{
			$model = Student::model() -> findByPk($student_id);
			$this -> render('student_view', array('model' => $model));
		}
	}

	public function actionSupport()
	{

		if(! Yii::app() -> request -> isPostRequest) {echo 'failed'; die;}
		$tucao_id =  $_POST['tucao_id'];
		$model = Tucao::model() -> findByPk($tucao_id);
		$model -> support ++;
		$model -> save() or die(' 保存失败');
		echo 'success';
	}	 
	public function actionOppose()
	{

		if(! Yii::app() -> request -> isPostRequest) {echo 'failed'; die;}
		$tucao_id =  $_POST['tucao_id'];
		$model = Tucao::model() -> findByPk($tucao_id);
		$model -> oppose ++;
		$model -> save() or die(' 保存失败');
		echo 'success';
	}	 

	public function actionPersonal($service_id =0)
	{
		// $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		$this -> render('jwxt'); 
	}

	 /**
	  * 测试动作
	  */  
	public function actionTest()
	{
		$competitors = Competitor::model() -> findByAttributes(array('competitor_id' => '12348045'));

		echo '<pre>';
		print_r( $competitors ->student -> student_name );
		echo '</pre>';
	 	// Yii::app() ->user ->  setFlash('tmp',  Yii::app() -> request -> userHostAddress);
		 // $this -> render('test');
	}

}








