<script type="text/javascript">
    function delHotel(hotelid)
{
    var msg = confirm ("Are you sure you want to delete this recored?")
    if (msg) {
    //location.href = '/admin/user/deleteuser/userid/'+userid;
    $.ajax({
            type: "POST",
            data: ({hotelid: hotelid}),
            url: "<?php echo base_url(); ?>secu/hotel/delhotel/",
            success: function(data, textStatus, XMLHttpRequest){
              // alert(data);
              location.href = '<?php echo base_url(); ?>secu/hotel/hotellist/';
            },
            complete: function complete(XMLHttpRequest, textStatus){
            
            }
    });
    } else {
       return false;
    } 
}

</script>
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

    				<td><?php echo $hotel_entry['hotelname']; ?></td>

                                <td><?php echo $hotel_entry['txtContactName']; ?></td>
                                <td><?php echo $hotel_entry['txtPhoneNo']; ?></td>
    				<td><?php echo $hotel_entry['numStars']; ?></td>
    				<td><a href="<?php echo base_url(); ?>secu/hotelcontent/index/id/<?php echo $hotel_entry['id']; ?>"><img src="<?php echo base_url(); ?>images/admin/icn_new_article.png" title="add hotel content" /></a>&nbsp;<a href="<?php echo base_url(); ?>secu/hotel/edithotel/hotel_id/<?php echo $hotel_entry['id']; ?>"><img src="<?php echo base_url(); ?>images/admin/icn_edit.png" title="edit hotel" /></a>&nbsp;<a href="javascript: void(0);" onclick="delHotel(<?php echo $hotel_entry['id']; ?>)"><img src="<?php echo base_url(); ?>images/admin/icn_trash.png" title="delete hotel"></a>&nbsp;<a href="<?php echo base_url(); ?>secu/hotelroomtype/roomtypelist/id/<?php echo $hotel_entry['id']; ?>"><img src="<?php echo base_url(); ?>images/admin/icn_categories.png" title="add room types"></a></td>
				</tr>

                           <?php
                            endforeach;
                           ?>
			</tbody>
			</table>
                            <?php  echo $pagination;?>
			</div><!-- end of #tab1 -->

			<div id="tab2" class="tab_content">


			</div><!-- end of #tab2 -->

		</div><!-- end of .tab_container -->

		</article><!-- end of content manager article -->
                   <?php //} ?>



		<div class="clear"></div>