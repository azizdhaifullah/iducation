<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!-- Core CSS - Include with every page -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/timeline/timeline.css" rel="stylesheet">
    <!-- Page-Level Plugin CSS - Tables -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/DT_bootstrap.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>img/logo.png">

    <style type="text/css">
        #wrapper {
            margin-top: -10px !important;
        }
        .fa {
            line-height: 2 !important ; 
        }
    </style>
</head>
   <!-- Core Scripts - Include with every page -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/moment.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-datetimepicker.min.js"></script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sb-admin.js"></script>
    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/datatables/js/jquery.dataTables.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
     <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/morris/morris.js"></script>
    <script src="<?= Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>
    <script src="<?= Yii::app()->theme->baseUrl; ?>/js/DT_bootstrap.js"></script>
     <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/fancybox/source/jquery.fancybox.pack.js"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/fancybox/source/helpers/jquery.fancybox-media.js"></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
    
<body>

<div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">IDucation admin panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?= Yii::app()->session['username'] ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= Yii::app()->createUrl('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?= Yii::app()->createUrl("admin/Dashboard") ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= Yii::app()->createUrl("admin/User") ?>" class="active"><i class="fa fa-hand-o-right fa-fw"></i>User Table</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::app()->createUrl("admin/Userauth") ?>"><i class="fa fa-hand-o-right fa-fw"></i>User Authentication</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::app()->createUrl("admin/Userdetail") ?>"><i class="fa fa-hand-o-right fa-fw"></i>User Detail</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::app()->createUrl("admin/UserFriend") ?>"><i class="fa fa-hand-o-right fa-fw"></i>User Friend</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::app()->createUrl("admin/UserInterest") ?>"><i class="fa fa-hand-o-right fa-fw"></i>User Interest</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::app()->createUrl("admin/UserSchool") ?>"><i class="fa fa-hand-o-right fa-fw"></i>User School</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::app()->createUrl("admin/UserWork") ?>"><i class="fa fa-hand-o-right fa-fw"></i>User Work</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php echo $content; ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   

</body>
</html>
