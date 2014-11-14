<?php

class DefaultController extends Controller
{

	public function actionIndex()
	{
		$this->redirect(Yii::app()->createUrl('forum/Dashboard'));
		//$this->render('index');
	}
	
}