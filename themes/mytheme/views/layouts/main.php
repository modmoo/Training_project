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

        <title><?php echo CHtml::encode($this->pageTitle); ?> </title>
    </head>
    <?php
    $myskin = 'skin-blue';
    if (Yii::app()->user->name == 2) {
        $myskin = 'skin-black';
    }
    ?>
    <body class="<?= $myskin ?>">
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
                            //  array('label' => 'Home', 'url' => array('admin/mainadmin')),
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
                            //   array('label' => 'Home', 'icon' => 'home', 'url' => array('/admin/mainadmin')),
                            // array('label' => '?????????????', 'url' => 'employee/admin', 'icon' => 'fa fa-th', 'bage' => '<small class="badge pull-right bg-yellow">12</small>'),
                            array('label' => 'จัดการหลักสูตรเรียน', 'url' => '#', 'icon' => 'fa fa-laptop', 'items' => array(
                                    array('label' => 'จัดการหลักสูตรเรียน', 'url' => array('admin/course/admin'), 'visible' => Yii::app()->user->isAdmin()),
                                    array('label' => 'เพิ่มหลักสูตรเรียน', 'url' => array('admin/course/create'), 'visible' => Yii::app()->user->isAdmin()),
                                    array('label' => 'หลักสูตรเรียนรอการอณุมัติ', 'url' => array('admin/approval'), 'visible' => Yii::app()->user->isLEADER()),
                                    array('label' => 'คำร้องขอเพิ่มผู้เข้าอบรม', 'url' => array('admin/approval/requestusers'), 'visible' => Yii::app()->user->isLEADER()),
                                    //   array('label' => 'หลักสูตรคงค้าง', 'url' => array('admin/checkCourse/listcourseapproval'),'visible' =>Yii::app ()->user->isAdmin()),
                                    array('label' => 'บันทึกประวัติผู้เรียน', 'url' => array('admin/savehistory/admin'), 'visible' => Yii::app()->user->isAdmin()),
                                )), //,'visible' =>Yii::app ()->user->isAdmin()
                            array('label' => 'พนักงาน', 'icon' => 'fa fa-laptop', 'items', 'url' => array('Leader/employee/admin'), 'visible' => Yii::app()->user->isLEADER()),
                            array('label' => 'จัดการพนักงาน', 'url' => '#', 'icon' => 'fa fa-laptop', 'items' => array(
                                    array('label' => 'จัดการพนักงาน', 'url' => array('admin/employee/admin'), 'visible' => Yii::app()->user->isAdmin()),
                                    //  array('label' => 'พนักงาน', 'url' => array('admin/employee/admin'),'visible' =>Yii::app ()->user->isLEADER()),
                                    array('label' => 'เพิ่มพนักงาน', 'url' => array('admin/employee/create'), 'visible' => Yii::app()->user->isAdmin()),
                                //  array('label' => 'จัดการแผนก', 'url' => array('admin/department/admin'),'visible' =>Yii::app ()->user->isAdmin()),
                                //  array('label' => 'เพิ่มแผนก', 'url' => array('admin/department/create'),'visible' =>Yii::app ()->user->isAdmin()),
                                ), 'visible' => Yii::app()->user->isAdmin()),
                            /* array('label' => 'บริษัท', 'url' => '#', 'icon' => 'fa fa-laptop', 'items' => array(
                              array('label' => 'จัดข้อมูลบริษัท', 'url' => array('admin/company/admin')),
                              array('label' => 'เพิ่มบริษัท', 'url' => array('admin/company/create')),
                              ),'visible' =>Yii::app ()->user->isAdmin()), */
                            array('label' => 'จัดการแผนก', 'url' => '#', 'icon' => 'fa fa-laptop', 'items' => array(
                                    array('label' => 'จัดการแผนก', 'url' => array('admin/department/admin')),
                                    array('label' => 'เพิ่มแผนก', 'url' => array('admin/department/create')),
                                ), 'visible' => Yii::app()->user->isAdmin()),
                            array('label' => 'บริษัทรับจัดอบรม', 'url' => '#', 'icon' => 'fa fa-laptop', 'items' => array(
                                    array('label' => 'จัดการบริษัทรับจัดอบรม', 'url' => array('admin/supprier/admin')),
                                    array('label' => 'เพิ่มบริษัทรับจัดอบรม', 'url' => array('admin/supprier/create')),
                                ), 'visible' => Yii::app()->user->isAdmin()),
                            array('label' => 'ข้อมูลผู้ติดต่อ', 'url' => array('admin/contactus/admin'), 'icon' => 'fa fa-laptop', 'visible' => Yii::app()->user->isAdmin()),
                            array('label' => 'รายงานระบบ', 'url' => '#', 'icon' => 'fa fa-laptop', 'items' => array(
                                    ///  array('label' => 'ข้อมูลการอณุมัติหลักสูตร', 'url' => array('#'),'visible' =>Yii::app ()->user->isLEADER()),
                                    array('label' => 'รายชื่อผู้อบรม', 'url' => array('admin/employee/Exportpdf'), 'visible' => Yii::app()->user->isLEADER()),
                                    array('label' => 'ประวัติ หลักสูตร', 'url' => array('admin/trainingCompleted'), 'visible' => Yii::app()->user->isAdmin()),
                                    array('label' => 'รายชื่อผู้เข้าอบรม', 'url' => array('admin/result_registerlist'), 'visible' => Yii::app()->user->isAdmin()),
                                    array('label' => 'สรุปรายปี', 'url' => array('admin/chartreport'), 'visible' => Yii::app()->user->isAdmin()),
                                    array('label' => 'สรุปหลักสูตร', 'url' => array('admin/report2'), 'visible' => Yii::app()->user->isAdmin()),
                                    array('label' => 'กราฟส4', 'url' => array('admin/report3'), 'visible' => Yii::app()->user->isAdmin())
                                )),
                        //    array('label' => 'Settings', 'url' => '#', 'icon' => 'fa fa-wrench'),
                        //  array('label' => 'Help', 'url' => '#', 'icon' => 'fa fa-file-text'),
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
                <?php Msg::show(); ?>
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