<div id="ACC-main-banner"><div class="pikachoose">
      <ul id="pikame" >
          <?php foreach ($hotelimagearray as $hotelimg_arr) : ?>
		<li><img src="<?php echo base_url(); ?>images/uploads/original/<?php echo $hotelimg_arr['image']; ?>"/></li>
          <?php endforeach; ?>
	</ul>
</div>
</div>
<div class="clear"></div>
    <div>
      <h2><?php echo $hotelname; ?>
       <?php for ($i=0; $i<$ratingcount; $i++) : ?>
          <img src="<?php echo base_url(); ?>images/ratings.jpg" width="18" height="19" />
       <?php endfor; ?></h2>
        <?php if($mealplans): ;?>
      <h3>Meal Plans</h3>
       <?php foreach($mealplans  as $plans):?>
          <div class=''><?php echo $plans["name"];?></div>
      <?php endforeach;?>
      <?php endif;?>
          <?php
                foreach ($hotelfacilityarray as $fac_arr) :
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
        <p><?php echo $fac_cls; ?></p>
        <div class="clear"></div>
      <h3>Location</h3>
      <p><?php echo $location; ?></p>
      <!--<p><img src="images/checkgooglemaps_icon.jpg" width="177" height="45" /></p>-->
      <h3>About</h3>
      <p><?php echo $about; ?></p>
      <h3>Accommodation</h3>
      <p><?php echo $accomodation; ?></p>
      <h3>Facilities</h3>
      <p><?php echo $facilities; ?></p>
      <h3>Excursions</h3>
      <!--<div><img src="images/excursions1.jpg" width="169" height="126" class="detail_image" /><img src="images/excursions1.jpg" width="169" height="126" class="detail_image" /><img src="images/excursions1.jpg" width="169" height="126" class="detail_image" /></div>-->
      <p><?php echo $excursion; ?></p>
      <p><img src="images/reservation_btn.jpg" width="99" height="32" class="reservation-btn" /><br />
      </p>
    </div>
    <div class="clear"></div>