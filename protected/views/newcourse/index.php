<?php
//print_r($hotcourse);exit();
?>
<div class="row">
    <div class="col-xs-12">
        <div id="main_boxslide">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <!--- div profiles--->
                            <div id='mainbox_profile'>
                                <div style="border-left:none;">
                                    <div class="h_profiles">
                                        <h4 style="padding:5px 15px 3px 20px; background:#428bca; border-radius:5px; margin-button:5px; margin-top:5px; color:#fff;">
                                            <span class="glyphicon glyphicon-play">&nbsp;</span>
                                            หลักสูตรการอบรมใหม่</h4></div>
                                    <div style="margin-left:5px;margin-right:5px;">
                                        <div class="row clearfix">
                                            <div class="col-xs-12 column">
                                                    <?php
                                                    $i=0;$num=0;
                                                    $mycount=  count($hotcourse);
                                                    foreach ($hotcourse as $key => $value) {
                                                      $i++;$num++;
                                                       if($key==0){
                                                       ?>
                                                    <div class="row">
                                                     <?php
                                                       }
                                                       if($i==5){
                                                       ?>
                                                      </div><div class="row">
                                                        <?php
                                                       }
                                                      ?>
                                                   <div class="col-md-3">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="thumbnail">
                                                                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/uploads/course/<?= $value['image']; ?>" style="width:100%;height:150px;" alt="...">
                                                                        <div class="caption">
                                                                            <h4><a href="<?php echo Yii::app()->createUrl('course_detail') ?>&id=<?= $value['cu_id']; ?>"><?= cutword::substr_utf8($value['name'], 0, 20); ?></a></h4>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                     <?php     
                                                       if($i==5 ||$mycount==$num){
                                                           if($mycount==$num){
                                                            echo "</div>";    
                                                           }
                                                        $i=0;    
                                                       }
                                                        ?>
                                                       
                                                        <?php
                                                    }
                                                    ?>

                                               
                                                <!--- seccsion --->

                                            </div>
                                          <div class="col-xs-12 column">
                                              <div style="position: relative;display: block;height: 40px;">
                                                  <div style="position: absolute;right: 0px;"><a href="<?=Yii::app()->createUrl('newcourse/listcourse');?>" class="btn btn-info btn-sm" role="button"><i class="glyphicon glyphicon-th-list"></i>&nbsp;หลักสูตรเพิ่มเติม</a></div>   
                                              </div>
                                          </div>          
                                        </div>
                                      
                                    </div>

                                </div>
                                <div style="clear:both;"></div>		  
                            </div> 

                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
        </div> 
    </div>
</div>       