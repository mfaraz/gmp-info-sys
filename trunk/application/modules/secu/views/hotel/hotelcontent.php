<?php
$set_txtContactName = (set_value('txtContactName') == '')?$hoteldetails['txtContactName']:set_value('txtContactName');
//print_r($lang);
?>
<div class="form_content">
    <header><h3>Add Hotel Contents (Hotel Details Page)</h3></header>
    <div class="module_content">
        <form name="hotelform" id="hotelform"  action="<?php echo base_url(); ?>admin/savehotelcontent" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?> " id="id">
         
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <fieldset style="width:45%; float:left; margin-right: 3%;">
            <label>Location (<?php echo $langval;?>):</label>
            <textarea rows="4" name="location<?php echo $langkey?>" id="location<?php echo $langkey?>" style="width:92%;"><?php  echo $lang["cnt_location_".$id.trim("_".$langkey)] ; ?></textarea>
            </fieldset>
            <?php endforeach;?>
        
           
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <fieldset style="width:45%; float:left; margin-right: 3%;">
            <label>About (<?php echo $langval;?>):</label>
            <textarea rows="4" name="about<?php echo $langkey?>" id="about<?php echo $langkey?>" style="width:92%;"><?php  echo $lang["cnt_about_".$id.trim("_".$langkey)] ; ?></textarea>
           </fieldset>
            <?php endforeach;?>
        
         
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <fieldset style="width:45%; float:left; margin-right: 3%;">
            <label>Accomodation (<?php echo $langval;?>):</label>
            <textarea rows="4" name="accomodation<?php echo $langkey?>" id="accomodation<?php echo $langkey?>" style="width:92%;"><?php  echo $lang["cnt_accomodation_".$id.trim("_".$langkey)] ; ?></textarea>
           </fieldset>
            <?php endforeach;?>
        
         
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <fieldset style="width:45%; float:left; margin-right: 3%;">
            <label>Facilities (<?php echo $langval;?>):</label>
            <textarea rows="4" name="facilities<?php echo $langkey?>" id="facilities<?php echo $langkey?>" style="width:92%;"><?php  echo $lang["cnt_facilities_".$id.trim("_".$langkey)] ; ?></textarea>
           
        </fieldset>
            <?php endforeach;?>
         
          <?php foreach($partnerlang as $langkey=>$langval):?>
            <fieldset style="width:45%; float:left; margin-right: 3%;">
            <label>Excursion (<?php echo $langval;?>):</label>
            <textarea rows="4" name="excursion<?php echo $langkey?>" id="excursion<?php echo $langkey?>" style="width:92%;"><?php  echo $lang["cnt_excursion_".$id.trim("_".$langkey)] ; ?></textarea>
           </fieldset>
            <?php endforeach;?>
        
                 
          <fieldset style="width:42%; float:left; padding: 10px;">

            <input type="submit" name="submit" id="submit" value="SAVE" >&nbsp;
            <input type="reset" name="reset" id="reset" value="RESET" >
        </fieldset>
       </form>
<div class="clear"></div>


      <form enctype="multipart/form-data" id="fupload" method="post" action="<?php echo base_url(); ?>admin/savehotelimages">
          <input type="hidden" name="id" value="<?php echo $id;?> " id="id">
          <a name="img"></a>
          <fieldset style="width:50%; float:left; padding: 10px 0 10px 10px;">
            <input name="userfile" type="file" size="40"/>
            <input type="submit" name="btn_upload" value="Upload &uarr;" class="btnupload"/>
          </fieldset>
            <?php if (isset ($imgerror)) { ?>
            <div class="error"><?php echo $imgerror; ?></div>
            <?php } ?>
          
        </form>
<div class="clear"></div>


<fieldset style="padding: 10px;">
 <?php foreach($imgdetails as  $img) { ?>
        
            <div class="imgbox">
                <a class=""  href="<?php echo base_url(); ?>images/uploads/original/<?php echo $img["image"] ?>">
                <img class="thumb" name="thumb" id="" src="<?php echo base_url(); ?>images/uploads/thumb/thumb_<?php echo $img["image"] ?>"/>
                </a>
                <div>
                    <a class="adel" href="<?php echo base_url()?>admin/deletehotelimage?id=<?php echo $img["id"] ;?>&name=<?php echo $img["image"]; ?>&hid=<?php echo $img["hotelid"]; ?>">
                    <img src="<?php echo base_url(); ?>images/admin/icn_trash.png" title="Trash">delete
                    </a>
                </div>
            </div> 
        
        <?php } ?>
    </fieldset>
        <div class="clear"></div>

    </div>
   


</div>



<script type="text/javascript">
    function changepic(img_src, obj) {
        document["img_tag"].src = img_src;
        var thumbs = document.getElementsByName("thumb");
        for (var i = 0; i < thumbs.length; i++) {
            var tmp_id = "thumb_" + i;
            document.getElementById(tmp_id).setAttribute("class", "thumb");
        }
        document.getElementById(obj).setAttribute("class", "thumbclick");
        var ori_img = img_src.replace("thumb_", "");
        document.getElementById("detimglink").setAttribute("href", ori_img);
    }

    $('a.lightbox').lightBox()
</script>