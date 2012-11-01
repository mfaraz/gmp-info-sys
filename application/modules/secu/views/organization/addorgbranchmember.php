<div class="form_content">
    <header><h3>Add Member</h3></header>
    <div class="module_content">
        <form name="branchform" id="branchform" method="post" action="<?php echo base_url(); ?>secu/organization/doaddmember" onsubmit="return validateMemberForm()">
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Division</label>
                <select name="division" id="division" onchange="filterZones(this.value);" style="width: 300px;">
                    <option value="">Select Division</option>
                    <option value="1" <?php echo ($_POST['division'] == 1)?"selected":""; ?>>Uda Palatha</option>
                    <option value="2" <?php echo ($_POST['division'] == 2)?"selected":""; ?>>Doluwa</option>
                </select>
            </fieldset>
            <fieldset style="width:48%; float:left;">
                <label>Zone</label>
                <select name="zone" id="zone" onchange="filterBranches(this.value, $('#division').val())" style="width: 300px;">
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
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Branch</label>
                <select name="branch" id="branch" onchange="filterOrgs(this.value, $('#division').val(), $('#zone').val())" style="width: 300px;">
                    <option value="">Select Branch</option>
                </select>
            </fieldset>
            <fieldset style="width:48%; float:left;">
                <label>Organization</label>
                <select name="organization" id="organization" style="width: 300px;">
                    <option value="">Select Branch</option>
                </select>
            </fieldset>
            <fieldset style="width:100%; float:left;">
                <label>Member</label>
                <input type="text" name="membername" id="membername" value="" />
            </fieldset>
            <fieldset style="width:100%; float:left;">
                <label>Member Address</label>
                <textarea name="memberaddr" id="memberaddr" cols="50" rows="10"></textarea>
            </fieldset>
            <fieldset style="width:100%; float:left;">
                <label>Member Contact No.</label>
                <input type="text" name="membertel" id="membertel" value="" />
            </fieldset>
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Service Period</label>
                <input type="text" name="memberservice" id="memberservice" value="" style="width: 390px;" />
            </fieldset>
            <fieldset style="width:48%; float:left;">
                <label>Designation</label>
                <input type="text" name="designation" id="designation" value="" style="width: 390px;" />
            </fieldset>
            <fieldset style="width:100%; float:left;">
                <label>Other Info</label>
                <textarea type="text" name="memberotherinfo" id="memberotherinfo" value="" /></textarea>
            </fieldset>
            <fieldset style="width:100%; float:left;">
                <input type="submit" name="submit" id="submit" value="SAVE" />&nbsp;
                <input type="reset" name="reset" id="reset" value="RESET" />
            </fieldset>
            <div class="clear"></div>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
    function validateMemberForm()
    {
        var division = document.getElementById("division");
        var zone = document.getElementById("zone");
        var branch = document.getElementById("branch");
        var org = document.getElementById("organization");
        var orgcat = document.getElementById("orgcat");
        var membername = document.getElementById("membername");
        var memberaddr = document.getElementById("memberaddr");
        var membertel = document.getElementById("membertel");
        var memberservice = document.getElementById("memberservice");
        var designation = document.getElementById("designation");
        var memberotherinfo = document.getElementById("memberotherinfo");

        if(division.selectedIndex == 0)
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
        } else if(org.selectedIndex == 0) {
            alert("Organization is required.")
            org.focus();
            return false;
        } else if(membername.value == "") {
            alert("Member name is required.")
            membername.focus();
            return false;
        } else if(memberaddr.value == "") {
            alert("Member address is required.")
            memberaddr.focus();
            return false;
        } else if(membertel.value == "") {
            alert("Member's contact no is required.")
            membertel.focus();
            return false;
        } else if(memberservice.value == "") {
            alert("Member's service period is required.")
            memberservice.focus();
            return false;
        } else if(designation.value == "") {
            alert("Member's designation is required.")
            designation.focus();
            return false;
        } else {
            return true;
        }
    }
</script>