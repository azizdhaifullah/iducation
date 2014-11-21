  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content=" initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jcarousel.responsive.css">

    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jquery.jcarousel.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/js/jcarousel.responsive.js"></script>

    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
 <body style="background-color:#BDC3C7;">
  <div class="container" >
     <?php echo $content; ?>
  </div>
  </body>
</html>