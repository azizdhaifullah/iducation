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
        <h1 class="page-header">User Management</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
    <h2>User Table</h2>
    <div class="table-responsive">
      <table id="data" class="table table-bordered table-hover table-striped tablesort">
        <div class="form-inline" align="right" style="margin-bottom:-30px;">
        	<select id="searchField" class="form-control">
				<option value="">--All--</option>
				<option value="user_id">  <?=  $model->getAttributeLabel('user_id')  ?></option>
				<option value="username"> <?=  $model->getAttributeLabel('username') ?></option>
				<option value="password"> <?=  $model->getAttributeLabel('password') ?></option>
				<option value="fullname"> <?=  $model->getAttributeLabel('fullname') ?></option>
				<option value="email">    <?=  $model->getAttributeLabel('email')    ?></option>
				<option value="user_date"><?=  $model->getAttributeLabel('date')     ?></option>
				<option value="gender">   <?=  $model->getAttributeLabel('gender')   ?></option>
		    </select>
		    <div class="form-group" id="input">
		    	<input class="form-control" type="text" id="searchText" disabled="disabled" >
		    </div>
		    <a class="btn btn-default" onClick="$('#data').dataTable().fnDraw();">Search</a>
        </div>
        <thead>
          <tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Date</th>
            <th>Gender</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="form-actions" style="margin-top:10px;">
    	<a data-toggle="modal" href="<?= Yii::app()->createUrl('admin/user/addUser'); ?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</button></a>  
    </div>
  </div>
</div>
<!-- /.row -->
<script type="text/javascript">
$('#searchField').change(function(){
	if($('select[id="searchField"] option:selected').val()=='gender'){
		genderSearchField = '<select id="searchText" class="form-control">'+
							'<option value="">--Select Gender--</option>'+
							'<option value="1">Male</option>'+
							'<option value="2">Female</option>'+
						      '</select>';
		$('#input').html(genderSearchField);
	}else if($('select[id="searchField"] option:selected').val()=='user_date'){
		dateSearchField =	'<div class="form-group date" id="datetimepicker2" data-date-format="YYYY-MM-DD">'+
			                '<input class="form-control" type="text" id="searchText" style="margin-right:-19px;" readonly>' +
			                '<span class="input-addon"><span class="fa fa-calendar" style="margin-right:8px;"></span>' +
			                '</span>'+
			            '</div>';
		$('#input').html(dateSearchField);
		$(function () {
	        $('#datetimepicker2').datetimepicker({
	            language: 'en',
	            pickTime: false
	        });
	    });
	}else if($('select[id="searchField"] option:selected').val()==''){
		$('#input').html('<input class="form-control" type="text" id="searchText" disabled="disabled" >');
	}else{
		$('#input').html('<input class="form-control" type="text" id="searchText" >');
	}
});

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
			aoData.push({"name":"filterBy","value":$('select[id="searchField"] option:selected').val()}
				,{"name":"filterStr","value":$('#searchText').val()});
	      	},
		   "aoColumns": [
				{"bSortable": true,"sName": "user_id"},
				{"bSortable": true,"sName": "username"},				
				{"bSortable": true,"sName": "password"},
				{"bSortable": true,"sName": "fullname"},
				{"bSortable": true,"sName": "email"},
				{"bSortable": true,"sName": "user_date"},
				{"bSortable": true,"sName": "gender"},
				{"bSortable": false,"sName": "action"}
				]
		});
	     /*var htmlSearch = '<select id="searchField" class="form-control">'+
							'<option value="">--Field--</option>'+
							'<option value="1">Username</option>'+
							'<option value="2">Full Name</option>'+
							'<option value="3">Email</option>'+
							'<option value="4">Date</option>'+
							'<option value="5">Gender</option>'+
						      '</select>';
	    $('#data_filter').html('<div style="float:right;visibility:hidden;">'+ htmlSearch +'&nbsp; <input class="form-control" type="text" id="searchText" /> <a class="btn btn-default" id="searchButton" onClick="$("#data").dataTable().fnDraw();"><i class="fa fa-search"></i>Search</a></div>');*/

	    $('.dataTables_paginate ul').attr({
				'class':'dataTables_paginate paging_bootstrap pagination'
			});
</script>
