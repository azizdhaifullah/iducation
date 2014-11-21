<div class="bodylogin"> 
<div class="login" align="center">
         <!--  <div class="login-icon">
            <img src="<?= Yii::app()->baseUrl ?>/images/img/login/icon.png" alt="Welcome to Mail App" />
            <h4><small>The Other Way to Study</small></h4>
          </div> -->
          <div class="login-form" style="width:400px;margin-top:50px;">
          <?php
              $form = $this->beginWidget('CActiveForm', array(
                  'id' => 'add-user-form',
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
                <button type="submit"  class="btn btn-primary btn-lg btn-block">Login</button>
              <?php $this->endWidget();?>
          
            <!--<div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="Enter your name" id="login-name"  />
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <a class="btn btn-primary btn-lg btn-block" href="#">Log in</a>
            <a class="login-link" href="#">Lost your password?</a> -->
          </div>
      </div>
  </div>

