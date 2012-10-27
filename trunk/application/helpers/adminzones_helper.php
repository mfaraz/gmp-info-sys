<?php
$this->load->model("adminzone_model");
$zones = $this->adminzone_model->listZonesByDivisionId(1);
?>
<table border="0" width="100%" cellpadding="2" cellspacing="3" class="gridtable">
    <tr>
        <th width="5%" align="center">#</th>
        <th width="25%">Zone</th>
        <th width="25%">Division</th>
        <th width="35%">Description</th>
        <th width="5%">&nbsp;</th>
        <th width="5%">&nbsp;</th>
    </tr>
<?php
foreach ($zones as $zone) :
?>
    <tr>
        <td align="center"><?php echo $zone['zoneid']; ?></td>
        <td><?php echo $zone['zonename']; ?></td>
        <td><?php echo $zone['divisionname']; ?></td>
        <td><?php echo $zone['zonedsc']; ?></td>
        <td align="center"><a class='inline1' href="#" onclick="openeditform('<?php echo $zone['zoneid']; ?>')"><img src="<?php echo base_url(); ?>images/admin/edit.gif" alt="edit" title="edit row" width="15" height="15" /></a></td>
        <td align="center"><a href="#" onclick="deletezone('<?php echo $zone['zoneid']; ?>')"><img src="<?php echo base_url(); ?>images/admin/delete.gif" alt="delete" title="delete row" width="15" height="15" /></a></td>
    </tr>
<?php
endforeach;
?>
</table>
<div style='display:none'>
    <div id='inline_content' style='padding:10px; background:#fff;'>

    </div>
</div>
<script language="javascript" type="text/javascript">
    function openeditform(zone_id)
    {
        $.ajax({
            type: "POST",
            data: ({zone_id: zone_id}),
            url: "http://localhost/gmpinfosys/secu/zone/editzone",
            success: function(data, textStatus, XMLHttpRequest){
                if(data != "")
                {
                    $("#loader").hide();
                    //$("#organization_"+sect).show();
                    //$("#organization_"+sect).html(data);
                    $("#inline_content").colorbox({
                        open: true,
                        width: 500,
                        html: data
                    })
                }
            },
            complete: function complete(XMLHttpRequest, textStatus){

            }
        });
    }

    function deletezone(zone_id)
    {
        var msg = confirm("Are you sure you want to delete this?")
        if (msg==true)
        {
            $.ajax({
                type: "POST",
                data: ({zone_id: zone_id}),
                url: "http://localhost/gmpinfosys/secu/zone/deletezone",
                success: function(data, textStatus, XMLHttpRequest){
                    $("#loader").hide();
                    document.location.reload(true);
                },
                complete: function complete(XMLHttpRequest, textStatus){

                }
            });
        }
        else
        {
            return false;
        }
    }
</script>