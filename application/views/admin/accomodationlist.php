<div class="form_content">
    <header><h3>Manage Accomodations</h3>
    <div style="padding: 5px 0 0 0"><a href="<?php echo base_url(); ?>admin/accomodation"><img src="<?php echo base_url(); ?>images/admin/icn_new_article.png" />New</a></div></header>
    <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
   				<th>ID</th>
    				<th>Accomodation Title</th>
    				<th>Status</th>
                                <th>Action</th>
				</tr>
			</thead>
			<tbody>
                            <?php foreach($acclist as $list):?>
				<tr>
                                <td><?php echo $list["id"];?></td>
   				<td><?php echo $list["accdesc"];?></td>
    				<td><?php echo ($list["status"]==1)?"<img src=" . base_url() . "images/admin/enable.gif width='18' height='18'  />":"<img src=" . base_url() . "images/admin/disable.gif width='18' height='18' />";?></td>
                                <td> <a href="accomodationedit/?id=<?php echo $list["id"];?>" class=""><img src="<?php echo base_url(); ?>images/admin/icn_edit.png" title="edit accomodation" /></a> <a onclick=" return confirm('are you sure')" href="accomodationdelete/?id=<?php echo $list["id"];?>" class=""><img src="<?php echo base_url(); ?>images/admin/icn_trash.png" title="delete accomodation" /></a>  </td>
				</tr>
                           <?php endforeach;?>
			</tbody>
			</table>
			</div><!-- end of #tab1 -->

			<div id="tab2" class="tab_content">


			</div><!-- end of #tab2 -->

		</div><!-- end of .tab_container -->



</div>



