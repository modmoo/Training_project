<div class="row">
    <div class="col-xs-12">
        <div id="main_boxslide">
            <div class="row">
                <div class="col-xs-9">
                    <!-- Carousel============================= -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/slide/k001.jpg" style="height:300px;" alt="First slide">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1>กิจกรรมอบรมการเขียนโปรแกรม JAVA.</h1>
                                       ณ. จังหวัดมุกดาหาร
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/slide/k002.jpg" style="height:300px;" alt="Second slide">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1>กิจกรรมอบรมการเขียนโปรแกรม PHP </h1>
                                         ณ. จังหวัดมุกดาหาร
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/slide/k003.jpg" style="height:300px;" alt="Third slide">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1>กิจกรรมอบรมการเขียนโปรแกรม JAVSCRIPT .</h1>
                                            ณ. จังหวัดมุกดาหาร
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div><!-- /.carousel -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div id="box_new_course">
                                <div class="row">
                                    <?php
                                      foreach ($course as $key => $valuecourse) {
                                          ?>
                                        <div class="col-xs-3">
                                            <div class="box-activity">
                                                <div class="box-imag">
                                                    <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/course/<?= $valuecourse->image ?>"> 
                                                </div>
                                                <div class="box-desc">
                                                    <div class="box-desc-activity">
                                                        <span style="color:#FFF;"><?= $valuecourse->name ?></span> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <?php
                                      }
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
 <div style="height: 433px;
background: #A6A6A6;
padding: 5px;
border: 1px solid #9D99A3;
border-bottom-right-radius: 4px;
border-bottom-left-radius: 4px;">
                     <div id="login-container">
                        <div class="login">
                            <h5>LOGIN</h5>
                            <?php
                            $formlogin = $this->beginWidget('CActiveForm', [
                                'id' => 'login-form',
                                'action' => Yii::app()->createUrl('main/index'),
                                'enableAjaxValidation' => true,
                                'htmlOptions' => [
                                    //  'class' => 'form-horizontal',
                                    'role' => 'form',
                                    "style" => "text-align:center;",
                                ],
                            ]);
                            ?>
                            <?php
                            if ($msg != null) {
                                ?>
                                <div class="alert alert-danger">
                                    <?= $formlogin->errorSummary($modelLoginForm, null, null, [ 'class' => 'alert alert-danger']); ?>
                                </div>
                                <?php
                            }
                            ?>
                            <?= $formlogin->textField($modelLoginForm, 'username', [ 'class' => 'myinput', 'placeholder' => $modelLoginForm->getAttributeLabel('username')]); ?>
                            <?= $formlogin->passwordField($modelLoginForm, 'password', [ 'class' => 'myinput', 'placeholder' => $modelLoginForm->getAttributeLabel('password')]); ?> 
                            <?= CHtml::submitButton('Login', [ 'class' => 'btn btn-primary']); ?>
                            <?php $this->endWidget(); ?>   
                        </div>
                    </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>	
</div><!-- /.container --> 