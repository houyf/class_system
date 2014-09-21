<?php
class CategoryController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				/*'actions'=>array('create','update'),*/
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
		$model=new Category;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cid));
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

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cid));
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
		$dataProvider=new CActiveDataProvider('Category');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$model->attributes=$_GET['Category'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	 
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionGetAdvice($id)
	{
		$model=new Advice('search');
		$model->unsetAttributes();
		$model -> cid = $id; 
		$this->render('admin',array(
			'model'=>$model,
		));
	}


	 /**
	  *  查看近一个星期的反馈情况
	  */
	private function analyse($id)
	{
		$criteria = new CDbCriteria;
		$criteria -> select = array('create_time');
		$criteria -> addCondition('cid=' . $id);
		$start_time = date("Y-m-d H:i:s",strtotime("-1 week"));
		$end_time = date("Y-m-d H:i:s",time());
		$criteria->addCondition("create_time>'" . $start_time ."'" );  
		$criteria->addCondition("create_time<'" . $end_time ."'");
		//$criteria -> order =  'create_time desc';
		$model = Advice::model() -> findAll($criteria);
		if(count($model) == 0) return  array();
		$data = array();
		for ($i=0; $i < 7 ; $i++) 
		{ 
			 $data[ date("Y-m-d ",strtotime("-$i day"))] = 0;
		}

		foreach ($model as $row) 
		{
			$date =substr($row -> create_time, 0, 10);
			$data[$date] ++; 
		}
		return $data;
	}

	public function actionLine($id)
	{
		$cate_name = Category::model() -> findByPk($id) -> cname;
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
		$graph -> title ->Set( '近一个星期关于' .  $cate_name . '的反馈情况' );
		$linePlot = new linePlot($ydata);
		$linePlot->SetColor("blue:0.5");  
		$linePlot->SetWeight(2);;  

		$graph -> Add($linePlot);
		$graph -> xaxis -> SetTickLabels($xdata);
		$graph -> xaxis -> SetTextLabelInterval(2);  	
		$graph -> yaxis -> SetColor("black");  
		$graph -> yaxis -> SetWeight(2);  
		$graph->SetShadow();  
		$graph->Stroke(); 
	}

	public function actionPie($id)
	{
		include('jpgraph/jpgraph.php');
		include('jpgraph/jpgraph_pie.php');
		include('jpgraph/jpgraph_pie3d.php');

		$cate_name = Category::model() -> findByPk($id) -> cname;
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
		$graph -> title ->Set( '近一个星期关于' .  $cate_name . '的反馈情况' );
		$pie3dplot=new piePlot3d($data);  //定义饼图
		$pie3dplot->SetLegends( $xdata);
		$graph->Add($pie3dplot);
		$graph->Stroke();
	}


	public function actionBar($id)
	{
		include('jpgraph/jpgraph.php');
		include('jpgraph/jpgraph_bar.php');

		$cate_name = Category::model() -> findByPk($id) -> cname;
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
		$graph -> title ->Set( '近一个星期关于' .  $cate_name . '的反馈情况' );
		$barplot=new BarPlot($ydata);
		// $barplot->setFillColor(array('red','blue','green')); 
		$barplot->setcolor("orange");
		$graph->Add($barplot);
		$barplot->value->Show(); 
		$graph->Stroke(); 
	}
}







