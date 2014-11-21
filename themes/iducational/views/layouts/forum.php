<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
      <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/styles.css" rel="stylesheet">  

   <!--  <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/img/favicon.ico"> -->

          <!-- font Awesome -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/css/AdminLTE.css" rel="stylesheet" type="text/css" />

<!-- Sb admin feature -->
 
<!-- end sb admin feature -->



 <!-- Loading Flat UI -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/forum/dist/css/flat-ui.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jcarousel.responsive.css">

    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jquery.jcarousel.min.js"></script>
   
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jcarousel.responsive.js"></script>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->

<!-- end Flat UI -->
</head>
  
<body >

<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
                      
          
            <!-- sidebar -->
          
          <div class="column col-sm-2 col-xs-1  row-offcanvas" id="sidebar" >
              <ul class="nav">
                <li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
              </ul>
              
               
                <ul class="nav hidden-xs" id="lg-menu">
                    <li class="active"><a href="#featured"><span class="fui-star"></span>&nbsp Popular Forum</a></li>
                    <li><a href="#stories"><span class="fui-new"></span>&nbsp Make a new Thread</a></li>
                    <li><a href="#"><span class="fui-heart"></span>&nbsp Following Forum</a></li>
                    <li><a href="#"><span class="fui-cmd"></span>&nbsp Nothing</a></li>
                </ul>

             
                <!-- sidebar footer -->
               <!--  <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="http://www.bootply.com"><h3>iducation</h3> <i class="glyphicon glyphicon-heart-empty"></i> idu</a>
                    </li>
                </ul> -->
               <!-- /sidebar footer -->

                <!-- tiny only nav-->
              <ul class="nav visible-xs" id="xs-menu">
                    <li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
                    <li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
                    <li><a href="#" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
                    <li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
                </ul>
              
          </div>

            <!-- /sidebar -->
          
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
                
                <!-- top nav -->
                <div class="navbar navbar-green navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>

                    <ul class="nav navbar-nav">  
                        <a href="#" class="navbar-brand logo">id</a>
                    </ul>  

                    </div>

                    <nav class="collapse navbar-collapse" role="navigation">

                    <form class="navbar-form navbar-left">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="fui-search"></span></button>
                          </div>
                        </div>
                    </form>

                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"><span class="fui-home"></span> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i>Post</a>
                      </li>

                    </ul>
            
<!-- dropdown masih error kalo gak konek internet eh udh bener deh sekarang :v -->
                      
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Jane Doe - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                    </ul>
                  </li>
                </ul>
<!-- /dropdown -->

                    </nav> 
                </div>

                <!-- /top nav -->
              
            <div class="padding">
              <div class="full col-sm-9">
        <div id="page-wrapper">
            <?php echo $content; ?>
        </div>
        <!-- /#page-wrapper -->
            </div>
           </div>
      </div> <!-- /Main -->
    </div>
  </div>
</div>
<!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/forum/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/forum/js/scripts.js"></script>

<!-- end script references -->

</body>
</html>
