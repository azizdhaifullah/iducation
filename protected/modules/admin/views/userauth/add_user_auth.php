<style type="text/css">
  .dataTables_processing{
    text-align: center;
    margin-right: 50px;
    font-size: 20px;
    font-family: 'Century Gothic';
  }
</style>
<div class="row">
  <div class="col-lg-12">
    <!-- <h1>Data PNS <small>Data Management</small></h1> -->
    <?php if($model->saveType=='add'): ?>
    <h1>Add New User Authentication<small> Tambah Data</small></h1>
    <?php else: ?>
    <h1>Edit User Authentication<small> Edit Data</small></h1>
    <?php endif; ?>
    <ol class="breadcrumb">
      <li><i class="icon-dashboard"></i> Data User Authentication</a></li>
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
    if ($model->saveType!='add') {
      echo $form->hiddenField($model,'user_id');
    }
    
    $status = ($model->saveType!='add')?true:false;
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
        <?= $form->labelEx($model,'user_id',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model,'user_id',$model->dataSource('user'),array('empty'=>'--Select User--','class'=>'form-control','placeholder'=>'Gender','required'=>'required','disabled'=>$status));?>
            <?php echo $form->error($model,'user_id'); ?>
        </div>
      </div>
      <div class="form-group">
        <?= $form->labelEx($model,'user_role_id',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model,'user_role_id',$model->dataSource('role'),array('empty'=>'--Select Role--','class'=>'form-control','placeholder'=>'Gender','required'=>'required'));?>
            <?php echo $form->error($model,'user_role_id'); ?>
        </div>
      </div>
      <div class="well well-sm" style="margin-top:10px;">
          <a class="btn btn-primary" href="<?= Yii::app()->createUrl('admin/userauth')?>"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
          <?php if($model->saveType=='add'): ?>
          <button type="submit"  class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Save</button>
          <?php else: ?>
          <button type="submit"  class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Edit</button>
          <?php endif; ?>
      </div>
    <?php $this->endWidget();?>
  </div>
</div>
<!-- User Role Table -->
<div class="row">
    <div class="col-lg-12">
    <h2>User Role Table</h2>
    <div class="table-responsive">
      <table id="data" class="table table-bordered table-hover table-striped tablesort">
        <div class="form-inline" align="right" style="margin-bottom:-30px;">
          <select id="searchField" class="form-control">
            <option value="">--All--</option>
            <option value="user_role_id">  <?=  $model->getAttributeLabel('user_role_id')  ?></option>
            <option value="user_role_name">  <?=  $model->getAttributeLabel('user_role_name')  ?></option>
            <option value="user_role_description"> <?=  $model->getAttributeLabel('user_role_description') ?></option>
          </select>
          <div class="form-group" id="input">
            <input class="form-control" type="text" id="searchText" disabled="disabled" >
          </div>
          <a class="btn btn-default" onClick="$('#data').dataTable().fnDraw();">Search</a>
        </div>
        <thead>
          <tr>
            <th>User Role ID</th>
            <th>User Role Name</th>
            <th>User Role Description</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="form-actions" style="margin-top:10px;">
      <a class="addRole btn btn-primary" href="<?= Yii::app()->createUrl('admin/userAuth/addRole'); ?>"><span class="glyphicon glyphicon-plus"></span> Add</a>  
    </div>
  </div>
</div>
<script type="text/javascript">
$('#searchField').change(function(){
  if($('select[id="searchField"] option:selected').val()==''){
    $('#input').html('<input class="form-control" type="text" id="searchText" disabled="disabled" >');
  }else{
    $('#input').html('<input class="form-control" type="text" id="searchText" >');
  }
});

    $(function () {
        $('#datetimepicker2').datetimepicker({
            language: 'en',
            pickTime: false
        });
    });

    $(document).ready(function() {
      $(".addRole").fancybox({
        type: 'ajax',
        maxWidth  : 600,
        maxHeight : 400,
        fitToView : false,
        autoSize  : false,
        openEffect  : 'elastic',
        closeEffect : 'elastic'
      });
    });

   $(document).ready(function() {
      $(".editRole").fancybox({
        type: 'ajax',
        maxWidth  : 600,
        maxHeight : 400,
        fitToView : false,
        autoSize  : false,
        openEffect  : 'elastic',
        closeEffect : 'elastic'
      });
    });

   $()

    var oTable = $('#data').dataTable({
        "sDom": "<'row'<'col-lg-6'l><'col-lg-12'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
          "sLengthMenu": "_MENU_ records per page"
        },
        "bProcessing": true,
        "sAjaxSource": '<?= Yii::app()->baseUrl . '/' . $this->module->id . '/' .$this->id . '/' . $this->action->id  ?>',
        "bServerSide": true,
        "sServerMethod": "POST",
        "bFilter": false,
        "fnServerData": function ( sSource, aoData, fnCallback,oSettings ) {
          oSettings.jqXHR = $.ajax({
          "dataType": 'json',
          "type": "POST",
          "url": sSource,
          "data": aoData,        
          "success": function(data){  
        fnCallback(data);
        if(data.hasError){
            parent.$.fancybox.open([
            {      
          content : data.htmlError,
          afterClose : function(){
              if(data.returnUrl!=undefined && data.returnUrl!=''){
            location.href =  data.returnUrl;
              }
          }
            }])
        }
          }
      })
        },
         "fnServerParams": function ( aoData ) {
          aoData.push({"name":"filterBy","value":$('select[id="searchField"] option:selected').val()},
                  {"name":"filterStr","value":$('#searchText').val()});
          },
       "aoColumns": [
        {"bSortable": true,"sName": "user_role_id"},
        {"bSortable": true,"sName": "user_role_name"},
        {"bSortable": true,"sName": "user_role_description"},       
        {"bSortable": false,"sName": "action"}
        ]
    });
    
    $('.dataTables_paginate ul').attr({
        'class':'dataTables_paginate paging_bootstrap pagination'
      });
</script>