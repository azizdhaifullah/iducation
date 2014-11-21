<?php

class LoginController extends Controller
{
	public function cekSession()
	{
		if(isset(Yii::app()->session['username'])){
			//get User and Role
			//echo Yii::app()->session['username'];exit;
			$getUser = TUser::model()->find(array('condition'=>'Username=:username','params'=>array(':username'=>Yii::app()->session['username'])));
			$model = new TUserAuth();
			$criteria = new CDbCriteria;
			$criteria->addCondition("user_id=".$getUser->user_id);
    		$criteria->addCondition("(user_role_id=2 OR user_role_id=1)");
			$cekUser = $model->find($criteria);

			if(empty($cekUser)){
				throw new CHttpException('when acces page',Yii::t('Errors','because this page just for admin'));
				Yii::app()->end();
			}
		}
	}

	public function actionIndex()
	{
		$this->cekSession();
		if(isset(Yii::app()->session['username'])){
			$this->redirect(Yii::app()->createUrl('admin/dashboard'));
		}

		$this->layout = 'login';
		$model = new LoginForm;
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if($model->login()){
				$this->redirect(Yii::app()->createUrl('admin/dashboard'));
			}
		}
		$this->render('index',array('model'=>$model));
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