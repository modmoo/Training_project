<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
		<!-- <link href='<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.min.css' rel='stylesheet' type='text/css' />-->
        <!-- font Awesome -->
		<link href='<?php echo Yii::app()->theme->baseUrl;?>/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
        <!-- Ionicons -->
		<link href='<?php echo Yii::app()->theme->baseUrl;?>/css/ionicons.min.css' rel='stylesheet' type='text/css' />
        <!-- Theme style -->
		<link href='<?php echo Yii::app()->theme->baseUrl;?>/css/AdminLTE.css' rel='stylesheet' type='text/css' />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <title><?php echo CHtml::encode($this->pageTitle); ?> : AdminLTE</title>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php Yii::app()->createUrl("site/index");?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
               ผู้ดูแลระบบ
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right"> 
		           <?php //var_dump(Yii::app()->user);
                    $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions' => array('class' => 'nav navbar-nav'),
                        'encodeLabel'=>FALSE,
                        'items' => array(
                            array('label' => 'Home', 'url' => array('site/index')),
                            array('label' => 'Dropdown', 'url' => '#', 'itemOptions' => array('class' => 'dropdown messages-menu'), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"), 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                    array('label' => 'You have 4 messages', 'itemOptions' => array('class' => 'header'), 'url' => '#'),
                                    array('label' => '',  'url' => '#', 'submenuOptions' => array('class' => 'menu'),'items' => array(
                                            array('label' => ' <div class="pull-left">
                                                    <img src="/Training_project/themes/mytheme/img/avatar3.png" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>', 'url' => '#'),
                                            
                                        )),
                                    array('label' => 'Show All Messages', 'itemOptions' => array('class' => 'footer'), 'url' => '#')
                                )),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => !Yii::app()->session['user']!=null),//Yii::app()->user->isGuest
                            array('label' => 'Logout', 'url' => array('/site/logout'), 'visible' => Yii::app()->session['user']!=null)
                        )
                    ));
                    ?>
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Jane Doe - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
								 
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                    <!--    <a href="#">Followers</a> -->
                                    </div>
                                    <div class="col-xs-4 text-center">
                                      <!--     <a href="#">Sales</a> -->
                                    </div>
                                    <div class="col-xs-4 text-center">
                                      <!--     <a href="#">Friends</a> -->
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
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                   <?php
                    $this->widget('adminlte.SidebarMenu', array(
                        'items' => array(
                            array('label' => 'Home','icon'=>'home', 'url' => array('/site/index')),
                            array('label' => 'Applications', 'url' => '#', 'icon' => 'fa fa-laptop', 'items' => array(
                                    array('label' => 'Profile', 'url' => '#'),
                                    array('label' => 'Settings', 'url' => '#'),
                                )),
                            array('label' => 'Profile', 'url' => '#', 'icon' => 'fa fa-th', 'bage' => '<small class="badge pull-right bg-yellow">12</small>'),
                            array('label' => 'Settings', 'url' => '#', 'icon' => 'fa fa-wrench'),
                            array('label' => 'Help', 'url' => '#', 'icon' => 'fa fa-desktop'),
                        )
                            )
                    );
                    ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h3>
                        <small>Control panel</small>
                    </h3>
					<!--
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol>-->
                </section>

                <!-- Main content -->
                <section class="content">
                 <?php echo $content; ?> 
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
      <!--  <script src='<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.min.js' type='text/javascript'></script> -->
        <!-- Bootstrap -->
       <!-- <script src='<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js' type='text/javascript'></script>-->
        <!-- AdminLTE App -->
        <script src='<?php echo Yii::app()->theme->baseUrl;?>/js/AdminLTE/app.js' type='text/javascript'></script> 

    </body>
</html>