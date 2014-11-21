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
                                'role'=>'form',
                                'enctype' => 'multipart/form-data'
                            ),
    ));
    echo $form->hiddenField($model,'saveType');
    echo $form->hiddenField($model,'user_created_date');
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
        <?= $form->labelEx($model,'username',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_nama')); ?>
        <div class="col-sm-10" id="username">
            <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username','required'=>'required','maxlength'=>20)); ?>
            <p id="cekUserAvailable" class="form-control-feedback" aria-hidden="true" style="margin-top: 9px;"></p>
            <?php echo $form->error($model,'username'); ?>
        </div>
      </div>
      <?php if($model->saveType=='add'): ?>
        <div class="form-group">
            <?= $form->labelEx($model,'password',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_nama')); ?>
            <div class="col-sm-10">
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password','required'=>'required','maxlength'=>20)); ?>
                <?php echo $form->error($model,'password'); ?>
            </div>
          </div>
      <?php endif; ?>
      <div class="form-group">
        <?= $form->labelEx($model,'fullname',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_tempat_lahir')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model,'fullname',array('class'=>'form-control','placeholder'=>'Fullname','required'=>'required','maxlength'=>50)); ?>
            <?php echo $form->error($model,'fullname'); ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <?= $form->labelEx($model,'email',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_email')); ?>
        <div class="col-sm-10" id="email">
            <?php echo $form->emailField($model,'email',array('class'=>'form-control','placeholder'=>'Email','required'=>'required','maxlength'=>50)); ?>
            <p id="cekEmailAvailable" class="form-control-feedback" aria-hidden="true" style="margin-top: 9px;"></p>
            <?php echo $form->error($model,'email'); ?>
        </div>
      </div>
      
      <div class="form-group">
        <?= $form->labelEx($model,'user_date',array('class'=>'col-sm-2 control-label','for'=>'UserForm_user_date')); ?>
        <div class="col-sm-10">    
            <div class='input-group date' id='datetimepicker2' data-date-format='YYYY/MM/DD'>
                <?php echo $form->textField($model,'user_date',array('class'=>'form-control','placeholder'=>'Date','required'=>'required','readonly'=>true)); ?>
                <?php echo $form->error($model,'user_date'); ?>
                <span class="input-group-addon"><span class="fa fa-calendar" style="margin-top: -13px;"></span>
                </span>
            </div>
        </div>
      </div>
     <div class="form-group">
        <?= $form->labelEx($model,'gender',array('class'=>'col-sm-2 control-label','for'=>'DataManagementForm_email')); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model,'gender',$model->genderOption(),array('empty'=>'Select Gender','class'=>'form-control','placeholder'=>'Gender','required'=>'required'));?>
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
    
    $("#UserForm_username").change(function(){
      if ($("#inputSuccess1Status").length || $("#inputError1Status").length) {
        $("#username span").remove();  
      };
      $('#cekUserAvailable').html('<img src="<?=Yii::app()->theme->baseUrl?>/ico/ajax_loading.gif"/>');
      $.post('<?=  Yii::app()->createUrl('/admin/user/ajax_cek_username') ?>',{u:$('#UserForm_username').val()},function(r){
        var data = $.parseJSON(r);
        var status;
        var value;
        //console.log(data);
        $('#cekUserAvailable').html('');
        if (data.status && data.value!="") {
          userInputField =  '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>'+
                            '<span style="color:green;">Yes ! you can use this username</span>'+
                            '<span id="inputSuccess1Status" class="sr-only">(success)</span>';
          $("button").prop("disabled",false);
        }else{
          $('#UserForm_username').prop('aria-describedby','inputError1Status');
          userInputField =  '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>'+
                            '<span style="color:red;">This username is already used by another</span>'+
                            '<span id="inputError1Status" class="sr-only">(error)</span>';
          $("button").prop("disabled",true);
        }
        $('#UserForm_username').after(userInputField); 
      });
    });

    $("#UserForm_email").change(function(){
      if ($("#inputSuccess2Status").length || $("#inputError2Status").length) {
        $("#email span").remove();  
      };
      $('#cekEmailAvailable').html('<img src="<?=Yii::app()->theme->baseUrl?>/ico/ajax_loading.gif"/>');
      $.post('<?=  Yii::app()->createUrl('/admin/user/ajax_cek_email') ?>',{e:$('#UserForm_email').val()},function(r){
        var data = $.parseJSON(r);
        var status;
        var value;
        //console.log(data);
        $('#cekEmailAvailable').html('');
        if (data.status && data.value!="") {
          emailInputField = '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>'+
                            '<span style="color:green;">You can use this email !</span>'+
                            '<span id="inputSuccess2Status" class="sr-only">(success)</span>';
          $("button").prop("disabled",false);
        }else{
          $('#UserForm_email').prop('aria-describedby','inputError2Status');
          emailInputField = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>'+
                            '<span style="color:red;">This email is already used by another</span>'+
                            '<span id="inputError2Status" class="sr-only">(error)</span>';
          $("button").prop("disabled",true);
        }
        $('#UserForm_email').after(emailInputField); 
      });
    });

</script>