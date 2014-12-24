<?php
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/front/sweetalert/sweet-alert.js');
//$cs->registerScriptFile($baseUrl.'/uploadify/myuploadify.js');
$cs->registerCssFile($baseUrl . '/front/sweetalert/sweet-alert.css');
?>
<script type="text/javascript">
 var arrcostprice=[];  
 var costprice=0;
 $(function(){
 $('#bntcostprice').click(function() {
  costprice=0; 
 $('input:checked').each(function () {
        var value= $(this).parent().parent().find("input:eq(1)").val();
        if(!isNaN(value)&&value!=1){
        costprice+=parseInt(value);  
        // arrcostprice.push(value);   
        }
       // alert(typeof value==='undefined');
    });
  $('#disabledcostpricesum').val(formatNumber(costprice));  
   $('#Course_price').val(formatNumber(costprice));  
   $('#pricecourse').val(formatNumber(costprice));   
 // alert(costprice);  
});

 });   
 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
 function formatNumber(number)
{
    var number = number.toFixed(2) + '';
    var x = number.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
</script>
<?php 
//var_dump(dataweb::getlabeltype_user(1));exit();
echo $this->renderPartial('_form', array('model'=>$model,
                                                'supprier'=>$supprier,
                                                'employee'=>$employee,
                                                'cost'=>$cost)); 
?>