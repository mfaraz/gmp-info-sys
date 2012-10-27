<div class="form_content">
    <header><h3>Add Organization Member Details</h3></header>
    <div class="module_content">
        <form name="organizationform" id="organizationform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>secu/organization/doaddorganization" onsubmit="return validateOrganizationForm()">
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
            <label>Member Designation</label>
            <input type="text" name="memdesignation" id="memdesignation" value="" />
        </fieldset>
        <fieldset>
            <label>Member Name</label>
            <input type="text" name="memname" id="memname" value="" />
        </fieldset>
        <fieldset>
            <label>Member Address</label>
            <textarea name="memaddress" id="memaddress" cols="50" rows="10"></textarea>
        </fieldset>
        <fieldset style="width:48%; float:left; margin-right: 3%;">
            <label>Member Tel.</label>
            <input type="text" name="memtel" id="memtel" value="" style="width: 390px;" />
        </fieldset>
        <fieldset style="width:48%; float:left;">
            <label>Service Period</label>
            <input type="text" name="memserviceperiod" id="memserviceperiod" value="" style="width: 390px;" />
        </fieldset>
        <fieldset>
            <label>Other Info.</label>
            <textarea name="memotherinfo" id="memotherinfo" cols="50" rows="10"></textarea>
        </fieldset>
        <fieldset>
            <label>Member Photo</label>
            <input type="file" name="memphoto" id="memphoto" />
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
function validateOrganizationForm()
{
    var division = document.getElementById("division");
    var zone = document.getElementById("zone");
    var branch = document.getElementById("branch");
    var orgcat = document.getElementById("orgcat");
    var orgname = document.getElementById("orgname");
    var orgdsc = document.getElementById("orgdsc");
    var orgaddr = document.getElementById("orgaddr");
    var orgtel = document.getElementById("orgtel");
    var orgfax = document.getElementById("orgfax");

    /*if(division.selectedIndex == 0)
    {
        alert("Division is required.")
        division.focus();
        return false;
    } else if(zone.selectedIndex == 0) {
        alert("Zone is required.")
        zone.focus();
        return false;
    } else if(branch.selectedIndex == 0) {
        alert("Branch is required.")
        branch.focus();
        return false;
    } else if(orgcat.selectedIndex == 0) {
        alert("Organization Category is required.")
        orgcat.focus();
        return false;
    } else if(orgname.value == "") {
        alert("Organization is required.")
        orgname.focus();
        return false;
    } else if(orgaddr.value == "") {
        alert("Organization Address is required.")
        orgaddr.focus();
        return false;
    } else {
        return true;
    }*/
}
</script>