<div class="row">
    <div class="col-xs-12">
        <div id="main_boxslide">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">

                            <!--- div profiles--->
                            <div id='mainbox_profile'>
                                <div id='proimg'>
                                    <img src="front/images/111.jpg" >
                                </div>
                                <div id='profile'>
                                    <div class="h_profiles"><h4>รายละเอียด Course</h4></div>
                                    <div style="margin-left:5px;">
                                        <div class="row clearfix">
                                            <div class="col-xs-12 column">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td width="250">
                                                                ID: &nbsp;33333
                                                            </td>
                                                            <td>
                                                                หัวข้อในการอบรม : &nbsp; Office 2013  	
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                ประเภทการอบรม :&nbsp;IT
                                                            </td>
                                                            <td>
                                                                บริษัทผู้จัดการอบรม :&nbsp; Somungsa
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                ลักษณะการอบรม :&nbsp;ภายใน
                                                            </td>
                                                            <td>
                                                             รับสมัครจำนวน : &nbsp; 50 คน
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Trainner: &nbsp; vivi
                                                            </td>
                                                            <td>
                                                                ผู้รับผิดชอบการบรม :&nbsp;Dev.niwath
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                เปิดรับสมัครตั้งแต่: &nbsp; 20-08-2014
                                                            </td>
                                                            <td>
                                                                ถึงวันที่ : &nbsp; 20-09-2014
                                                            </td>

                                                            <td></td>
                                                        </tr>	
                                                        <tr>
                                                            <td>
                                                                วันที่เริ่มทำการอบรม : &nbsp; 29-09-2014
                                                            </td>
                                                            <td>
                                                                ถึงวันที่ : &nbsp; 30-09-2014
                                                            </td>

                                                            <td></td>
                                                        </tr>	
                                                        <tr>
                                                            <td>
                                                             วัตถุประสงค์
                                                            </td>
                                                            <td colspan="2">
                                                                รายละเอียดการอบรม : &nbsp; เป็นการอบรมด้านโปรแกรม office 2014 ตั้งแต่เริ่มต้นถึงขั้น Advance ที่ห้อง501 อาคาร 5 ชั้น 2 ตั้งแต่เวลา 13.00-15.00 น.
                                                            </td> 
                                                        </tr>           
                                                        <tr>
                                                            <td>
                                                              รายละเอียดการอบรม 
                                                            </td>
                                                            <td colspan="2">
                                                              เป็นการอบรมด้านโปรแกรม office 2014 ตั้งแต่เริ่มต้นถึงขั้น Advance ที่ห้อง501 อาคาร 5 ชั้น 2 ตั้งแต่เวลา 13.00-15.00 น.
                                                            </td>
                                                             
                                                        </tr>	
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div style="clear:both;"></div>		  
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                     <?php
                    $this->widget(
                            'booster.widgets.TbTabs', array(
                        'type' => 'tabs', // 'tabs' or 'pills'
                        'tabs' => array(
                            array(
                                'label' => 'สรุปผลการอบรม',
                                'content' =>$this->renderPartial('summarycourse',null, true ),
                                'active' => true
                            ),
                            array(
                                'label' => 'รายชื่อผู้เข้าอบรม',
                                'content' =>$this->renderPartial('listname',null,true ),
                                'active' => false
                                ),
                            
                            array('label' => 'ไฟล์เอกสาร',
                                'content' =>$this->renderPartial('filescourse',null, true ),
                                'active' => false
                                ),
                            array('label' => 'รูปกิจกรรม',
                                'content' =>$this->renderPartial('imagesactivity',null, true ),
                                'active' => false
                                ),
                        ),
                            )
                    );
                    ?>             
                        </div>
                    </div>
 </div><!-- end .row -->
