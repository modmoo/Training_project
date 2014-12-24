<?php

class QuestionresultController extends Controller{
    public function filters() {
        return array(
            'accessControl', 
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('Index','Exportpdf'),
                'users' => array('1','2'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
 public function actionIndex(){
		$this->render('index');
 }
public function actionExportpdf() { 
 $html2pdf = Yii::app()->ePdf->HTML2PDF('P', 'A4', 'fr');
$html2pdf->pdf->SetDisplayMode('fullpage');
//$html2pdf->writeHTML('<page style="font-family:freeserif;width:100%;">นี้คือข้อความภาษาไทย</page>'); 
//$html2pdf->Output('mydoc.pdf');
 //var_dump($this->renderPartial('reports'));
 $data='<page style="font-family:freeserif;text-align:center; width:100%;">'.$this->renderPartial('index', array(), true).'</page>';
// $html2pdf->WriteHTML($this->renderPartial('reports', array(), true));
 $html2pdf->WriteHTML($data);
 $html2pdf->Output();
 
}
}