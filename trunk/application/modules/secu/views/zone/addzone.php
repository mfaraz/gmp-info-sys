<?php
if(strlen($error_msg) > 0) {
    echo "<div class='error'>" . $error_msg . "</div>";
}
?>
<div class="form_content">
    <header><h3>Add Zone</h3></header>
    <div class="module_content">
        <form name="zoneform" id="zoneform" method="post" action="<?php echo base_url(); ?>secu/zone/doaddzone" onsubmit="return validateForm()" >
            <fieldset>
                <label>Division</label>
                <select name="division">
                    <option value="">Select Division</option>
                    <option value="1" <?php echo ($_POST['division'] == 1)?"selected":""; ?>>Uda Palatha</option>
                    <option value="2" <?php echo ($_POST['division'] == 2)?"selected":""; ?>>Doluwa</option>
                </select><br /><?php echo form_error('division'); ?>
            </fieldset>
            <fieldset>
                <label>Zone Name</label>
                <input type="text" name="zone_name" id="zone_name" value="<?php echo set_value('zone_name')?>" /><br /><?php echo form_error('zone_name'); ?>
            </fieldset>
            <fieldset>
                <label>Description</label>
                <textarea name="zone_desc" id="zone_desc" cols="50" rows="10"><?php echo set_value('zone_desc')?></textarea><br /><?php echo form_error('zone_desc'); ?>
            </fieldset>
            <fieldset>
                <input type="submit" name="submit" id="submit" value="SAVE"  >&nbsp;
                <input type="reset" name="reset" id="reset" value="RESET" >
            </fieldset>
            <div class="clear"></div>
        </form>
    </div>



</div>
