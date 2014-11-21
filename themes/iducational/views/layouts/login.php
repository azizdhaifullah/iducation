<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Loading Bootstrap -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jquery.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/moment.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-datetimepicker.min.js"></script>
  </head>
 <body>
 <?php echo $content; ?>
 </body>
</html>