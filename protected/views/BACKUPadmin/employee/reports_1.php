<?php
require_once Yii::app()->basePath . '/views/include/connectdb.php';
require_once Yii::app()->basePath . '/views/include/tcpdf/tcpdf.php';
$sql='SELECT cr.approval,cr.time,em.*,cu.name FROM course_register cr LEFT JOIN course cu ON cr.course_id=cu.cu_id LEFT JOIN  employee em ON cr.employee_id=em.idemployee WHERE cr.approval=1  AND em.iddept=1';
$result = mysql_query($sql) or die("mysql_query");
 
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 011');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 011', PDF_HEADER_STRING);
        // set header and footer fonts
        //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margins
        //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setPrintHeader(false);
        //$pdf->setPrintFooter(false);
        //set some language-dependent strings
        //$pdf->setLanguageArray($l);
        // ---------------------------------------------------------
        // set font
        $pdf->SetFont('freeserif', '', 16);
        // add a page
        $pdf->AddPage();

        $tbl_header = '
            <table>
            <thead>
            <tr>
            <td style="border: 1px solid #000000; width: 150px;">รหัส</td>
            <td style="border: 1px solid #000000; width: 300px;">รหัส</td>
            <td style="border: 1px solid #000000; width: 10px;">รหัส</td>
            </tr>
            </thead>
            ';
        $tbl_footer = '</table>';
       // $tbl = '';mysql_fetch_array($result)
        $tbl="";
        while ($row = mysql_fetch_array($result)) {
          $tbl .= '
          <tr>
          <td style="border: 1px solid #000000; width: 150px;">' . $row['idemployee'] . '</td>
          <td style="border: 1px solid #000000; width: 300px;">' .$row['firstname'].'-'.$row['lastname']. '</td>
          <td style="border: 1px solid #000000; width: 10px; text-align:left">' .$row['name'] . '</td>
          </tr>
          ';
        }
        $pdf->Write(0, 'รายผู้เข้าอบรม', '', 0, 'C', true, 0, false, false, 0);
        $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
        $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
        // ---------------------------------------------------------
        //Close and output PDF document
        $pdf->lastPage();
     //   $pdf->Output('Exportpdf.pdf', 'I');
 ?>

<table class="table table-hover">
      <thead>
        <tr>
          <th>รหัส</th>
          <th>ชื่อ - นามสกุล</th>
          <th>หลักสูตร</th>
          <th>วันที่อบรม</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>
 
<?php
//close the connection
mysql_close($dbhandle);
?>
 