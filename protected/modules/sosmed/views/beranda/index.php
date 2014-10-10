<div class="row" >
  
    <nav class="navbar navbar-inverse navbar-embossed" role="navigation">

      <div class="navbar-header" style="">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01" >
          <span class="sr-only">Toggle navigation</span>
        </button>
       <a class="navbar-brand" href="#">&nbsp</a>

      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse-01"  style="background-color:#27AE60;">
        <ul class="nav navbar-nav navbar-left">
          <li><a data-toggle="modal" data-target="#myModal"><span class="fui-user"></span></a></li>
          <li><a href="#fakelink"><span class="fui-home"></span></a></li>
          <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fui-document"></span></a></li>
          <li><a href="#fakelink"><div><img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/img/icons/svg/book.svg" alt="Book" style="width:25px;"></div></a></li>
                   <!-- Button trigger modal -->
          <li>
          <form class="navbar-form navbar-right" action="#" role="search">
            <div class="form-group">
              <div class="input-group">
                <input class="fouuawrm-control" id="navbarInput-01" type="search" placeholder="Search" style="width:500px;background-color:#ECF0F1;" >
                <span class="input-group-btn">
                  <button type="submit" class="btn" style="background-color:#ECF0F1;" ><span class="fui-search"></span></button>
                </span>
              </div>
            </div>
          </form>
          </li>
         </ul>  
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
      </div><!-- /.navbar-collapse -->
    </nav><!-- /navbar -->
  
</div> <!-- /row -->
<div class="container" >
   <h3>Most Popular Forums</h3>
    <div class="col-xs-12 col-md-12 col-lg-12" style="margin-left:50px;">
      <div class="popular-forum-backbackground">
        <center>
          <div class="transparent" align="center">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/img/demo/browser-pic-5.jpg" height="50%">
            <p>Test</p>
          </div>
        </center>
      </div>
      <div class="popular-forum-backbackground">
        <center>
          <div class="transparent" align="center">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/img/demo/browser-pic-5.jpg" height="50%">
            <p>Test</p>
          </div>
        </center>
      </div>
    </div>
  &nbsp;
  <div class="jcarousel-wrapper">
      <div class="jcarousel">
          <ul>
              <li><a href="home"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/img/demo/browser-pic-1.jpg" alt="" /></a></li>
              <li><a href="home"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/img/demo/browser-pic-2.jpg" alt="" /></a></li>
              <li><a href="home"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/img/demo/browser-pic-3.jpg" alt="" /></a></li>
              <li><a href="home"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/img/demo/browser-pic-4.jpg" alt="" /></a></li>
              <li><a href="home"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/img/demo/browser-pic-5.jpg" alt="" /></a></li>
              <li><a href="home"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/Flat/docs/assets/img/demo/browser-pic-6.jpg" alt="" /></a></li>
                
          </ul>
      </div>
      <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
      <a href="#" class="jcarousel-control-next">&rsaquo;</a>
      <p class="jcarousel-pagination"></p>
  </div>
</div>