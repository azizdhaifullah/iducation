<div class="bodylogin"> 
  <div class="login" style="margin-bottom:0px;">
    <div class="login-screen">
      <div class="login-icon">
        <img src="<?= Yii::app()->baseUrl ?>/images/img/logos.png" alt="Welcome to Mail App" />
        <h4>IDucational<small>The Other Way to Study</small></h4>
      </div>
      <div class="login-form" id="button">
        <button id="btn-login" class="btn btn-primary btn-hg btn-block ">Have an account<span class="fui-arrow-right" style="margin-left:92px;"></span></button>       
        <button id="btn-register" class="btn btn-success btn-hg btn-block">Create new account<span class="fui-plus" style="margin-left:59px;"></span></button>
      </div>
      <div class="login-form" id="login">
        <?php
          $form = $this->beginWidget('CActiveForm', array(
              'id' => 'login-form',
              'htmlOptions' => array('class'=>'form-horizontal',
                                      'role'=>'form'
                                  ),
          ));
          ?>
          <?php if(Yii::app()->user->hasFlash('Error')): ?>
            <div class="alert alert-danger" >
                <?php echo Yii::app()->user->getFlash('Error'); ?>
            </div>
          <?php endif; ?>
          <div class="form-group">
            <?= $form->labelEx($model,'username',array('class'=>'login-field-icon fui-user','for'=>'')); ?>
                <?php echo $form->textField($model,'username',array('class'=>'form-control login-field','placeholder'=>'Username','required'=>'required','maxlength'=>20)); ?>
                <?php echo $form->error($model,'username'); ?>
          </div>
          <div class="form-group">
            <?= $form->labelEx($model,'password',array('class'=>'login-field-icon fui-user','for'=>'DataManagementForm_tempat_lahir')); ?>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control login-field','placeholder'=>'Password','required'=>'required','maxlength'=>50)); ?>
                <?php echo $form->error($model,'password'); ?>
          </div>
          <a id="btn-back-login" class="btn btn-success btn-hg "><span class="fui-arrow-left"></span>&nbsp;</a>
          <button type="submit"  class="btn btn-primary btn-hg" style="padding-right: 168px;">Login</button>
          <a class="login-link" href="#">Lost your password?</a>  
          <?php $this->endWidget();?>        
      </div>
      <div class="login-form" id="register">
        <?php
          $form = $this->beginWidget('CActiveForm', array(
              'id' => 'register-form',
              'htmlOptions' => array('class'=>'form-horizontal',
                                      'role'=>'form'
                                  ),
          ));
           echo $form->hiddenField($model2,'saveType');
          ?>
          <?php if(Yii::app()->user->hasFlash('Error')): ?>
            <div class="alert alert-danger" >
                <?php echo Yii::app()->user->getFlash('Error'); ?>
            </div>
        <?php endif; ?>
          <div class="form-group has-feedback">
            <?= $form->labelEx($model2,'username',array('class'=>'login-field-icon fui-user','for'=>'DataManagementForm_nama')); ?>
            <div id="username">
                <?php echo $form->textField($model2,'username',array('class'=>'form-control','placeholder'=>'Username','required'=>'required','maxlength'=>20)); ?>
                <p id="cekUserAvailable" class="form-control-feedback" aria-hidden="true" style="margin-top: 9px;"></p>
                <?php echo $form->error($model2,'username'); ?>
            </div>
          </div>
          <div class="form-group">
            <?= $form->labelEx($model2,'password',array('class'=>'login-field-icon fui-user','for'=>'DataManagementForm_nama')); ?>
            <div>
                <?php echo $form->passwordField($model2,'password',array('class'=>'form-control','placeholder'=>'Password','required'=>'required','maxlength'=>20)); ?>
                <?php echo $form->error($model2,'password'); ?>
            </div>
          </div>         
          <div class="form-group">
            <?= $form->labelEx($model2,'fullname',array('class'=>'login-field-icon fui-user','for'=>'DataManagementForm_tempat_lahir')); ?>
            <div>
                <?php echo $form->textField($model2,'fullname',array('class'=>'form-control','placeholder'=>'Fullname','required'=>'required','maxlength'=>50)); ?>
                <?php echo $form->error($model2,'fullname'); ?>
            </div>
          </div>
          <div class="form-group has-feedback">
            <?= $form->labelEx($model2,'email',array('class'=>'login-field-icon fui-user','for'=>'DataManagementForm_email')); ?>
            <div id="email">
                <?php echo $form->emailField($model2,'email',array('class'=>'form-control','placeholder'=>'Email','required'=>'required','maxlength'=>50)); ?>
                <p id="cekEmailAvailable" class="form-control-feedback" aria-hidden="true" style="margin-top: 9px;"></p>
                <?php echo $form->error($model2,'email'); ?>
            </div>
          </div>
          <div class="form-group">
            <div>    
                <div class='input-group date' id='datetimepicker2' data-date-format='YYYY/MM/DD'>
                    <?php echo $form->textField($model2,'user_date',array('class'=>'form-control','placeholder'=>'Date','required'=>'required','readonly'=>true,'style'=>'color: black;')); ?>
                    <?php echo $form->error($model2,'user_date'); ?>
                    <span class="input-group-addon"><span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
          </div>
          <div class="form-group">
            <?= $form->labelEx($model2,'gender',array('class'=>'login-field-icon fui-user','for'=>'DataManagementForm_email')); ?>
            <div>
                <?php echo $form->dropDownList($model2,'gender',$model2->genderOption(),array('empty'=>'Select Gender','class'=>'form-control','placeholder'=>'Gender','required'=>'required'));?>
                <?php echo $form->error($model2,'gender'); ?>
            </div>
          </div>
          <a id="btn-back-register" class="btn btn-success btn-hg"><span class="fui-arrow-left"></span>&nbsp;</a>
          <button type="submit"  class="btn btn-primary btn-hg" style="padding-right: 2px;">Next Step &nbsp;<span class="fui-arrow-right" style="margin-left: 92px;"></span></button> 
          <?php $this->endWidget();?>        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function () {
        $('#datetimepicker2').datetimepicker({
            language: 'en',
            pickTime: false
        });
    });

  $(document).ready(function() {
    $("#login").hide();
    $("#register").hide();
  });

  $("#btn-login").click(function(){
    $("#register").hide();
    $("#login").slideDown();
    $("#button").slideUp();
  });



  $("#btn-back-login").click(function(){
    $("#register").hide();
    $("#login").slideUp();
    $("#button").slideDown();
    $("input").val("");
  });

  $("#btn-register").click(function(){
    $("#register").slideDown();
    $("#login").hide();
    $("#button").slideUp();
  });

  $("#btn-back-register").click(function(){
    $("#register").slideUp();
    $("#login").hide();
    $("#button").slideDown();
    $("input").val("");
    if ($("#inputSuccess1Status").length || $("#inputError1Status").length) {
        $("#username span").remove();
        $("#register button").prop("disabled",false);  
    }else if ($("#inputSuccess2Status").length || $("#inputError2Status").length) {
        $("#email span").remove(); 
        $("#register button").prop("disabled",false); 
    };
  });

   $("#RegisterForm_username").blur(function(){
      if ($("#inputSuccess1Status").length || $("#inputError1Status").length) {
        $("#username span").remove();
        $("#register button").prop("disabled",false);  
      };
      if ($('#RegisterForm_username').val() != "") {
        $('#cekUserAvailable').html('<img src="<?=Yii::app()->theme->baseUrl?>/ico/ajax_loading.gif"/>');
        $.post('<?=  Yii::app()->createUrl('/admin/user/ajax_cek_username') ?>',{u:$('#RegisterForm_username').val()},function(r){
          var data = $.parseJSON(r);
          var status;
          var value;
          //console.log(data);
          $('#cekUserAvailable').html('');
          if (data.status && data.value!="") {
            userInputField =  '<span class="fui-ok form-control-feedback" aria-hidden="true"></span>'+
                              '<span style="color:green;">Yes ! you can use this username</span>'+
                              '<span id="inputSuccess1Status" class="sr-only">(success)</span>';
            $("#register button").prop("disabled",false);
          }else{
            $('#RegisterForm_username').prop('aria-describedby','inputError1Status');
            userInputField =  '<span class="fui-remove form-control-feedback" aria-hidden="true"></span>'+
                              '<span style="color:red;">This username is already used by another</span>'+
                              '<span id="inputError1Status" class="sr-only">(error)</span>';
            $("#register button").prop("disabled",true);
          }
          $('#RegisterForm_username').after(userInputField); 
        });
      };
    });

    $("#RegisterForm_email").change(function(){
      if ($("#inputSuccess2Status").length || $("#inputError2Status").length) {
        $("#email span").remove(); 
        $("#register button").prop("disabled",false); 
      };
      if ($('#RegisterForm_email').val() != "") {
        $('#cekEmailAvailable').html('<img src="<?=Yii::app()->theme->baseUrl?>/ico/ajax_loading.gif"/>');
        $.post('<?=  Yii::app()->createUrl('/admin/user/ajax_cek_email') ?>',{e:$('#RegisterForm_email').val()},function(r){
          var data = $.parseJSON(r);
          var status;
          var value;
          //console.log(data);
          $('#cekEmailAvailable').html('');
          if (data.status && data.value!="") {
            emailInputField = '<span class="fui-ok form-control-feedback" aria-hidden="true"></span>'+
                              '<span style="color:green;">You can use this email !</span>'+
                              '<span id="inputSuccess2Status" class="sr-only">(success)</span>';
            $("#register button").prop("disabled",false);
          }else{
            $('#RegisterForm_email').prop('aria-describedby','inputError2Status');
            emailInputField = '<span class="fui-remove form-control-feedback" aria-hidden="true"></span>'+
                              '<span style="color:red;">This email is already used by another</span>'+
                              '<span id="inputError2Status" class="sr-only">(error)</span>';
            $("#register button").prop("disabled",true);
          }
          $('#RegisterForm_email').after(emailInputField); 
        });
      };
    });

</script>

