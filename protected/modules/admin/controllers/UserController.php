<?php

class UserController extends Controller
{
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
			$model =  new UserForm;
			$this->render('index',array('model'=>$model));
			return;
		} else {
			$start = isset($_POST['iDisplayStart'])?$_POST['iDisplayStart']:0;
			$length = isset($_POST['iDisplayLength'])?$_POST['iDisplayLength']:10;
			
			//Sort by column
			$columns = explode(',',$_POST['sColumns']);
			$orderBy = $columns[$_POST['iSortCol_0']].' '.$_POST['sSortDir_0'];

			$page = ($start/$length)+1;
			
			$model = new TUser();
			$criteria = new CDbCriteria;
			$criteria->select = '*';
			/*$criteria->with = array(
					'kepegawaian'=>array(
							'select'=>'*',
							'joinType'=>'INNER JOIN'
						),
					'kepangkatan'=>array(
							'select'=>'*',
							'joinType'=>'INNER JOIN'
						),
					'jabatan'=>array(
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
					//print_r($filterStr);exit;
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
				
			    $action = '<p><a href="'.Yii::app()->createUrl('admin/user/edit/i/'.@$row->user_id).'"><i class="fa fa-pencil"></i></a> <a href="#myModal'.@$row->user_id.'" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i></a>
			    			<div id="myModal'.@$row->user_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		                        <a href="'.Yii::app()->createUrl('admin/user/delete/i/'.@$row->user_id).'"><button class="btn btn-danger">Delete</button></a>
		                      </div>
		                      </div>
		                      </div>
		                    </div></p>';
                $gender = @$row->gender==1 ? @$row->gender="Male" : @$row->gender="Female";

			    $record[] = array(
			    		htmlentities(@$row->user_id),						
						htmlentities(@$row->username),
						htmlentities(@$row->password),
						htmlentities(@$row->fullname),
						htmlentities(@$row->email),
						htmlentities(@$row->user_date),
						$gender,
						$action
					);		    
			}
			$output = array_merge($summary,array('aaData'=>$record));
			echo html_entity_decode(json_encode($output,true));
			Yii::app()->end();
		}
	}

	public function actionAddUser(){
		
		$this->layout = "admin";
		$model = new UserForm;
		if(isset($_POST['UserForm'])){
			$model->attributes = $_POST['UserForm'];
			if($model->validate()){
				$model->save();
				$this->redirect(Yii::app()->createUrl('admin/user'));	
			}else{
				Yii::app()->user->setFlash('Error','Error when validating data !');
				$this->redirect($this->createUrl('/admin/user/addUser'));
			}
		}
		$model->saveType = 'add';
		$model->user_created_date = date("Y-m-d H:i:s"); 
		$this->render('add_user',array('model'=>$model));

	}

	public function actionEdit(){
		$this->layout="admin";
		$model=new UserForm;
		if(isset($_POST['UserForm'])){
			$model->attributes=$_POST['UserForm'];
			$model->save();
		}
		$model->edit($_GET['i']);
		$this->render('add_user',array('model'=>$model));
	}

	public function actionDelete(){
		$i = $_GET['i'];
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('user_id',$i,TRUE,'=');
		$data = TUser::model()->find($criteria);
		if($data->delete()){
			$this->redirect(Yii::app()->createUrl('admin/user'));
		}else{
			return false;
		}
	}

	public function actionAjax_cek_username(){
		if(Yii::app()->getRequest()->getIsAjaxRequest()) {
			$model = new TUser();
			$criteria = new CDbCriteria();
			$criteria->select = "username";
			$criteria->condition = "username=:username";
			$criteria->params = array(':username'=>$_POST['u']);
			$data = $model->findAll($criteria);
			if (empty($data)){
				$result = array('status'=>true,'value'=>$_POST['u']);
			}else{
				$result = array('status'=>false,'value'=>$_POST['u']);
			}
			echo json_encode($result);
		}
	}

	public function actionAjax_cek_email(){
		if(Yii::app()->getRequest()->getIsAjaxRequest()) {
			$model = new TUser();
			$criteria = new CDbCriteria();
			$criteria->select = "email";
			$criteria->condition = "email=:email";
			$criteria->params = array(':email'=>$_POST['e']);
			$data = $model->findAll($criteria);
			if (empty($data)){
				$result = array('status'=>true,'value'=>$_POST['e']);
			}else{
				$result = array('status'=>false,'value'=>$_POST['e']);
			}
			echo json_encode($result);
		}
	}
}