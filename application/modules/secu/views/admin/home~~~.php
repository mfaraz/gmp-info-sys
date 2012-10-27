<header><h3>Dashboard</h3></header>
<div class="module_content">
    <table border="1" width="100%">
        <tr>
            <td width="60%" valign="top">
                <div id="tabs">
                   <ul>
                            <li><a href="#tabs-1">Uda Palatha</a></li>
                            <li><a href="#tabs-2">Doluwa</a></li>
                    </ul>
                    <div id="tabs-1">
                        <div id="loader">&nbsp;</div>
                        <h2>Zones(කලාප)</h2>
                        <?php
                            foreach ($zoneup_arr as $zoneup_entry) :
                        ?>
                            <p><?php echo $zoneup_entry['zonename']; ?>&nbsp;<a href="javascript: void(0);" onclick="javascript: showBranches(<?php echo $zoneup_entry['zoneid']; ?>, 'up')"><img src="<?php echo base_url(); ?>images/admin/preview.gif" width="15" height="15" /></a>
                            <div id="branch_up_<?php echo $zoneup_entry['zoneid']; ?>" class="branch_loader" style="display: none;"></div>
                        <?php
                            endforeach;
                        ?>
                            <div id="organization_up"></div>
                    </div>
                    <div id="tabs-2">
                        <div id="loader">&nbsp;</div>
                        <h2>Zones(කලාප)</h2>
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
            <td width="40%">
                <div id="gampola_map">
                    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Gampola,+Central+Province,+Sri+Lanka&amp;aq=0&amp;oq=gampola+sri+&amp;sll=7.164682,80.576649&amp;sspn=0.048371,0.077162&amp;g=Gampola,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ll=7.164722,80.576667&amp;spn=0.096746,0.154324&amp;t=h&amp;z=13&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Gampola,+Central+Province,+Sri+Lanka&amp;aq=0&amp;oq=gampola+sri+&amp;sll=7.164682,80.576649&amp;sspn=0.048371,0.077162&amp;g=Gampola,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ll=7.164722,80.576667&amp;spn=0.096746,0.154324&amp;t=h&amp;z=13" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                </div>
                <div id="baseinfo">
                    <h3>Gampola Electorate</h3>
                    <p><b>Coordinates:</b> 7°9'53"N 80°34'36"E</p>
                    <p><b>Province:</b>	Central Province, Sri Lanka &nbsp;&nbsp; <b>Population (2011)</b> Total 27,660</p>
                </div>
            </td>
        </tr>
    </table>
</div