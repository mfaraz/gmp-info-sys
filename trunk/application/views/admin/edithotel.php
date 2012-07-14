<?php
$set_txtContactName = (set_value('txtContactName') == '')?$hoteldetails['txtContactName']:set_value('txtContactName');
?>
<div class="form_content">
    <header><h3>Edit Hotel</h3></header>
    <div class="module_content">
        <?php //echo validation_errors(); ?>
        <form name="hotelform" id="hotelform"  action="<?php echo base_url(); ?>admin/updatehotel" method="post">
            <?php foreach($hotel_arr as $hotel_entry) { ?>
            <input type="hidden" name="hotelid" value="<?php echo $hotel_entry['id'];?>" id="id">
        <fieldset>

            <label>Assign Accomodations:</label>

            <div style="float: left;width: 300px; margin: 0 0 0 10px;">
            <?php
                $i = 0;
                foreach ($acc_arr as $key=>$acc_entry)
                {
            ?>
                <div>
                <input <?php echo (!empty($acc_entry["checkval"]))?"checked":"";?> type="checkbox" name="accomodation[]" value="<?php echo $acc_entry['id']; ?>" /><?php echo $acc_entry['accdesc']; ?>
                </div>
            <?php
                $i++;
                    if ($i == floor(count($fac_arr) / 2)) {
                        //we have reached the mid-point, let's close the first DIV
                        echo "</div><div style='float: left;width: 300px; margin: 0 0 0 10px;'>";
                    }

                }
            ?>
            </div>
        </fieldset>
        <fieldset>
            <label>Contact Name</label>
            
            <input type="text" name="txtContactName" id="txtContactName" value="<?php echo $hotel_entry['txtContactName'];?>" />
            <?php echo form_error('txtContactName'); ?>
        </fieldset>
        <fieldset>
            <label>Email Address</label>
            <input type="text" name="txtEmailAddress" id="txtEmailAddress" value="<?php echo $hotel_entry['txtEmailAddress'];?>" />
             <?php echo form_error('txtEmailAddress'); ?>
        </fieldset>
         <fieldset>
            <label> Postal Address1</label>
            <input type="text" name="paddress1" id="paddress1" value="<?php echo $hotel_entry['paddress1'];?>" />
        </fieldset>
          <fieldset>
            <label> Postal Address2</label>
            <input type="text" name="paddress2" id="paddress2" value="<?php echo $hotel_entry['paddress2'];?>" />
        </fieldset>         
         <fieldset style="width:48%; float:left; margin-right: 3%;">
            <label> Country</label>
            <select name="country" id="country" onchange="getCity(this.value)">
                <option value="0">Select Country</option>
                <?php foreach($country_arr as $country_list) : ?>
                <option value="<?php echo $country_list['country_id']; ?>" <?php echo ($hotel_entry['country'] == $country_list['country_id'])?"selected":""; ?>><?php echo $country_list['country_name']; ?></option>
                <?php endforeach; ?>
            </select>
         </fieldset>
            <fieldset style="width:48%; float:left;">
            <label> City</label>
            <div id="city_list">
            <select name="city" id="city">
                <option value="<?php echo $hotel_entry['city']; ?>"><?php echo $hotel_entry['city_name']; ?></option>
                
            </select>
            </div>
            <div id="show_city_list"></div>
         </fieldset>
                   
         <fieldset style="width:48%; float:left; margin-right: 3%;">
            <label> Phone</label>
            <input type="text" name="txtPhoneNo" id="txtPhoneNo" value="<?php echo $hotel_entry['txtPhoneNo']; ?>" style="width: 390px;" />
        </fieldset>
        <fieldset style="width:48%; float:left;">
            <label> Fax</label>
            <input type="text" name="txtFaxNo" id="txtFaxNo" value="<?php echo $hotel_entry['txtFaxNo']; ?>" style="width: 390px;" />
        </fieldset>
         <fieldset>
            <label> Web</label>
            <input type="text" name="txtWebAddress" id="txtWebAddress" value="<?php echo $hotel_entry['txtWebAddress']; ?>" />
        </fieldset>
         <fieldset>
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <label> Hotel Name (<?php echo $langval;?>)</label>
            <?php foreach ($hotel_lang_arr as $lang_entry) : ?>
            <input type="text" name="hotelname<?php echo $langkey?>" id="hotelname<?php echo $langkey?>" value="<?php echo $lang_entry['hotelname_' . $langkey] ?>" />
            <?php endforeach;?>
            <?php endforeach;?>
         </fieldset>
        <fieldset style="width:28%; float:left; margin-right: 7%;">
            <label>Post Code</label>
            <input type="text" name="txtPostalCode" id="txtPostalCode" value="<?php echo $hotel_entry['txtPostalCode']; ?>" style="width: 190px;" />
        </fieldset>
        <fieldset style="width:28%; float:left; margin-right: 7%;">
            <label>Star status</label>
            <input type="text" name="numStars" id="numStars" value="<?php echo $hotel_entry['numStars']; ?>" style="width: 190px;" />
        </fieldset>
         <fieldset style="width:28%; float:left;">
            <label> Total Number of Beds in Hotel</label>
            <input type="text" name="numBeds" id="numBeds" value="<?php echo $hotel_entry['numBeds']; ?>" style="width: 190px;" />
        </fieldset>
            
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <fieldset>
            <label>Hotel Description (<?php echo $langval;?>):</label>
            <div style="padding: 0 0 0 10px;">
            <?php foreach ($hotel_lang_arr as $lang_entry) : ?>
            <?php $this->editorfck->load('txtHdescriptions' . $langkey, $lang_entry['hoteldsc_' . $langkey], '95%', 300); ?>
            <?php endforeach;?>
            </div>
            </fieldset>
            <?php endforeach;?>
        
        <fieldset>
            <label>Hotel Facilities:</label>
            <input type="checkbox" name="facility[]" value="1" <?php echo($facility_arr[0][fid] == 1)?"checked":"";?>>Internet
            <input type="checkbox" name="facility[]" value="2" <?php echo($facility_arr[1][fid] == 2)?"checked":"";?>>24 Hour Reception
            <input type="checkbox" name="facility[]" value="3" <?php echo($facility_arr[2][fid] == 3)?"checked":"";?>>Restaurant
            <input type="checkbox" name="facility[]" value="4" <?php echo($facility_arr[3][fid] == 4)?"checked":"";?>>Bar
            <input type="checkbox" name="facility[]" value="5" <?php echo($facility_arr[4][fid] == 5)?"checked":"";?>>24-Hour Front Desk
            
        </fieldset>
          <fieldset>

            <input type="submit" name="submit" id="submit" value="UPDATE" >&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" >
        </fieldset>
<div class="clear"></div>
<?php } ?>
</form>
    </div>



</div>



