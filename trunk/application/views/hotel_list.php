<div id="main-banner"><img src="<?php echo base_url(); ?>images/accomodation_main.jpg" height="320" width="595"></div>
    <div id="breadcrumbs"><?php echo $breadcrumb; ?></div>
    <div class="left" id="search_box"><span class="select-beach">Refine Search</span>
      <select class="select-beach" size="1" name="D1">
		<option selected="selected">Beach Selection</option>
		<option>Boutique Hotels</option>
		<option>Beach Villas</option>
		</select>
        <select class="sort-accom" size="1" name="D1">
		<option>Sort by Accommodation Name</option>
		</select></div>

<div>
    <?php 
        //print_r($hoteldetailarray);
        //$fac_cls = "";
        foreach ($hoteldetailarray as $hotel_arr) :
            foreach ($hotelfacilityarray[$hotel_arr['hotelid']] as $fac_arr) :
                switch($fac_arr['Hfacility']) {
                    case "Sunbath" :
                        $fac_cls = "<div class='facility_sunbath'></div>";
                        break;
                    case "Restaurant" :
                        $fac_cls .= "<div class='facility_restaurant'></div>";
                        break;
                    case "Bar" :
                        $fac_cls .= "<div class='facility_bar'></div>";
                        break;
                    case "Kidspark" :
                        $fac_cls .= "<div class='facility_kidspark'></div>";
                        break;
                    case "Rafting" :
                        $fac_cls .= "<div class='facility_rafting'></div>";
                        break;
                    case "Swimpool" :
                        $fac_cls .= "<div class='facility_swimpool'></div>";
                        break;
                }
            endforeach;
    ?>
  <div id="accom_thumb">
      <p><img src="<?php echo base_url(); ?>images/uploads/thumb/thumb_<?php echo $hotel_arr['image']; ?>" class="acco_thumb_img" height="80" width="100"></p>
     <!--<p>Price : $650<br>
       (per night)</p>-->
   </div>
   <div id="accom_detail_box">
     <p><strong><?php echo $hotel_arr['hotelname']; ?></strong></p>
     <p><?php echo $hotel_arr['hoteldesc']; ?></p>
     <p>Facilities: <?php echo $fac_cls; ?></p>
     <div class="clear"></div>
     <p>Ratings
         <?php for ($i=0; $i<$hotel_arr['ratingcount']; $i++) { ?>
         <img src="<?php echo base_url(); ?>images/ratings.jpg" alt="" height="19" width="18">
         <?php } ?></p>
     <p><a href="<?php echo base_url(); ?>hotel/hotel_details/hotel_id/<?php echo $hotel_arr['hotelid']; ?>"><img src="<?php echo base_url(); ?>images/readmore.jpg" height="27" width="78"></a></p>
   </div>
    <div class="clear"></div>
    <?php endforeach; ?>
</div>
    <div id="pagecontroller"><?php echo $pagination;?></div>
<div class="clear"></div>