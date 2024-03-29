function getRegion(division_id)
{
    $.ajax({
        type: "POST",
        data: ({division_id: division_id}),
        url: "http://localhost/gmpinfosys/common/getregion",
        success: function(data, textStatus, XMLHttpRequest){
            $("#cmbRegion").remove();
            $("#setregion").show();
            $("#setregion").html(data);
        },
        complete: function complete(XMLHttpRequest, textStatus){
            //loading.busyBox('close');
        }
    });
}

function getBranch(zoneid, divisionid)
{
    $.ajax({
        type: "POST",
        data: ({zoneid: zoneid, divisionid: divisionid}),
        url: "http://localhost/gmpinfosys/common/getbranch",
        success: function(data, textStatus, XMLHttpRequest){
            $("#cmbBranch").hide();
            $("#cmbBranch").show();
            $("#cmbBranch").html(data);
        },
        complete: function complete(XMLHttpRequest, textStatus){
            //loading.busyBox('close');
        }
    });
}

function getSearchResult()
{
    var division = document.getElementById("cmbDivision");
    var region = document.getElementById("cmbRegion");
    var branch = document.getElementById("cmbBranch");

    $.ajax({
        type: "POST",
        data: ({division: division.value, region: region.value, branch: branch.value}),
        url: "http://localhost/gmpinfosys/common/getsearchresult",
        success: function(data, textStatus, XMLHttpRequest){
            $("#defaultresult").hide();
            $("#searchresult").show();
            $("#searchresult").html(data);
        },
        complete: function complete(XMLHttpRequest, textStatus){
            //loading.busyBox('close');
        }
    });
}

function clearResult()
{
    $("#defaultresult").show();
    $("#searchresult").hide();
    $("#clear_result").hide();
}

function showAdminProfile(id)
{
    $.ajax({
        type: "POST",
        data: ({admin_id: id}),
        url: "http://localhost/gmpinfosys/index/getadminprofile",
        success: function(data, textStatus, XMLHttpRequest){
            $("#adminprofiler").colorbox({
                open: true,
                width: 500,
                html: data
            })
        },
        complete: function complete(XMLHttpRequest, textStatus){
            //loading.busyBox('close');
        }
    });
}