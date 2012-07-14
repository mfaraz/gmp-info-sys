<div class="form_content">
    <header><h3> Room Types Of Hote ID::<?php echo $hotelname;?></h3>
    <div style="padding: 5px 0 0 0"><a href="<?php echo base_url(); ?>secu/hotelroomtype/index/id/<?php echo $id;?> "><img src="<?php echo base_url(); ?>images/admin/icn_new_article.png" />New</a></div></header>
    <div class="tab_container">
			<div id="tab1" class="tab_content">
                       <?php if($list):?>
			<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
   				<th>id</th>
    				<th>Room Category Name</th>
                                <th>Room Type</th>
    				<!--<th>No of beds</th>
                                <th>No of Adults</th>
                                <th>No of children</th>
                                <th>Maximum age for children</th>
                                 <th>Extra bed available</th>-->
                                <th>Status</th>
                                <th>Action</th>
				</tr>
			</thead>
			<tbody>
                            <?php foreach($list as $list):?>
				<tr>
                                <td><?php echo $list["id"];?></td>
   				<td><?php echo $list["basictype"];?></td>
                                <td><?php echo $list["roomtypename"];?></td>
                               <!-- <td><?php echo $list["noofbeds"];?></td>
                                <td><?php echo $list["adult"];?></td>
                                <td><?php echo $list["child"];?></td>
                                <td><?php echo $list["childage"];?></td>
                                <td><?php echo ($list["extraroom"]=='Y')?"yes":"no";?></td>-->
    				<td><?php echo ($list["status"]==1)?"yes":"no";?></td>
                                <td> <a href="<?php echo base_url()?>secu/hotelroomtype/roomtypeedit/id/<?php echo $list["id"];?>/hid/<?php echo $list["Hid"];?>" class="">edit</a> <a onclick=" return confirm('are you sure')" href="<?php echo base_url()?>secu/hotelroomtype/roomtypedelete/id/<?php echo $list["id"];?>/hid/<?php echo $list["Hid"];?>" class="">delete</a>  </td>
				</tr>
                           <?php endforeach;?>
                               
			</tbody>
			</table>
                          <?php endif;?>
                            <?php echo $pagination;?>
			</div><!-- end of #tab1 -->

			<div id="tab2" class="tab_content">


			</div><!-- end of #tab2 -->

		</div><!-- end of .tab_container -->



</div>



