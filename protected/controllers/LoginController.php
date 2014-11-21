<?php

class LoginController extends Controller
{
	public function actionIndex()
	{
		if(isset(Yii::app()->session['username'])){
			$this->redirect(Yii::app()->createUrl('sosmed/beranda'));
		}
		$this->layout = 'login';
		$model = new LoginForm;		
		$model2 = new RegisterForm;		
		if(isset($_POST['LoginForm'])){
			$model->attributes = $_POST['LoginForm'];
			if($model->login()){
				$this->redirect($this->createUrl('/sosmed/beranda'));
			}
		}
		if(isset($_POST['RegisterForm'])){
			$this->actionRegister();
		}
		$model2->saveType = 'add';
		$this->render('index',array('model'=>$model,'model2'=>$model2));
	}

	public function actionRegister()
	{
		if(isset(Yii::app()->session['username'])){
			$this->redirect(Yii::app()->createUrl('sosmed/beranda'));
		}
		$model = new RegisterForm;		
		if(isset($_POST['RegisterForm'])){
			$model->attributes = $_POST['RegisterForm'];
			if($model->validate()){
				$model->save();
				$this->redirect(Yii::app()->createUrl('login'));
			}else{
				return false;
			}
		}
		$this->redirect(Yii::app()->createUrl('login'));
	}

	public function actionLogout()
	{
		$clearSession = Yii::app()->session->clear();
		if(!$clearSession){
			Yii::app()->session->destroy();
			$this->redirect(Yii::app()->request->baseUrl);
		}else{
			$this->redirect(Yii::app()->request->urlReferrer);
		}
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