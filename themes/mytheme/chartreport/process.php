<?php
    @session_start();
    include "dbconnect.php";
    $begdate = date('Y-m-d');
    $birdate = date('Y-m-d',strtotime($_POST["empbirth"]));
    if (isset($_POST["insert"])){
        $sel = mysql_query("SELECT * FROM employees WHERE pernr = '".$_POST["empid"]."';",$db);
        $row=mysql_fetch_array($sel);
        if ($row){            
            echo "Duplicate Record Employee ID : ";
            echo ($row['pernr']);            
 			echo "<meta http-equiv='refresh' content='5; URL=index.php' >";
        }else {
            $result = mysql_query("INSERT INTO employees
                                        (pernr,
                                         orgeh,
                                         orgid,
                                         fname,
                                         lname,
                                         gender,
                                         birthdate,
                                         begda,
                                         endda
                                        ) 
                                    VALUES 
                                        ('".$_POST["empid"]."',
                                        '".$_POST["orgid"]."',
                                        '".$_POST["orgid"]."',
                                        '".$_POST["empfname"]."',
                                        '".$_POST["emplname"]."',
                                        '".$_POST["empgender"]."',
                                        '".$birdate."',
                                        '".$begdate."',
                                        '9999-12-31'
                                        );",$db);
            if($result){
    			echo "Insert new record";            
    			echo "<meta http-equiv='refresh' content='5; URL=index.php' >";
    		}else {
    			echo "Can't to insert";
    			echo "<meta http-equiv='refresh' content='5; URL=index.php' >";
    		}                                                     
        }                                           
    }
    if (isset($_POST["delete"])){
        $sel = mysql_query("SELECT * FROM employees WHERE pernr = '".$_POST["empid"]."';",$db);
        $row = mysql_fetch_array($sel);
        if ($row){
            $result = mysql_query("DELETE FROM employees WHERE pernr = '".$_POST["empid"]."';",$db);
            echo "Record Delete Employee : ".$_POST["empid"]." ".$row['fname']." ".$row['lname'];
    		echo "<meta http-equiv='refresh' content='3; URL=index.php' >";
        }else{
            echo "Record Not Found";
            echo "<meta http-equiv='refresh' content='3; URL=index.php' >";
        }
    }
?>