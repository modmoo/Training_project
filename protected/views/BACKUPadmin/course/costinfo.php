<table id="dataTable" class="table table-bordered">
      <thead>
        <tr>
          <th><INPUT type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
          <th>ค่า</th>
          <th>ราคา</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($cost as $key => $value) {
           ?>
          <tr>
          <td><input type="checkbox" name="chkbox[]"></td>
          <td><?=$value->name?></td>
          <td><input type="text" class="form-control" name="price" value=""></td>
        </tr>
          <?php
           }
        ?>
      </tbody>
    </table> 
<div style="margin-top: 5px;"></div>
<div class="row">
    <div class="col-xs-2">
     <label for="disabledTextInput">ราคารวม</label> 
    </div>
  <div class="col-xs-2">
      <fieldset class="control-group">
       <input class="form-control" id="disabledcostpricesum" type="text" disabled>   
      </fieldset>   
  </div>
  <div class="col-xs-3">
  <button type="button" id="bntcostprice" class="btn btn-success"><span class="glyphicon glyphicon-transfer"></span> คำนวณ</button>
  </div>
</div>


