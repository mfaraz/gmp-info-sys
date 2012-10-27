<header><h3>Dashboard</h3></header>
<div class="module_content">
    <table border="0" width="100%" cellspacing="1" cellpadding="2">
        <tr>
            <td width="70%" valign="top">
                <div id="tabs">
                   <ul>
                            <li><a href="#tabs-1">Uda Palatha</a></li>
                            <li><a href="#tabs-2">Doluwa</a></li>
                    </ul>
                    <div id="tabs-1">
                        <div id="loader">&nbsp;</div>
                        <aside id="mainpane1">
                            <h3>Zones(කලාප)</h3>
                            <div class="toggle">
                                <?php $this->load->helper('adminzones'); ?>
                            </div>
                            <h3>Branches(ශාඛා)</h3>
                            <div class="toggle">
                                <?php $this->load->helper('adminbranch'); ?>
                            </div>
                        </aside>
                    </div>
                    <div id="tabs-2">
                        <div id="loader">&nbsp;</div>
                        
                        <?php
                            foreach ($zonedl_arr as $zonedl_entry) :
                        ?>
                            <p><?php echo $zonedl_entry['zonename']; ?>&nbsp;<a href="javascript: void(0);" onclick="javascript: showBranches(<?php echo $zonedl_entry['zoneid']; ?>, 'dl')"><img src="<?php echo base_url(); ?>images/admin/preview.gif" width="15" height="15" /></a>
                            <div id="branch_dl_<?php echo $zonedl_entry['zoneid']; ?>" class="branch_loader" style="display: none;"></div>
                        <?php
                            endforeach;
                        ?>
                            <div id="organization_dl"></div>
                    </div>                    
                </div>
            </td>
            <td width="30%" valign="top">
                <table width="100%" border="0">
                    <tr>
                        <td>
                            <div id="gampola_map">
                                <!--<iframe width="400" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Gampola,+Central+Province,+Sri+Lanka&amp;aq=0&amp;oq=gampola+sri+&amp;sll=7.164682,80.576649&amp;sspn=0.048371,0.077162&amp;g=Gampola,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ll=7.164722,80.576667&amp;spn=0.096746,0.154324&amp;t=h&amp;z=13&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Gampola,+Central+Province,+Sri+Lanka&amp;aq=0&amp;oq=gampola+sri+&amp;sll=7.164682,80.576649&amp;sspn=0.048371,0.077162&amp;g=Gampola,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ll=7.164722,80.576667&amp;spn=0.096746,0.154324&amp;t=h&amp;z=13" style="color:#0000FF;text-align:left">View Larger Map</a></small>-->
                            </div>
                            <div id="baseinfo">
                                <h3>Gampola Electorate</h3>
                                <p><b>Coordinates:</b> 7°9'53"N 80°34'36"E</p>
                                <p><b>Province:</b>	Central Province, Sri Lanka &nbsp;&nbsp; <b>Population (2011)</b> Total 27,660</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="">Summary</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<script>
$('#toggle2').click(function() {
	$('.toggle2').toggle();
	return false;
});
</script>