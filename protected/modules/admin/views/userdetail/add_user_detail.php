<style type="text/css">
  #cekUserAvailable{

  }
</style>
<div class="row">
  <div class="col-lg-12">
    <!-- <h1>Data PNS <small>Data Management</small></h1> -->
    <?php if($model->saveType=='add'): ?>
    <h1>Add New User<small> Tambah Data</small></h1>
    <?php else: ?>
    <h1>Edit User<small> Edit Data</small></h1>
    <?php endif; ?>
    <ol class="breadcrumb">
      <li><i class="icon-dashboard"></i> Data User</a></li>
      <li class="active"><i class="glyphicon glyphicon-file"></i>Tambah Data</li>
    </ol>
  </div>
</div><!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-user-form',
        'enableClientValidation'=>false,
        'htmlOptions' => array('class'=>'form-horizontal',
                                'role'=>'form'
                            ),
    ));
    echo $form->hiddenField($model,'saveType');
    ?>
    <?php if(Yii::app()->user->hasFlash('Succes')): ?>
        <div class="alert alert-info" >
            <?php echo Yii::app()->user->getFlash('Succes'); ?> 
        </div>
    <?php endif; ?>
    <?php if(Yii::app()->user->hasFlash('Error')): ?>
        <div class="alert alert-danger" >
            <?php echo Yii::app()->user->getFlash('Error'); ?>
        </div>
    <?php endif; ?>
      <div class="form-group has-feedback">
        <?= $form->labelEx($model,'user_id',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_nama')); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model,'user_id',$model->dataSource('user'),array('empty'=>'Select Gender','class'=>'form-control','placeholder'=>'Gender','required'=>'required'));?>
            <?php echo $form->error($model,'user_id'); ?>
        </div>
      </div>
      <div class="form-group" id="upload">
        <?= $form->labelEx($model,'mypicture',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_nama')); ?>
        <div class="col-sm-10">
            <?php if($model->saveType=='add'): ?>
            <img onclick="jQuery('#User_detailForm_mypicture').trigger('click');" src="<?= Yii::app()->request->baseUrl; ?>/images/img/Icon-user.png">
            <?php else: ?>
            <img onclick="jQuery('#User_detailForm_mypicture').trigger('click');" src="<?= Yii::app()->request->baseUrl.$model->mypicture; ?>">
            <?php endif; ?>
            <?php echo $form->fileField($model,'mypicture',array('class'=>'form-control','accept'=>'image/*','required'=>'required','style'=>'visibled:false;')); ?>
            <?php echo $form->error($model,'mypicture'); ?>
        </div>
      </div>
      <div class="form-group">
        <?= $form->labelEx($model,'bio',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_email')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model,'bio',array('class'=>'form-control','placeholder'=>'Bio','required'=>'required'));?>
            <?php echo $form->error($model,'bio'); ?>
        </div>
      </div>
      <div class="form-group">
        <?= $form->labelEx($model,'phone',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_tempat_lahir')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model,'phone',array('class'=>'form-control','placeholder'=>'Phone','required'=>'required','maxlength'=>50)); ?>
            <?php echo $form->error($model,'phone'); ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <?= $form->labelEx($model,'address',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_email')); ?>
        <div class="col-sm-10">
            <?php echo $form->emailField($model,'address',array('class'=>'form-control','placeholder'=>'Address','required'=>'required','maxlength'=>50)); ?>
            <?php echo $form->error($model,'address'); ?>
        </div>
      </div>
      <div class="form-group">
        <?= $form->labelEx($model,'religion',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">    
            <div class='input-group date' id='datetimepicker2' data-date-format='YYYY/MM/DD'>
                <?php echo $form->textField($model,'religion',array('class'=>'form-control','placeholder'=>'Religion','required'=>'required','readonly'=>true)); ?>
                <?php echo $form->error($model,'religion'); ?>
                <span class="input-group-addon"><span class="fa fa-calendar" style="margin-top: -13px;"></span>
                </span>
            </div>
        </div>
      </div>
      <div class="form-group">
        <?= $form->labelEx($model,'aboutme',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_email')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model,'aboutme',array('class'=>'form-control','placeholder'=>'About Me','required'=>'required'));?>
            <?php echo $form->error($model,'aboutme'); ?>
        </div>
      </div>
      <div class="well well-sm" style="margin-top:10px;">
          <a class="btn btn-primary" href="<?= Yii::app()->createUrl('admin/userdetail')?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
          <?php if($model->saveType=='add'): ?>
          <button type="submit"  class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Save</button>
          <?php else: ?>
          <button type="submit"  class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Edit</button>
          <?php endif; ?>
      </div>
    <?php $this->endWidget();?>
  </div>
</div>
<script type="text/javascript">
    $(function () {
      $('#datetimepicker2').datetimepicker({
          language: 'en',
          pickTime: false
      });
    });

   /* $(document).ready(function(){
      $("#User_detailForm_mypicture").hide();
    });*/

    $('#User_detailForm_mypicture').change(function(){
      
    });


</script>