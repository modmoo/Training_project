<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=1020">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" /> 
        <meta name="description" content="">
        <meta name="author" content="">
        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/front/css/defualt.css' rel='stylesheet' type='text/css' />

        <style type="text/css">
            .navbar-nav>li>a{
                padding: 10px !important;
            }
            .nav>li>a:hover, .nav>li>a:focus {
                text-decoration: none;
                background-color: inherit !important;
            }
            .navbar-nav>li>a.active{
                color: #444 !important;
            }
            .navbar-nav>li>a.active:after {
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 0;
                margin-left: -5px;
                vertical-align: middle;
                content:"";
                border-right: 5px solid transparent;
                border-bottom: 5px solid;
                border-left: 5px solid transparent;
                color: #fff;
            }   
        </style>
		<title><?php echo CHtml::encode($this->pageTitle); ?> </title>
    </head>
    <body>
     <div class="container" style="width:1170px;">
         <div id="boxmain_menu">
         <div class="blog-masthead">
                <?php
                // var_dump(Yii::app()->user->checkAccess('admin'));
               // var_dump(Daycoursetraining::issquestionnow('CU9-201410050004'));exit();
                $ispermision=dataweb::permisionatstaff();
                $this->widget('zii.widgets.CMenu', array(
                    'htmlOptions' => array('class' => 'nav navbar-nav'),
                    'encodeLabel' => FALSE,
                    'items' => array(
                        array('label' => 'หน้าแรก', 'itemOptions' => array('class' => ''), 'linkOptions' => array('class' => 'blog-nav-item'), 'url' => array('newcourse/index'),'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'หน้าแรก', 'itemOptions' => array('class' => ''), 'linkOptions' => array('class' => 'blog-nav-item active'), 'url' => array('main/index'),'visible' =>Yii::app()->user->isGuest),
                        array('label' => 'ข้อมูลส่วนตัว', 'itemOptions' => array('class' => ''), 'linkOptions' => array('class' => 'blog-nav-item'), 'url' => array('mainprofile/index'),'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'เปลี่ยนรหัสผ่าน', 'itemOptions' => array('class' => ''), 'linkOptions' => array('class' => 'blog-nav-item'), 'url' => array('mainprofile/changepassword'),'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'เข้าสู่ระบบหัวหน้าแผนก', 'itemOptions' => array('class' => ''), 'linkOptions' => array('class' => 'blog-nav-item'), 'url' => array('admin/approval'), 'visible' =>Yii::app()->user->isLEADER()), //Yii::app()->user->isGuest 
                        array('label' => 'เข้าสู่ระบบ admin', 'itemOptions' => array('class' => ''), 'linkOptions' => array('class' => 'blog-nav-item'), 'url' => array('admin/course/admin'), 'visible' =>Yii::app()->user->isAdmin()), //Yii::app()->user->isGuest
                        array('label' => 'ส่วนเจ้าหน้าที่', 'itemOptions' => array('class' => ''), 'linkOptions' => array('class' => 'blog-nav-item'), 'url' => array('staff/checkCourse/listcourseapproval'), 'visible' =>$ispermision), 
                        array('label' => 'เกี่ยวกับเรา', 'itemOptions' => array('class' => ''), 'linkOptions' => array('class' => 'blog-nav-item'), 'url' => array('contactus/index')),
                        array('label' =>'ชื่อผู้ใช้ระบบ '.Yii::app()->user->getusername(), 'itemOptions' => array('class' => 'usernamelogin'), 'linkOptions' => array('class' => 'blog-nav-item'),'visible' => !Yii::app()->user->isGuest),
                        array('label' => '<span"><i class="glyphicon glyphicon-off"></i></span>', 'itemOptions' => array('class' => 'logout','title'=>'ออกจากระบบ'), 'linkOptions' => array('class' => 'blog-nav-item'), 'url' => array('/login/logout'),'icon'=>'wrench white', 'visible' => !Yii::app()->user->isGuest)//Yii::app ()->user->isAdmin ()
                    )
                ));
                ?>        
                 <div class="clearfix"></div>
            </div>
           </div>
        </div>

        <!--- ใส่ contentตรงนี้--->
        <div class="container" style="width:1170px;">
            <?= $content; ?> 
            <!---content--->

            <hr class="featurette-divider">
            <!-- FOOTER -->
            <footer align="center" style="border: 1px solid #EAEAEA;border-radius: 5px;padding: 10px;">
                <span id="data_contacts"><b>บริษัท Grad A Company LTD.</b><br>
          123/456 ถนนเจริญนคร แขวงบางลำภูล่าง เขตคลองสาร 10600 <br>
          Tel: 02-456-7890    Fax: 02-456-7880 <br>
          เว็บไซต์นี้เหมาะสำหรับ Chrome และ IE 8+ or Higher on 1024x780 pixel
          </span>
            </footer>
        </div><!-- /.container --> 
        <script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js' type='text/javascript'></script>
    </body>
</html>
