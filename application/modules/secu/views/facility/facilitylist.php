<div class="form_content">    
    <header><h3>Manage Facilities</h3>
        <div style="padding: 5px 0 0 0"><a href="<?php echo base_url(); ?>secu/facility"><img src="<?php echo base_url(); ?>images/admin/icn_new_article.png" />New</a></div></header>
    <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
   				<th>id</th>
    				<th>Facility Name</th>
    				<th>Status</th>
                                <th>Action</th>
				</tr>
			</thead>
			<tbody>
                            <?php foreach($acclist as $list):?>
				<tr>
                                <td><?php echo $list["id"];?></td>
   				<td><?php echo $list["Hfacility"];?></td>
    				<td><?php echo ($list["status"]==1)?"<img src=" . base_url() . "images/admin/enable.gif width='18' height='18'  />":"<img src=" . base_url() . "images/admin/disable.gif width='18' height='18' />";?></td>
                                <td> <a href="<?php echo base_url(); ?>secu/facility/faciltyedit/id/<?php echo $list["id"];?>" class=""><img src="<?php echo base_url(); ?>images/admin/icn_edit.png" /></a>&nbsp;&nbsp;<a onclick=" return confirm('Are you sure you want to delet this facility?')" href="<?php echo base_url(); ?>secu/facility/facilitydelete/id/<?php echo $list["id"];?>" class=""><img src="<?php echo base_url(); ?>images/admin/icn_trash.png" title="Trash"></a>  </td>
				</tr>
                           <?php endforeach;?>
			</tbody>
			</table>
                            <?php echo $pagination;?>
			</div><!-- end of #tab1 -->

			<div id="tab2" class="tab_content">
                       

			</div><!-- end of #tab2 -->

		</div><!-- end of .tab_container -->



</div>



