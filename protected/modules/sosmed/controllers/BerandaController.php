<?php

class BerandaController extends Controller
{
	public function actionIndex()
	{
		/*$password = '12345';
		$p = md5($password);
		$p2 = substr($p,0,5);
		$p3 = substr($p,5,-1);
		$p4 = substr($p,-1);
		$unix = md5(substr($p,-4));
		$uCod = substr($unix,0,4);
		$tp = $p2.$uCod.$p3.$p4;
		echo $tp."<br>";
		echo strlen($tp);
		exit;*/
		$this->layout = '';
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}