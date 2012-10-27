<div class="form_content">
    <header><h3>Add Organization Member Details</h3></header>
    <div class="module_content">
        <form name="organizationform" id="organizationform" method="post" action="<?php echo base_url(); ?>secu/organization/doaddreligiousorg" onsubmit="return validateOrganizationForm()">
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
            <label>Organization Name</label>
            <input type="text" name="orgname" id="orgname" value="" />
        </fieldset>
        <fieldset>
            <label>Organization Description</label>
            <textarea name="orgdesc" id="orgdesc" cols="80" rows="10"></textarea>
        </fieldset>
        <fieldset>
            <label>Organization Address</label>
            <textarea name="orgaddress" id="orgaddress" cols="80" rows="10"></textarea>
        </fieldset>
        <fieldset style="width:48%; float:left; margin-right: 3%;">
            <label>Organization Tel.</label>
            <input type="text" name="orgtel" id="orgtel" value="" style="width: 390px;" />
        </fieldset>
        <fieldset style="width:48%; float:left; margin-right: 3%;">
            <label>Organization Fax.</label>
            <input type="text" name="orgfax" id="orgfax" value="" style="width: 390px;" />
        </fieldset>
        <fieldset>
            <label>Other Info.</label>
            <textarea name="orgotherinfo" id="orgotherinfo" cols="50" rows="10"></textarea>
        </fieldset>
        <fieldset>
            <input type="submit" name="submit" id="submit" value="SAVE" />&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" />
        </fieldset>
        <div class="clear"></div>
        </form>
    </div>
</div>