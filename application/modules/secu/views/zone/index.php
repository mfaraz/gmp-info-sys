<table border="1" width="100%" cellpadding="2" cellspacing="3">
    <tr>
        <td width="5%" align="center">#</td>
        <td width="25%">Zone</td>
        <td width="25%">Division</td>
        <td width="35%">Description</td>
        <td width="5%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
    </tr>
<?php
foreach ($zones as $zone) :
?>
    <tr>
        <td align="center"><?php echo $zone['zoneid']; ?></td>
        <td><?php echo $zone['zonename']; ?></td>
        <td><?php echo $zone['divisionname']; ?></td>
        <td><?php echo $zone['zonedsc']; ?></td>
        <td align="center"><img src="<?php echo base_url(); ?>images/admin/edit.gif" alt="edit" title="edit row" /></td>
        <td align="center"><img src="<?php echo base_url(); ?>images/admin/delete.gif" alt="delete" title="delete row" /></td>
    </tr>
<?php
endforeach;
?>
</table>