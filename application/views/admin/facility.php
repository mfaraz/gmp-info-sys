<?php
$set_txttitle = (set_value('name') == '')?$facilitydetails['Hfacility']:set_value('name');
$set_txtStatus = (set_value('txtStatus') == '')?$facilitydetails['txtStatus']:set_value('txtStatus');
?>
<div class="form_content">
    <header><h3>Add  New Facility</h3></header>
    <div class="module_content">
        <form name="hotelform" id="hotelform"  action="addfac" method="post">
        <fieldset style="width:40%;">
            <label>Facility Name</label>
            <input type="text" name="name" id="name" value="" style="width:92%;">
             <?php echo form_error('name'); ?>
        </fieldset>
        <fieldset style="width:40%;">
            <label style="width: 10%;">Status</label>
            <input <?php echo ($set_txtStatus==1)?"checked":""; ?> type="checkbox" name="txtStatus" value="1" style="width:20%;">
             <?php echo form_error('txtStatus'); ?>
        </fieldset>
         
          <fieldset style="width:38%;padding: 1%;">

            <input type="submit" name="submit" id="submit" value="SAVE" >&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" >
        </fieldset>
<div class="clear"></div>
</form>
    </div>



</div>



