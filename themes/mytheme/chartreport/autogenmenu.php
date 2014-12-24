<?php
    include "dbconnect.php";
    $sql = "SELECT * FROM menus";
    $ret = mysql_query($sql,$db);
    while($row = mysql_fetch_array($ret)){
        if ($row['associate'] == NULL){
            echo '<li name="'.$row['menu_text'].'">';
			echo '<a href="javascript:;">';
			echo '<i class="'.$row['icon'].'"></i>';
			echo '<span class="title">'.$row['menu_text'].'</span>';
			echo '<span class="arrow"></span>';
			echo '</a>';
            $selsub = "SELECT * FROM menus WHERE associate = ".$row['menu_id'];
            $getchk = mysql_query($selsub,$db);
            $getsub = mysql_query($selsub,$db);            
            $chk = mysql_fetch_array($getchk);
            if ($chk){
                echo '<ul class="sub-menu">';
                while ($rowsub = mysql_fetch_array($getsub)){
                    if ($rowsub){                        
                        echo '<li name="'.$rowsub['menu_text'].'">';
                        echo '<a href="index.php?menu='.$rowsub['menu_id'].'">';
                        echo '<i class="'.$rowsub['icon'].'"></i>';
                        echo $rowsub['menu_text'].'</a>';
                        echo '</li>';                        
                    }
                }
                echo '</ul>';
            }
            echo '</li>';
        }
    }
?>