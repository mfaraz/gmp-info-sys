<?php
//print_r($roomtypedetails);
$set_name = (set_value('name') == '')?$roomtypedetails['basictype']:set_value('name');
$set_roomtype = (set_value('roomtype') == '')?$roomtypedetails['roomtype']:set_value('roomtype');
$set_noofbeds = (set_value('noofbeds') == '')?$roomtypedetails['noofbeds']:set_value('noofbeds');
$set_adult = (set_value('adult') == '')?$roomtypedetails['adult']:set_value('adult');
$set_child = (set_value('child') == '')?$roomtypedetails['child']:set_value('child');
$set_childage = (set_value('childage') == '')?$roomtypedetails['childage']:set_value('childage');
$set_extraroom = (set_value('extraroom') == '')?$roomtypedetails['extraroom']:set_value('extraroom');
$set_status = (set_value('status') == '')?$roomtypedetails['status']:set_value('status');
?>
<div class="form_content">
    <header><h3>Add  New Room type for Hotel:::</h3></header>
    <div class="module_content">
        <form name="roomform" id="roomform"  action="<?php echo base_url();?>admin/addroomtype" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
        <fieldset style="width:48%;">
            <label>Room Category Name</label>
            <input type="text" name="name" id="name" value="<?php echo $set_name;?>" style="width:92%;">
             <?php echo form_error('name'); ?>
        </fieldset>
        <fieldset style="width:48%;">
            <label>Room Type </label>
            <select name="roomtype" id="roomtype">
                <option <?php echo ($set_roomtype=="Single")?"selected":"";?> value="Single">Single</option>
                <option <?php echo ($set_roomtype=="Double")?"selected":"";?> value="Double">Double</option>
                <option <?php echo ($set_roomtype=="Triple")?"selected":"";?> value="Triple">Triple</option>
            </select>
             <?php echo form_error('roomtype'); ?>
        </fieldset>
             <fieldset style="width:48%;">
            <label>No of beds</label>
            <select name="noofbeds" id="noofbeds">
                <option value="0">Select</option>
                <?php for($i=0;$i<=10;$i++):?>
                <option <?php echo ($set_noofbeds==$i)?"selected":"";?> value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php endfor;?>

            </select>
             <?php echo form_error('noofbeds'); ?>
        </fieldset>
        <fieldset style="width:48%;">
            <label>No of Adults</label>
            <select name="adult" id="adult">
                <?php for($i=1;$i<=10;$i++):?>
                <option <?php echo ($set_adult==$i)?"selected":"";?> value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php endfor;?>

            </select>
             <?php echo form_error('adult'); ?>
        </fieldset>
            <fieldset style="width:48%;">
            <label>No of Children</label>
            <select name="child" id="child">
                <?php for($i=0;$i<=10;$i++):?>
                <option <?php echo ($set_child==$i)?"selected":"";?> value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php endfor;?>

            </select>
             <?php echo form_error('child'); ?>
        </fieldset>                
           <fieldset style="width:48%;">
            <label>Maximum age allow for children: </label>
            <select name="childage" id="childage">
                <option value="0">Select</option>
                <?php for($i=0;$i<=17;$i++):?>
                <option <?php echo ($set_childage==$i)?"selected":"";?> value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php endfor;?>

            </select>
             <?php echo form_error('childage'); ?>
        </fieldset>
         <fieldset style="width:48%;">
            <label>Extra Room Available: </label>
            <select name="extraroom" id="extraroom">
                <option <?php echo ($set_extraroom=="N")?"selected":"";?> value="N">NO</option>
                <option <?php echo ($set_extraroom=="Y")?"selected":"";?> value="Y">YES</option>
                
            </select>
             <?php echo form_error('extraroom'); ?>
        </fieldset>
         <fieldset style="width:48%;">
            <label>Status: </label>
            <select name="status" id="status">
                <option <?php echo ($set_status==1)?"selected":"";?> value="1">Publish</option>
                <option <?php echo ($set_status==0)?"selected":"";?> value="0">Unpublish</option>

            </select>
             <?php echo form_error('status'); ?>
        </fieldset>
          <fieldset style="width:48%;">

            <input type="submit" name="submit" id="submit" value="SAVE" >&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" >
        </fieldset>
<div class="clear"></div>
</form>
    </div>



</div>



