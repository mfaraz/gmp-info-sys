<script type="text/javascript">

 function validateForm()
 {
     var hotelnameuk=document.forms["hotelform"]["hotelnameuk"].value;
     var hotelnamede=document.forms["hotelform"]["hotelnamede"].value;
     var numBeds=document.forms["hotelform"]["numBeds"].value;
     var numStars=document.forms["hotelform"]["numStars"].value;
     var accchecked=document.getElementsByName('accomodation[]');
     var txtContactName=document.forms["hotelform"]["txtContactName"].value;
     var txtPhoneNo=document.forms["hotelform"]["txtPhoneNo"].value;
     var txtFaxNo=document.forms["hotelform"]["txtFaxNo"].value;
     var txtWebAddress=document.forms["hotelform"]["txtWebAddress"].value;
     var txtEmailAddress=document.forms["hotelform"]["txtEmailAddress"].value;
     var facchecked=document.getElementsByName('facility[]');

     if (!hascheckboxes(accchecked))
      {
          alert("Please Select a Accommodation Type");
          accchecked[0].focus();
          return false;
      }
    if (hotelnameuk==null || hotelnameuk=="")
      {
          alert("Please Enter the Hotel Name-English");
          document.getElementById("hotelnameuk").focus();
          return false;
      }
    if(hotelnamede==null || hotelnamede=="")
         {
          alert("Please Enter the Hotel Name-German");
          document.getElementById("hotelnamede").focus();
          return false;
      }
      if (!hascheckboxes(facchecked))
      {
          alert("Please Select Facilities Available");
          facchecked[0].focus();
          return false;
      }
     if(numBeds==null || numBeds=="" || !isNumber(numBeds))
         {
          alert(" Please enter a valid hotel room #");
          document.getElementById("numBeds").focus();
          return false;
      }
       if(numStars==null || numStars=="" || !isNumber(numStars))
         {
          alert(" Please select a star status");
          document.getElementById("numStars").focus();
          return false;
      }
       if(numBeds==null || numBeds=="" || !isEmail(txtEmailAddress))
      {
               alert("Please enter a valid Email");
          document.getElementById("txtEmailAddress").focus();
          return false;
      }
       if(txtContactName==null || txtContactName=="")
         {
          alert(" Please enter a valid Contact name");
          document.getElementById("txtContactName").focus();
          return false;
      }

      if((txtPhoneNo!=""))
      {
             if(!isNumber(txtPhoneNo)|| txtPhoneNo.length>11){
                  alert("Please enter a valid phone no");
                  document.getElementById("txtPhoneNo").focus();
                  return false;
             }

      }
      if ((txtFaxNo!=""))
       {
          if(!isNumber(txtFaxNo)|| txtFaxNo.length>11){
              alert("Please enter a valid fax no");
              document.getElementById("txtFaxNo").focus();
              return false;
          }
        }

       if((txtWebAddress!="" ))
      {
          if(!isURL(txtWebAddress))
              {
                      alert("Please enter a valid Web Address");
                      document.getElementById("txtWebAddress").focus();
                      return false;
              }

      }


 }
</script>
<?php
$set_txtContactName = (set_value('txtContactName') == '')?$hoteldetails['txtContactName']:set_value('txtContactName');
?>
<div class="form_content">
    <header><h3>Edit Hotel</h3></header>
    <div class="module_content">
        <?php //echo validation_errors(); ?>
        <form name="hotelform" id="hotelform"  action="<?php echo base_url(); ?>secu/hotel/updatehotel" method="post"  onsubmit="return validateForm()" >
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

            <select name="numStars" id="numStars" style="width: 220px;">
                <option value="">Select star level</option>
                <?php
                   $strarr=array(0,6,7,8,9,10);
                    foreach($strarr as $i)
                    {
                ?>
                    <option value="<?php echo $i; ?>" <?php echo($i == $hotel_entry['numStars']?"selected":""); ?>><?php echo $i; ?></option>
                <?php
                    }
                ?>
            </select>
        </fieldset>
         <fieldset style="width:28%; float:left;">
            <label>No of rooms allocated</label>
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

            <div style="float: left;width: 300px; margin: 0 0 0 10px;">
            <?php
                $i = 0;
                foreach ($fac_arr as $key=>$fac_entry)
                {
            ?>
                <div>
                <input <?php echo (!empty($fac_entry["checkval"]))?"checked":"";?>  type="checkbox" name="facility[]" value="<?php echo $fac_entry['id']; ?>" /><?php echo $fac_entry['Hfacility']; ?>
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

            <label>Hotel Meal Plans:</label>

            <div style="float: left;width: 300px; margin: 0 0 0 10px;">
            <?php
                $i = 0;
                foreach ($mealplan_arr as $key=>$m_entry)
                {
            ?>
                <div>
                <input  <?php echo (!empty($m_entry["checkval"]))?"checked":"";?> type="checkbox" name="mealplan[]" value="<?php echo $m_entry['id']; ?>" /><?php echo $m_entry['name']; ?>
                </div>
            <?php
                $i++;
                    if ($i == floor(count($mealplan_arr) / 2)) {
                        //we have reached the mid-point, let's close the first DIV
                        echo "</div><div style='float: left;width: 300px; margin: 0 0 0 10px;'>";
                    }

                }
            ?>
            </div>
        </fieldset>
          <fieldset>
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <label>HTML Title tag (<?php echo $langval;?>)</label>
            <input type="text" name="htmltitletag<?php echo $langkey?>" id="titletag<?php echo $langkey?>" value="<?php echo $lang_entry['htmltitletag_' . $langkey];?>" />
        <?php endforeach;?>
         </fieldset>
          <fieldset>
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <label>Meta Description (<?php echo $langval;?>)</label>
            <input type="text" name="metadescription<?php echo $langkey?>" id="metadsc<?php echo $langkey?>" value="<?php echo $lang_entry['metadescription_' . $langkey];?>" />
        <?php endforeach;?>
         </fieldset>
         <fieldset>
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <label>Meta Key Words (<?php echo $langval;?>)</label>
            <input type="text" name="metakeywords<?php echo $langkey?>" id="metakeys<?php echo $langkey?>" value="<?php echo $lang_entry['metakeywords_' . $langkey];?>" />
        <?php endforeach;?>
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
             <?php if($this->session->userdata("admin_usertype")=="superadmin"):?>
          <fieldset>
            <label> Remarks</label>
            <textarea name="remarks" id="remarks"><?php echo $hotel_entry['remarks']; ?></textarea>
        </fieldset>
 <?php endif;?>
       
          <fieldset>

            <input type="submit" name="submit" id="submit" value="UPDATE" >&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" >
        </fieldset>
<div class="clear"></div>
<?php } ?>
</form>
    </div>



</div>



