<?php

class ClassroomController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'GetClasses', 'GetMajors'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				/*'actions'=>array('create','update'),*/
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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
		$model=new Classroom;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Classroom']))
		{
			$model->attributes=$_POST['Classroom'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->class_id));
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

		if(isset($_POST['Classroom']))
		{
			$model->attributes=$_POST['Classroom'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->class_id));
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
		$dataProvider=new CActiveDataProvider('Classroom');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Classroom('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Classroom']))
			$model->attributes=$_GET['Classroom'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Classroom the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Classroom::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Classroom $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='classroom-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
 
	public function actionGetMajors()
	{
		if(! isset($_POST['department_id'])) return ;
		$dep_id = $_POST['department_id'] ;
		$majors = Department::model() -> findByPk($dep_id) -> majors;
		$majors = CHtml::listData($majors, 'major_id', 'major_name');
		$htmlData =  CHtml::tag('option', array('selected' => 'selected', 'value' =>''), '请选择专业');
		foreach ($majors as $value => $key) {
			 $htmlData .= Chtml::tag('option', array('value' => $value), Chtml::encode($key));
		}
		echo json_encode(array('htmlData' => $htmlData));
	} 

	public function actionGetClasses()
	{
		if(! isset($_POST['major_id'])) return ;
		$major_id = $_POST['major_id'] ;
		$classes = Major::model() -> findByPk($major_id) ->classes;
		$classes = CHtml::listData($classes, 'class_id', 'class_name');
		$htmlData =  CHtml::tag('option', array('selected' => 'selected', 'value' =>''), '请选择班级');
		foreach ($classes as $value => $key) {
			 $htmlData .= Chtml::tag('option', array('value' => $value), Chtml::encode($key));
		}
		echo json_encode(array('htmlData' => $htmlData));
	}
}
