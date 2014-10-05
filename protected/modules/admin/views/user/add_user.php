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
        'enableAjaxValidation' => true,
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
      <div class="form-group">
        <?= $form->labelEx($model,'username',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_nama')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username','required'=>'required','maxlength'=>20)); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
      </div>
      <div class="form-group">
        <?= $form->labelEx($model,'fullname',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_tempat_lahir')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model,'fullname',array('class'=>'form-control','placeholder'=>'Fullname','required'=>'required','maxlength'=>50)); ?>
            <?php echo $form->error($model,'fullname'); ?>
        </div>
      </div>
      <div class="form-group">
        <?= $form->labelEx($model,'email',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_email')); ?>
        <div class="col-sm-10">
            <?php echo $form->emailField($model,'email',array('class'=>'form-control','placeholder'=>'Email','required'=>'required','maxlength'=>50)); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
      </div>
      
      <div class="form-group">
        <?= $form->labelEx($model,'user_date',array('class'=>'col-sm-2 control-label','for'=>'UserForm_user_date')); ?>
        <div class="col-sm-10">    
            <div class='input-group date' id='datetimepicker2' data-date-format='YYYY/MM/DD'>
                <?php echo $form->textField($model,'user_date',array('class'=>'form-control','placeholder'=>'Date','required'=>'required')); ?>
                <?php echo $form->error($model,'user_date'); ?>
                <span class="input-group-addon"><span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
      </div>
     <div class="form-group">
        <?= $form->labelEx($model,'gender',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_email')); ?>
        <div class="col-sm-10">
            <?php 
                echo $form->dropDownList($model,'gender',$model->genderOption,array('empty'=>'Select Gender','class'=>'form-control','placeholder'=>'Gender','required'=>'required'));?>
            <?php echo $form->error($model,'gender'); ?>
        </div>
      </div>
    <div class="well well-sm" style="margin-top:10px;">
        <a class="btn btn-primary" href="<?= Yii::app()->createUrl('admin/user')?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
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
</script>