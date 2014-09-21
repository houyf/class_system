<?php

class StudentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				//'actions'=>array('index','view', 'create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				// 'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$model=new Student;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_id));
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	  
		$class_id = Yii::app() -> user -> class_id;
		$criteria = new CDbCriteria;
		$criteria  -> order = 'student_id desc';
		$criteria -> addCondition('class_id=' . $class_id);
		$criteria -> addCondition('is_check=0' );
		$model = Student::model() -> findAll($criteria);
		if(count($model) == 0) {echo '0'; exit;} 
		else
		{
			$model=new Student('search');
			$model -> class_id = $class_id;
			$model -> is_check = 0;
			$this->render('admin',array(
				'model'=>$model,
			));
		}
	}

	public function actionPass($id)
	{
		 $model = $this -> loadModel($id);
		 $model -> is_check = 1;
		 $model -> save() or die('failed');
		 $this -> redirect($this -> redirect(Yii::app() -> request -> urlReferrer));
	}

	public function actionListDorm()
	{
		$class_id = Yii::app() -> user -> class_id;
		$criteria = new CDbCriteria;
		$model = Student::model() -> findAll($criteria);
		$dorm = array();
		foreach ($model as $row) 
		{
			 if(!isset($dorm[$row->dorm_id])) 
				 $dorm[$row->dorm_id] = array(
					'dorm_info' =>array( 
						'area_name' => $row->dorm->building->area->area_name,
						 'building_id' => $row->dorm->building->building_id,
						 'dorm_name' => $row->dorm->dorm_name,
						 'dorm_id' => $row->dorm->dorm_id,
					),
					'student' => array("$row->student_id" => $row->student_name),
				);  
			else $dorm[$row->dorm_id]['student'][$row -> student_id] = $row->student_name;
		}
		echo '<pre>';
		print_r($dorm);
		echo '</pre>';
	}

	public function actionAdmin()
	{
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default value
		
		$class_id = Yii::app() -> user -> class_id;
		$model -> class_id = $class_id;
		$model -> is_check = 1;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Student the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Student $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
