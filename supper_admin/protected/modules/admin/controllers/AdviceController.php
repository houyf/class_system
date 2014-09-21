<?php

class AdviceController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				// 'actions'=>array('create','update', 'admin','delete'),
				'users'=>array('@'),
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
		$model=new Advice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Advice']))
		{
			$model->attributes=$_POST['Advice'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->aid));
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

		if(isset($_POST['Advice']))
		{
			$model->attributes=$_POST['Advice'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->aid));
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
		 $this -> render('index');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$criteria =new CDbCriteria;
		$criteria -> addCondition('`status`=0');
		echo  "<h1 align='center' >". Yii::app() -> user -> username . 
		", &nbsp&nbsp&nbsp您还有&nbsp&nbsp" .  Advice::model() -> count($criteria) . "条反馈还未审阅</h1>";
 		$model=new Advice('search');
		$model->unsetAttributes();  // clear any default values
		$model -> status = 0;
		if(isset($_GET['Advice']))
			$model->attributes=$_GET['Advice'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Advice the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Advice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Advice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='advice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUpdateStatus($id = 0)
	{
		if($id != 0) {
			$model = Advice::model() -> findByPk($id);
			if(isset($model -> aid)) $model -> attributes = array('status' => 1);
			if($model -> save()) $this -> redirect(Yii::app() -> request -> urlReferrer);
		}
		$this -> redirect(array('admin'));
	}

	public function actionAnnounce($id = 0)
	{
		if($id != 0) {
			$model = Advice::model() -> findByPk($id);
			if(isset($model -> aid)) $model -> attributes = array('can_announce' => 1);
			if($model -> save()) $this -> redirect(Yii::app() -> request -> urlReferrer);
		}
		$this -> redirect( array('admin'));
	}


	 /**
	  * 选时间段画出统计图
	  */
	private function  analyse($time = -1, $all =1)
	{	
		$criteria = new CDbCriteria;
		$criteria -> select = 'cid';
		if($all == 0) $criteria -> addCondition('`status`=0');
		if($time > 0)
		{
			$start_time = date("Y-m-d H:i:s",strtotime("-$time week"));
			$end_time = date("Y-m-d H:i:s",time());
			$criteria->addCondition("create_time>'" . $start_time ."'" );  
			$criteria->addCondition("create_time<'" . $end_time ."'");
		} 
		else if($time == 0) 
		{
			$end_time = date("Y-m-d H:i:s",strtotime("$time week"));
			$start_time = date("Y-m-d 00:00:00",time());

			$criteria->addCondition("create_time>'" . $start_time ."'" );  
			$criteria->addCondition("create_time<'" . $end_time ."'");
		}

		$model = Advice::model() -> findAll($criteria);
		if(count($model) == 0) return  array();
		$data = array();
		$cate_name = array();
		$cates = Category::model() -> findAll();
		foreach ($cates as  $row) {
		 	 $cate_name[$row -> cid] = $row -> cname;
		 	  $data[$cate_name[$row -> cid]] = 0;
		 } 
		 foreach ($model as $row) 
		 {
		 	$data[$cate_name[$row -> cid]] ++;
		 }
		return $data;	
	}	

	public function actionLine($id = -1)
	{
		$data = $this -> analyse($id);
		include('jpgraph/jpgraph.php');	
		include('jpgraph/jpgraph_line.php');
		$ydata = array();
		$xdata = array();
		foreach ($data as $key => $value) {
			 array_push($xdata, $key);
			 array_push($ydata, $value);
		}
		if( count($data) == 0){ echo '近一个习惯起没有相应的反馈级记录'; die; } 
		$graph =  new Graph(500, 500, 'auto');	
		$graph -> SetScale('textlin');
		$linePlot = new linePlot($ydata);
		$linePlot->SetColor("blue:0.5");  
		$linePlot->value->Show(); 
		$linePlot->SetWeight(1);;  
		$graph -> Add($linePlot);
		$graph -> xaxis -> SetTickLabels($xdata);
		// $graph -> xaxis -> SetTextLabelInterval(2);  	
		$graph -> yaxis -> SetColor("black");  
		$graph -> yaxis -> SetWeight(2);  
		$graph->SetShadow();  
		$graph->Stroke(); 
	}

	public function actionPie($id= -1)
	{
		include('jpgraph/jpgraph.php');
		include('jpgraph/jpgraph_pie.php');
		include('jpgraph/jpgraph_pie3d.php');

		$data = $this -> analyse($id);
		$ydata = array();
		$xdata = array();
		foreach ($data as $key => $value) {
			 array_push($xdata, $key);
			 array_push($ydata, $value);
		}
		if( count($data) == 0){ echo '近一个习惯起没有相应的反馈级记录'; die; } 
		$data= $ydata;
		$graph=new pieGraph(500,500);
		$graph->img->SetMargin(100, 100, 100, 100);
		$pie3dplot=new piePlot3d($data);  //定义饼图
		$pie3dplot->SetLegends( $xdata);
		$pie3dplot->value->Show(); 
		$graph->Add($pie3dplot);
		$graph->Stroke();
	}

	public function actionBar($id=-1)
	{
		include('jpgraph/jpgraph.php');
		include('jpgraph/jpgraph_bar.php');

		$data = $this -> analyse($id);
		$ydata = array();
		$xdata = array();
		foreach ($data as $key => $value) {
			 array_push($xdata, $key);
			 array_push($ydata, $value);
		}
		if( count($data) == 0){ echo '近一个习惯起没有相应的反馈级记录'; die; }
		$graph=new Graph(500, 500, 'auto');
		$graph->setScale("textint");
		$graph->setMargin(100,100,100,100);
		$graph->xaxis->SetTickLabels($xdata);
		$barplot=new BarPlot($ydata);
		// $barplot->setFillColor(array('red','blue','green')); 
		$barplot->setcolor("orange");
		$graph->Add($barplot);
		$barplot->value->Show(); 
		$graph->Stroke(); 
	}
}