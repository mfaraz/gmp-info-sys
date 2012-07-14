<header><h3>Dashboard</h3></header>
			<div class="module_content">

				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day"><img src="<?php echo base_url(); ?>images/admin/producticon.png" width="64" height="64" /></p>
						<p class="overview_type">Hotels</p>
					</div>
					<!--<div class="overview_today">
						<p class="overview_day"><img src="<?php echo base_url(); ?>images/admin/usericon.png" width="64" height="64" /></p>
						<p class="overview_type">Users</p>
					</div>-->
                                        <div class="overview_previous">
						<p class="overview_day"><img src="<?php echo base_url(); ?>images/admin/languageicon.png" width="64" height="64" /></p>
						<p class="overview_type">Languages</p>
					</div>
                                        <div class="overview_today">
						<p class="overview_day"><img src="<?php echo base_url(); ?>images/admin/newsicon.png" width="64" height="64" /></p>
						<p class="overview_type">News</p>
					</div>
                                    <div class="overview_previous">
						<p class="overview_day"><img src="<?php echo base_url(); ?>images/admin/galleryicon.png" width="64" height="64" /></p>
						<p class="overview_type">Gallery</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
                   <?php
                   
                   //if(count($hotel_arr) > 1)
                   //{
                   ?>
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Hotel Manager</h3>
		<!--<ul class="tabs">
   			<li><a href="#tab1">Posts</a></li>
    		<li><a href="#tab2">Comments</a></li>
		</ul>-->
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
                                <th>#</th>
    				<th>Hotel Name</th>
                                <th>Contact Person</th>
                                <th>Contact #</th>
    				<th>No. of Stars</th>
    				
    				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
                            <?php
                            //print_r($hotel_lang);
                                foreach($hotel_arr as $hotel_entry) :
                            ?>
				<tr>
                                <td><?php echo $hotel_entry['id']; ?></td>
                                <?php foreach($hotel_lang as $lang_entry) : ?>
    				<td><?php echo $lang_entry['hotelname_uk']; ?></td>
                                <?php endforeach; ?>
                                <td><?php echo $hotel_entry['txtContactName']; ?></td>
                                <td><?php echo $hotel_entry['txtPhoneNo']; ?></td>
    				<td><?php echo $hotel_entry['numStars']; ?></td>    				
    				<td><a href="<?php echo base_url(); ?>admin/edithotel/?hotel_id=<?php echo $hotel_entry['id']; ?>"><img src="<?php echo base_url(); ?>images/admin/icn_edit.png" /></a>&nbsp;<a href="javascript: void(0);" onclick="delHotel(<?php echo $hotel_entry['id']; ?>)"><img src="<?php echo base_url(); ?>images/admin/icn_trash.png" title="Trash"></a></td>
				</tr>
							
                           <?php
                            endforeach;
                           ?>
			</tbody>
			</table>
			</div><!-- end of #tab1 -->

			<div id="tab2" class="tab_content">


			</div><!-- end of #tab2 -->

		</div><!-- end of .tab_container -->

		</article><!-- end of content manager article -->
                   <?php //} ?>

                

		<div class="clear"></div>