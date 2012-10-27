<div class="form_content">
    <header><h3>Assign Member to Organization</h3></header>
    <div class="module_content">
        <form name="orgform" id="orgform" method="post" action="<?php echo base_url(); ?>secu/organization/doassignorg" onsubmit="return validateOrgAssignForm()">
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
            <select name="zone" id="zone" onchange="filterBranches(this.value, $('#division').val());">
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
            <label>Branch</label>
            <select name="branch" id="branch">
                <option value="">Select Branch</option>

            </select>
        </fieldset>
        <fieldset>
            <label>Organization Category</label>
            <select name="orgcat" id="orgcat">
                <option value="">Select Category</option>
                <?php
                    foreach ($cat_arr as $cat_entry)
                    {
                ?>
                    <option value="<?php echo $cat_entry['orgcatid']; ?>"><?php echo $cat_entry['orgcatdsc']; ?></option>
                <?php
                    }
                ?>
            </select>
        </fieldset>
        <fieldset>
            <label>Member Name</label>
            <select name="member">
                <option value="">Select Member<option>
                    <?php
                        foreach ($mem_arr as $member_entry)
                        {
                    ?>
                    <option value="<?php echo $member_entry['memberid']; ?>"><?php echo $member_entry['membername']; ?></option>
                    <?php
                        }
                    ?>
            </select>
        </fieldset>
        <fieldset>
            <label>Description</label>
            <textarea name="branch_desc" id="branch_desc" cols="50" rows="10"><?php echo set_value('branch_desc')?></textarea>
        </fieldset>
        <fieldset>
            <input type="submit" name="submit" id="submit" value="SAVE" />&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" />
        </fieldset>
        <div class="clear"></div>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
function validateOrgAssignForm()
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