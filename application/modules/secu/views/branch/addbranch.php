<?php
if(strlen($error_msg) > 0) {
    echo "<div class='error'>" . $error_msg . "</div>";
}
?>
<div class="form_content">
    <header><h3>Add Branch</h3></header>
    <div class="module_content">
        <form name="branchform" id="branchform" method="post" action="<?php echo base_url(); ?>secu/branch/doaddbranch" onsubmit="return validateBranchForm()">
        <fieldset>
            <label>Division</label>
            <select name="division" id="division" onchange="filterZones(this.value);">
                <option value="">Select Division</option>
                <option value="1" <?php echo ($_POST['division'] == 1)?"selected":""; ?>>Uda Palatha</option>
                <option value="2" <?php echo ($_POST['division'] == 2)?"selected":""; ?>>Doluwa</option>
            </select>
        </fieldset>
        <fieldset>
            <label>Zone</label>
            <select name="zone" id="zone">
                <option value="">Select Zone</option>
                <?php
                    foreach ($zones as $zone) :
                ?>
                <option value="<?php echo $zone['zoneid']; ?>"><?php echo $zone['zonename']; ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </fieldset>
        <fieldset>
            <label>Branch Name</label>
            <input type="text" name="branch_name" id="branch_name" value="<?php echo set_value('branch_name')?>" />
        </fieldset>
        <fieldset>
            <label>Description</label>
            <textarea name="branch_desc" id="branch_desc" cols="50" rows="10"><?php echo set_value('branch_desc')?></textarea>
        </fieldset>
        <fieldset style="height: 10px; background-color: #DDDDDD;"> <label>Religions</label></fieldset>
        
        <?php
            foreach ($populationcat_arr as $key=>$population_cat_entry) :
        ?>
            <fieldset style="width:5%; float:left; margin-right: 2%;">
                <label><?php echo $population_cat_entry['populationcatdesc']; ?></label>
                <input type="text" name="<?php echo $population_cat_entry['populationid']; ?>_<?php echo $population_cat_entry['populationcatdesc']; ?>" id=<?php echo $population_cat_entry['populationcatdesc']; ?>" value="" style="width: 150px;" />
            </fieldset>
        <?php            
            endforeach;           
        ?>
        
        <fieldset style="width:100%; float:left;">
            <input type="submit" name="submit" id="submit" value="SAVE" />&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" />
        </fieldset>
        <div class="clear"></div>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
function validateBranchForm()
{
    var division = document.getElementById("division");
    var zone = document.getElementById("zone");
    var branch_name = document.getElementById("branch_name");
    var branch_desc = document.getElementById("branch_desc");

    if(division.selectedIndex == 0)
    {
        alert("Division is required.")
        division.focus();
        return false;
    } else if(zone.selectedIndex == 0) {
        alert("Zone is required.")
        zone.focus();
        return false;
    } else if(branch_name.value == "") {
        alert("Branch is required.")
        branch_name.focus();
        return false;
    } else {
        return true;
    }
}
</script>