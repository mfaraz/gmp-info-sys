<?php
$set_txtname = (set_value('txtname') == '')?$mealplandetails['name']:set_value('txtxtname');
$set_txtStatus = (set_value('txtStatus') == '')?$mealplandetails['status']:set_value('txtStatus');
?>
<div class="form_content">
    <header><h3>Post New Accomodation</h3></header>
    <div class="module_content">
        <form name="hotelform" id="hotelform"  action="<?php echo base_url(); ?>secu/mealplan/doeditmealplan" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo  $mealplandetails['id']; ?>" >
        <fieldset style="width:40%;">
            <label>Title</label>
            <input type="text" name="txtname" id="txtname" value="<?php echo $set_txtname; ?>" style="width:92%;">
             <?php echo form_error('txtname'); ?>
        </fieldset>
        <fieldset style="width:40%;">
            <label style="width: 10%;">Status</label>
            <input <?php echo ($set_txtStatus==1)?"checked":""; ?> type="checkbox" name="txtStatus" value="1" style="width:20%;" />
             <?php echo form_error('txtStatus'); ?>
        </fieldset>
         
          <fieldset style="width:38%;padding: 1%;">

            <input type="submit" name="submit" id="submit" value="SAVE" />&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" />
        </fieldset>
<div class="clear"></div>
</form>
    </div>



</div>



