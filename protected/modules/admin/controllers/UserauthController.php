<?php

class UserauthController extends Controller
{
	public $route;

	public function cekSession()
	{
		if(!isset(Yii::app()->session['username'])){
			//get User and Role
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
		$this->layout = 'admin';
		if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
			$model = new User_authForm();
			$this->render('index',array('model'=>$model));
			return;
		} else {
			$start = isset($_POST['iDisplayStart'])?$_POST['iDisplayStart']:0;
			$length = isset($_POST['iDisplayLength'])?$_POST['iDisplayLength']:10;
			
			//Sort by column
			$columns = explode(',',$_POST['sColumns']);
			$orderBy = $columns[$_POST['iSortCol_0']].' '.$_POST['sSortDir_0'];
			
			//search
			/*$filterBy = $filterString = null;
			foreach($columns as $key=>$col){
				//print_r($key);exit;			
				if($_POST['sSearch_'.$key]!=''){
					//print_r($_POST['sSearch_'.$key]);exit;
					$filterBy = $col;
					$filterString = $_POST['sSearch_'.$key];
				}
			}*/
			$page = ($start/$length)+1;
			
			$model = new TUserAuth();
			$criteria = new CDbCriteria;
			$criteria->select = '*';
			$criteria->with = array(
					'userRole'=>array(
							'select'=>'*',
							'joinType'=>'INNER JOIN'
						),
					'user'=>array(
							'select'=>'*',
							'joinType'=>'INNER JOIN'
						)
				);
			$criteria->together = true;
			if ((isset($_POST['filterBy'])) && (isset($_POST['filterStr']))) {
				$filterBy = $_POST['filterBy'];
				$filterStr = $_POST['filterStr'];
				if ($filterBy=='user_date'){
					$criteria->addSearchCondition((string)$filterBy,$filterStr,true, 'AND'); 
				}
				else 
				{
					$criteria->addSearchCondition((string)$filterBy,(string)$filterStr, true, 'AND');	
				}
			}
			$total = $model->count($criteria);			
			$summary = array("iTotalRecords"=>$total,"iTotalDisplayRecords"=>$total);			
			$criteria->order = $orderBy;
			if($page*$length > $total){
				$sisa = ($page * $length) - $total;
				$criteria->limit = $length - $sisa;
			}else{
				$criteria->limit = $length;	
			}
			$criteria->offset = $start;			
			$data = $model->findAll($criteria);
			$record = array();
			$nomor = 0;
			foreach($data as $row)
			{
				
			    $action = '<p><a href="'.Yii::app()->createUrl('admin/userauth/edit/i/'.@$row->user_auth_id).'"><i class="fa fa-pencil"></i></a> <a href="#myModal'.@$row->user_auth_id.'" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i></a>
			    			<div id="myModal'.@$row->user_auth_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		                      <div class="modal-dialog">
							    <div class="modal-content">
		                      <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		                        <h3 id="myModalLabel">Delete Confirm</h3>
		                      </div>
		                      <div class="modal-body">
		                        <p>Are you sure want to delete this data ?</p>
		                      </div>
		                      <div class="modal-footer">
		                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		                        <a href="'.Yii::app()->createUrl('admin/userauth/delete/i/'.@$row->user_auth_id).'"><button class="btn btn-danger">Delete</button></a>
		                      </div>
		                      </div>
		                      </div>
		                    </div></p>';

			    $record[] = array(
			    		htmlentities(@$row->user_auth_id),						
			    		htmlentities(@$row->user_id),						
						htmlentities(@$row->user->username),
						htmlentities(@$row->userRole->user_role_name),
						$action
					);		    
			}
			$output = array_merge($summary,array('aaData'=>$record));
			echo html_entity_decode(json_encode($output,true));
			Yii::app()->end();
		}
	}

 	public function ShowTable()
 	{
 		$start = isset($_POST['iDisplayStart'])?$_POST['iDisplayStart']:0;
		$length = isset($_POST['iDisplayLength'])?$_POST['iDisplayLength']:10;
		
		//Sort by column
		$columns = explode(',',$_POST['sColumns']);
		$orderBy = $columns[$_POST['iSortCol_0']].' '.$_POST['sSortDir_0'];
		
		$page = ($start/$length)+1;
		
		$model = new TUserRole();
		$criteria = new CDbCriteria;
		$criteria->select = '*';
		/*$criteria->with = array(
				'userRole'=>array(
						'select'=>'*',
						'joinType'=>'INNER JOIN'
					),
				'user'=>array(
						'select'=>'*',
						'joinType'=>'INNER JOIN'
					)
			);
		$criteria->together = true;*/
		if ((isset($_POST['filterBy'])) && (isset($_POST['filterStr']))) {
			$filterBy = $_POST['filterBy'];
			$filterStr = $_POST['filterStr'];
			if ($filterBy=='user_date'){
				$criteria->addSearchCondition((string)$filterBy,$filterStr,true, 'AND'); 
			}
			else 
			{
				$criteria->addSearchCondition((string)$filterBy,(string)$filterStr, true, 'AND');	
			}
		}
		$total = $model->count($criteria);			
		$summary = array("iTotalRecords"=>$total,"iTotalDisplayRecords"=>$total);			
		$criteria->order = $orderBy;
		if($page*$length > $total){
			$sisa = ($page * $length) - $total;
			$criteria->limit = $length - $sisa;
		}else{
			$criteria->limit = $length;	
		}
		$criteria->offset = $start;			
		$data = $model->findAll($criteria);
		$record = array();
		$nomor = 0;
		foreach($data as $row)
		{
			
		    $action = '<p><a class="editRole" href="'.Yii::app()->createUrl('admin/userauth/editRole/i/'.@$row->user_role_id).'"><i class="fa fa-pencil"></i></a> <a href="#myModal'.@$row->user_role_id.'" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i></a>
		    			<div id="myModal'.@$row->user_role_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                      <div class="modal-dialog">
						    <div class="modal-content">
	                      <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	                        <h3 id="myModalLabel">Delete Confirm</h3>
	                      </div>
	                      <div class="modal-body">
	                        <p>Are you sure want to delete this data ?</p>
	                      </div>
	                      <div class="modal-footer">
	                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	                        <a href="'.Yii::app()->createUrl('admin/userauth/delete/i/'.@$row->user_role_id).'"><button class="btn btn-danger">Delete</button></a>
	                      </div>
	                      </div>
	                      </div>
	                    </div></p>';

		    $record[] = array(
		    		htmlentities(@$row->user_role_id),						
					htmlentities(@$row->user_role_name),
					htmlentities(@$row->user_role_description),
					$action
				);		    
		}
		$output = array_merge($summary,array('aaData'=>$record));
		echo html_entity_decode(json_encode($output,true));
		Yii::app()->end();
 	}
	
	public function actionAdd()
	{
		$this->layout = 'admin';
		$this->route = $this->getRoute();
		if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
			$model = new User_authForm();
			if (isset($_POST['User_authForm'])){
				$model->attributes = $_POST['User_authForm'];
				if($model->validate()){
					$model->save();
					$this->redirect(Yii::app()->createUrl('admin/userauth'));	
				}else{
					Yii::app()->user->setFlash('Error','Error when validating data !');
					$this->redirect($this->createUrl('/admin/user/add_user_auth'));
				}
			}
			$model->saveType = 'add';
			$this->render('add_user_auth', array('model'=>$model));
			return;
		} else {
			$this->ShowTable();
		}
	}

	public function actionEdit()
	{
		$this->layout = 'admin';
		$this->route = $this->getRoute();
		if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
			$model = new User_authForm();
			if (isset($_POST['User_authForm'])){
				$model->attributes = $_POST['User_authForm'];
				if($model->validate()){
					$model->save();
					$this->redirect(Yii::app()->request->urlReferrer);	
				}else{
					Yii::app()->user->setFlash('Error','Error when validating data !');
					$this->redirect($this->createUrl(Yii::app()->request->urlReferrer));
				}
			}
			$model->edit($_GET['i']);
			$this->render('add_user_auth', array('model'=>$model));
			return;
		} else {
			$this->ShowTable();
		}
	}

	public function actionAddRole()
	{
		$this->layout = 'popup';
		$model = new User_roleForm();
		if (isset($_POST['User_roleForm'])){
			$model->attributes = $_POST['User_roleForm'];
			if($model->validate()){
				$model->save();
				$this->redirect(Yii::app()->createUrl($this->route));
			}else{
				Yii::app()->user->setFlash('Error','Error when validating data !');
				$this->redirect($this->createUrl('/admin/userauth/addRole'));
			}
		}
		$model->saveType = 'add';
		$this->render('add_user_role', array('model'=>$model));
	}

	public function actionEditRole()
	{
		$this->layout = 'popup';
		$model = new User_roleForm();
		//echo $this->getRoute();exit;
		if (isset($_POST['User_roleForm'])){
			$model->attributes = $_POST['User_roleForm'];
			if($model->validate()){
				$model->save();
				$this->redirect(Yii::app()->request->urlReferrer);
			}else{
				Yii::app()->user->setFlash('Error','Error when validating data !');
				$this->redirect($this->createUrl(Yii::app()->request->urlReferrer));
			}
		}
		$model->edit($_GET['i']);
		$this->render('add_user_role', array('model'=>$model));
	}

	public function actionDelete()
	{
		$i = $_GET['i'];
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('user_auth_id',$i,TRUE,'=');
		$data = TUserAuth::model()->find($criteria);
		if(empty($data)){
			$criteria = new CDbCriteria;
			$criteria->addSearchCondition('user_role_id',$i,TRUE,'=');
			$data = TUserRole::model()->find($criteria);
		}
		if($data->delete()){
			$this->redirect(Yii::app()->createUrl('admin/userauth'));
		}else{
			return false;
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