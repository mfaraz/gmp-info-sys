<?php
$this->load->model("adminbranch_model");
$branches = $this->adminbranch_model->listBranchByDivisionId(1);
?>
<table border="0" width="100%" cellpadding="2" cellspacing="2" class="gridtable">
    <tr>
        <th width="5%" align="center">#</th>
        <th width="25%">Branch</th>
        <th width="25%">Zone</th>
        <th width="25%">Division</th>
        <th width="35%">Description</th>
        <th width="5%">&nbsp;</th>
        <th width="5%">&nbsp;</th>
    </tr>
<?php
foreach ($branches as $branch) :
?>
    <tr>
        <td align="center" valign="top"><?php echo $branch['branchid']; ?></td>
        <td valign="top"><?php echo $branch['branchname']; ?></td>
        <td valign="top"><?php echo $branch['zonename']; ?></td>
        <td valign="top"><?php echo $branch['divisionname']; ?></td>
        <td valign="top"><?php echo $branch['branchdsc']; ?></td>
        <td valign="top" align="center"><a class='inline1' href="#" onclick="openeditform('<?php echo $branch['branchid']; ?>')"><img src="<?php echo base_url(); ?>images/admin/edit.gif" alt="edit" title="edit row" width="15" height="15" /></a></td>
        <td valign="top" align="center"><img src="<?php echo base_url(); ?>images/admin/delete.gif" alt="delete" title="delete row" width="15" height="15" /></td>
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
    function openeditform(branch_id)
    {
        $.ajax({
            type: "POST",
            data: ({branch_id: branch_id}),
            url: "http://localhost/gmpinfosys/secu/branch/editbranch",
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
</script>
