<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
                <!-- <link href='<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css' rel='stylesheet' type='text/css' />-->
        <!-- font Awesome -->
        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
        <!-- Ionicons -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/uploads/favicon.png" />

        <!-- Theme style -->
        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/css/AdminLTE.css' rel='stylesheet' type='text/css' />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">

        </script>
        <title><?php echo CHtml::encode($this->pageTitle); ?> </title>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?= Yii::app()->getHomeUrl(); ?>?r=newcourse/index" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                หน้าหลัก
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
                    <?php
                    // var_dump(Yii::app()->user->checkAccess('admin'));
                    //var_dump(Yii::app()->session['user']);
                    $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions' => array('class' => 'nav navbar-nav'),
                        'encodeLabel' => FALSE,
                        'items' => array(
                        //    array('label' => 'Home', 'url' => array('staff/checkCourse/listcourseapproval')),
                            array('label' => 'เข้าสู่ระบบ', 'url' => array('/login/login'), 'visible' => Yii::app()->user->isGuest), //Yii::app()->user->isGuest
                            array('label' => 'ออกจากระบบ', 'url' => array('/login/logout'), 'visible' => !Yii::app()->user->isGuest)//Yii::app ()->user->isAdmin ()
                        )
                    ));
                    ?>

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
                        //    array('label' => 'Home', 'icon' => 'home', 'url' => array('staff/checkCourse/listcourseapproval')),
                            array('label' => 'รายชื่อหลักสูตรที่ดูแล','icon' => 'fa fa-laptop','url' => array('staff/checkCourse/listcourseapproval')),
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
                <!-- Main content -->
                <section class="content">
                    <?php echo $content; ?> 
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
      <!--  <script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js' type='text/javascript'></script> -->
        <!-- Bootstrap -->
       <!-- <script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js' type='text/javascript'></script>-->
        <!-- AdminLTE App -->
        <script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js' type='text/javascript'></script> 
    </body>
</html>