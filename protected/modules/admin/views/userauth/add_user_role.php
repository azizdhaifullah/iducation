<div class="row">
  <div class="col-lg-12">
    <?php if($model->saveType=='add'): ?>
    <h1>Add New Role<small> Tambah Data</small></h1>
    <?php else: ?>
    <h1>Edit Role<small> Edit Data</small></h1>
    <?php endif; ?>
    <ol class="breadcrumb">
      <li><i class="icon-dashboard"></i> Data User Role</a></li>
      <li class="active"><i class="glyphicon glyphicon-file"></i>Tambah Data</li>
    </ol>
  </div>
</div><!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-user-role-form',
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
      <div class="form-group">
        <?= $form->labelEx($model,'user_role_name',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model,'user_role_name',array('class'=>'form-control','placeholder'=>'Role Name','required'=>'required','maxlength'=>15)); ?>
            <?php echo $form->error($model,'user_role_name'); ?>
        </div>
      </div>
      <div class="form-group">
        <?= $form->labelEx($model,'user_role_description',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model,'user_role_description',array('class'=>'form-control','placeholder'=>'Role Description','required'=>'required','maxlength'=>255)); ?>
            <?php echo $form->error($model,'user_role_description'); ?>
        </div>
      </div>
      <div class="well well-sm" style="margin-top:10px;">
          <!-- <a class="btn btn-primary" href="<?= Yii::app()->createUrl('admin/user')?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a> -->
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
    $('.close').click(function(){
      //$.parent.fancybox.close(true);
    });
</script>