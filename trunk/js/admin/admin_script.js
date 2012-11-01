function getCity(id)
{
    //var base_url = "<?php echo base_url(); ?>";
   $.ajax({
        type: "POST",
        data: ({country_id: id}),
        url: "http://localhost/gmpinfosys/secu/hotel/getcity",
        success: function(data, textStatus, XMLHttpRequest){
           $("#show_city_list").html(data);
           $("#city_list").hide();
        },
        complete: function complete(XMLHttpRequest, textStatus){
        //loading.busyBox('close');
    }
    });
}

function delHotel(hotelid)
{
    var msg = confirm ("Are you sure you want to delete this recored?")
    if (msg) {
    //location.href = '/admin/user/deleteuser/userid/'+userid;
    $.ajax({
            type: "POST",
            data: ({hotelid: hotelid}),
            url: "http://localhost/gmpinfosys/admin/delhotel",
            success: function(data, textStatus, XMLHttpRequest){
               alert(data);
            },
            complete: function complete(XMLHttpRequest, textStatus){
            
            }
    });
    } else {
       return false;
    } 
}


function filterZones(division_id)
{
    $.ajax({
        type: "POST",
        data: ({division_id: division_id}),
        url: "http://localhost/gmpinfosys/secu/branch/getzonesbydivs",
        success: function(data, textStatus, XMLHttpRequest){
            if(data != "")
            {
                $("#zone").html(data);
            }
        },
        complete: function complete(XMLHttpRequest, textStatus){

        }
    });
}

function filterBranches(zone_id, division_id)
{
    $.ajax({
        type: "POST",
        data: ({division_id: division_id, zone_id: zone_id}),
        url: "http://localhost/gmpinfosys/secu/branch/getbranchbyzone",
        success: function(data, textStatus, XMLHttpRequest){
            if(data != "")
            {
                $("#branch").html(data);
            }
        },
        complete: function complete(XMLHttpRequest, textStatus){

        }
    });
}

function filterOrgs(branch_id, division_id, zone_id)
{
    $.ajax({
        type: "POST",
        data: ({branch_id: branch_id, division_id: division_id, zone_id: zone_id}),
        url: "http://localhost/gmpinfosys/secu/branch/getorgbybranch",
        success: function(data, textStatus, XMLHttpRequest){
            if(data != "")
            {
                $("#organization").html(data);
            }
        },
        complete: function complete(XMLHttpRequest, textStatus){

        }
    });
}

function showBranches(zone_id, sect)
{
    $("#loader").html("<img src='../../images/admin/ajax-loader.gif' />");
    $.ajax({
        type: "POST",
        data: ({zone_id: zone_id, sect: sect}),
        url: "http://localhost/gmpinfosys/secu/admin/getbranches",
        success: function(data, textStatus, XMLHttpRequest){
            if(data != "")
            {
                $("#loader").hide();
                $("#branch_"+sect+"_"+zone_id).show();
                $("#branch_"+sect+"_"+zone_id).html(data);
            }            
        },
        complete: function complete(XMLHttpRequest, textStatus){

        }
    });
}

function listOrganizations(zone_id, branch_id, division_id, sect)
{
    $("#loader").html("<img src='../../images/admin/ajax-loader.gif' />");
    $.ajax({
        type: "POST",
        data: ({zone_id: zone_id, branch_id: branch_id, division_id: division_id}),
        url: "http://localhost/gmpinfosys/secu/admin/getorgdetails",
        success: function(data, textStatus, XMLHttpRequest){
            if(data != "")
            {
                $("#loader").hide();
                $("#organization_"+sect).show();
                $("#organization_"+sect).html(data);
            }
        },
        complete: function complete(XMLHttpRequest, textStatus){

        }
    });
}