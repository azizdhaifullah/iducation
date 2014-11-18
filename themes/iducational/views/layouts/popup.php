<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Loading Bootstrap -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.10.2.js"></script>
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
  </head>
  <body>

   <?php echo $content; ?>

  </body>
</html>