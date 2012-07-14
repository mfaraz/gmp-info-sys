<?php
$set_txtContactName = (set_value('txtContactName') == '')?$hoteldetails['txtContactName']:set_value('txtContactName');
?>
<div class="form_content">
    <header><h3>Add New Hotel</h3></header>
    <div class="module_content">
        <?php //echo validation_errors(); ?>
        <form name="hotelform" id="hotelform"  action="addhotel" method="post">
         <fieldset>

            <label>Assign Accomodations:</label>

            <div style="float: left;width: 300px; margin: 0 0 0 10px;">
            <?php
                $i = 0;
                foreach ($acc_arr as $key=>$acc_entry)
                {
            ?>
                <div>
                <input type="checkbox" name="accomodation[]" value="<?php echo $acc_entry['id']; ?>" /><?php echo $acc_entry['accdesc']; ?>
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
            
            <input type="text" name="txtContactName" id="txtContactName" value="<?php echo $set_txtContactName; ?>" />
            <?php echo form_error('txtContactName'); ?>
        </fieldset>
        <fieldset>
            <label>Email Address</label>
            <input type="text" name="txtEmailAddress" id="txtEmailAddress" value="" />
             <?php echo form_error('txtEmailAddress'); ?>
        </fieldset>
         <fieldset>
            <label> Postal Address1</label>
            <input type="text" name="paddress1" id="paddress1" value="" />
        </fieldset>
          <fieldset>
            <label> Postal Address2</label>
            <input type="text" name="paddress2" id="paddress2" value="" />
        </fieldset>         
         <fieldset style="width:48%; float:left; margin-right: 3%;">
            <label> Country</label>
            <select name="country" id="country" onchange="getCity(this.value)" style="width: 350px;">
                <option value="0">Select Country</option>
                <?php foreach($country_arr as $country_list) : ?>
                <option value="<?php echo $country_list['country_id']; ?>"><?php echo $country_list['country_name']; ?></option>
                <?php endforeach; ?>
            </select>
         </fieldset>
            <fieldset style="width:48%; float:left;">
            <label> City</label>
            <div id="city_list">
            <select name="city" id="city" style="width: 350px;">
                <option value="0">Select City</option>                
            </select>
            </div>
            <div id="show_city_list"></div>
         </fieldset>
         <!--<fieldset style="width: 30%; float:left;">
            <label>Hotel Type</label>
           <select name="hoteltype" id="hoteltype" style="width: 220px;">
                <option value="0">--select--</option>
                <option value="1">Deluxe</option>
            </select>
        </fieldset>-->
          
         <fieldset style="width:48%; float:left; margin-right: 3%;">
            <label> Phone</label>
            <input type="text" name="txtPhoneNo" id="txtPhoneNo" value="" style="width: 390px;" />
        </fieldset>
        <fieldset style="width:48%; float:left;">
            <label> Fax</label>
            <input type="text" name="txtFaxNo" id="txtFaxNo" value="" style="width: 390px;" />
        </fieldset>
         <fieldset>
            <label> Web</label>
            <input type="text" name="txtWebAddress" id="txtWebAddress" value="" />
        </fieldset>
         <fieldset>
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <label> Hotel Name (<?php echo $langval;?>)</label>
            <input type="text" name="hotelname<?php echo $langkey?>" id="hotelname<?php echo $langkey?>" value="" />
        <?php endforeach;?>
         </fieldset>
        <fieldset style="width:28%; float:left; margin-right: 7%;">
            <label>Post Code</label>
            <input type="text" name="txtPostalCode" id="txtPostalCode" value="" style="width: 190px;" />
        </fieldset>
        <fieldset style="width:28%; float:left; margin-right: 7%;">
            <label>Star status</label>
            <select name="numStars" id="numStars" style="width: 220px;">
                <option value="">Select star level</option>
                <?php
                    for($i = 1; $i <= 10; $i++)
                    {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                    }
                ?>
            </select>
        </fieldset>
         <fieldset style="width:28%; float:left;">
            <label> Total Number of Beds in Hotel</label>
            <input type="text" name="numBeds" id="numBeds" value="" style="width: 190px;" />
        </fieldset>
         
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <fieldset>
            <label>Hotel Description (<?php echo $langval;?>):</label>
            <!--<textarea rows="4" name="txtHdescriptions<?php //echo $langkey?>" id="txtHdescriptions<?php //echo $langkey?>" /></textarea>-->
            <div style="padding: 0 0 0 10px;">
            <?php $this->editorfck->load('txtHdescriptions' . $langkey, '', '95%', 300); ?>
            </div>
            </fieldset>
            <?php endforeach;?>
        
        <fieldset>
            
            <label>Hotel Facilities:</label>
            
            <div style="float: left;width: 300px; margin: 0 0 0 10px;">
            <?php
                $i = 0;
                foreach ($fac_arr as $key=>$fac_entry)
                {
            ?>
                <div>
                <input type="checkbox" name="facility[]" value="<?php echo $fac_entry['id']; ?>" /><?php echo $fac_entry['Hfacility']; ?>
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

            <input type="submit" name="submit" id="submit" value="SAVE" >&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" >
        </fieldset>
<div class="clear"></div>
</form>
    </div>



</div>



