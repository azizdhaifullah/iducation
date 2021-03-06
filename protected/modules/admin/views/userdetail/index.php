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
        <h1 class="page-header">User Detail Management</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
    <h2>User Detail Table</h2>
    <div class="table-responsive">
      <table id="data" class="table table-bordered table-hover table-striped tablesort">
        <div class="form-inline" align="right" style="margin-bottom:-30px;">
        	<select id="searchField" class="form-control">
				<option value="">--All--</option>
				<option value="username"> <?=  $model->getAttributeLabel('user_detail_id') ?></option>
				<option value="user_id">  <?=  $model->getAttributeLabel('user_id')  ?></option>
				<option value="fullname"> <?=  $model->getAttributeLabel('phone') ?></option>
				<option value="email">    <?=  $model->getAttributeLabel('address')    ?></option>
				<option value="user_date"><?=  $model->getAttributeLabel('religion')     ?></option>
				<option value="gender">   <?=  $model->getAttributeLabel('aboutme')   ?></option>
		    </select>
		    <div class="form-group" id="input">
		    	<input class="form-control" type="text" id="searchText" disabled="disabled" >
		    </div>
		    <a class="btn btn-default" onClick="$('#data').dataTable().fnDraw();">Search</a>
        </div>
        <thead>
          <tr>
            <th>UserDetailID </th>
            <th>UserID</th>
            <th>My Picture</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Religion</th>
            <th>About Me</th>          
            <th>Action</th>          
           </tr>
        </thead>
      </table>
    </div>
    <div class="form-actions" style="margin-top:10px;">
    	<a data-toggle="modal" href="<?= Yii::app()->createUrl('admin/userdetail/add'); ?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</button></a>  
    </div>
  </div>
</div>
<!-- /.row -->
<script type="text/javascript">
$('#searchField').change(function(){
	if($('select[id="searchField"] option:selected').val()==''){
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
				{"bSortable": true,"sName": "user_detail_id"},				
				{"bSortable": true,"sName": "user_id"},
				{"bSortable": false,"sName": "mypicture"},
				{"bSortable": true,"sName": "phone"},
				{"bSortable": true,"sName": "address"},
				{"bSortable": true,"sName": "religion"},
				{"bSortable": true,"sName": "aboutme"},
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
