function getCity(id)
{
    //var base_url = "<?php echo base_url(); ?>";
   $.ajax({
        type: "POST",
        data: ({country_id: id}),
        url: "http://explorersrilanka.indisil.com/secu/hotel/getcity",
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
            url: "http://explorersrilanka.thecodesphere.com/admin/delhotel",
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
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
function isDate (x)
{
  return (null != x) && !isNaN(x) && ("undefined" !== typeof x.getDate);
}


function hascheckboxes(checkboxarray)
        {
            // assigh the name of the checkbox;
            var chks = checkboxarray;

            var hasChecked = false;
            // Get the checkbox array length and iterate it to see if any of them is selected
            for (var i = 0; i < chks.length; i++)
            {
                    if (chks[i].checked)
                    {
                            hasChecked = true;
                            break;
                    }
            }

            return  hasChecked;
        }
        function isEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
       }
       function isURL(s) {
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
       }

