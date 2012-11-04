<div class="article2">
    <?php $this->load->view("topsearch"); ?>
</div>
<!-- Page Navigation start-->
<div id="page-navi">
    <a href="#">Religious Information</a> &rarr; <a href="#">Buddhist Temple List</a> &rarr; <a href="#">Temple Name</a>
</div>


<div id="searchresult" style="display: none;"></div>
    <div id="defaultresult">
<!-- Page Navigation end-->
<h2><?php echo $detail_arr->orgname; ?></h2>

<!-- #featured section start -->
<div id="featured">
    <div><img src="<?php echo base_url(); ?>images/photos-016.jpg" width="330" class="left-align rel-img" style="margin-bottom:0px;" alt=""/>
        <h3 style="width:330px; margin-top:0;">General Info:</a></h3>
        <table id="hor-minimalist-b" summary="">
            <tbody>
            <tr>
                <td width="278" scope="col">
                    <ul>
                        <li><span>Temple Name</span> : <br/><?php echo $detail_arr->orgname; ?> </li>
                        <li><span>Head Priest</span> : <?php echo $detail_arr->membername; ?></li>
                        <li><span>Division/Region/Branch</span> : <?php echo $detail_arr->divisionname; ?>/<?php echo $detail_arr->zonename; ?>/<?php echo $detail_arr->branchname; ?> </li>
                        <li><span>Address</span> : <?php echo $detail_arr->orgaddress; ?> </li>
                        <li><span>Other</span> : <?php echo $detail_arr->orgotherdesc; ?> </li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
        <div id="gallery0">
            <ul>
                <li><a href="<?php echo base_url(); ?>images/photos-016.jpg" title=""><img src="<?php echo base_url(); ?>images/photos-016.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url(); ?>images/photos-003.jpg" title=""><img src="<?php echo base_url(); ?>images/photos-003.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url(); ?>images/photos-001.jpg" title=""><img src="<?php echo base_url(); ?>images/photos-001.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url(); ?>images/photos-008.jpg" title=""><img src="<?php echo base_url(); ?>images/photos-008.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url(); ?>images/photos-003.jpg" title=""><img src="<?php echo base_url(); ?>images/photos-003.jpg" alt="" /></a></li>
            </ul>
        </div>

        <h3>Description:</h3>
        <p><?php echo $detail_arr->orgdsc; ?></p>

        <h3>Location map:</h3>
        <iframe width="690" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="gampolamap" style="margin-top:10px;" src="https://maps.google.com/maps?hl=en&amp;q=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;geocode=FTJTbQAdm4DNBA&amp;split=0&amp;sll=37.0625,-95.677068&amp;sspn=23.875,57.630033&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;t=m&amp;source=embed&amp;ll=7.164682,80.576563&amp;spn=0.136427,0.261612&amp;z=13&amp;output=embed"></iframe><br />
        <small><a href="https://maps.google.com/maps?hl=en&amp;q=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;geocode=FTJTbQAdm4DNBA&amp;split=0&amp;sll=37.0625,-95.677068&amp;sspn=23.875,57.630033&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;t=m&amp;source=embed&amp;ll=7.164682,80.576563&amp;spn=0.136427,0.261612&amp;z=13" style="color:#999999;text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; margin:0 0 0 14px;">View Larger Map</a></small>
    </div>


</div><!-- #featured section end -->
        </div>
<div class="article">

    <div class="section odd">
        <a href="#"><img src="<?php echo base_url(); ?>images/photos-034.jpg" width="158" height="143" alt=""/></a>
        <div>
            <h3><a href="#">Religious Information</a></h3>
            <p>Pellentesque ac magna sit amet metus pretium ultricies. Nulla risus erat, varius ut tincidunt non, scelerisque ut mi.  Maecenas elit purus, dapibus in hendrerit in, consequat nec mi.</p>

            <!-- Update Time/ Print / PDF section Start -->
            <div class="stats">
                <a href="#" class="time">Sept 21  by Nelum</a>
                <a href="#" class="facebook">PDF</a>
                <a href="#" class="twitter">Print</a>
            </div><!-- Update Time/ Print / PDF section End -->
        </div>
    </div>

    <!-- Bottom Navigation Root Start -->
    <div id="btm-navi">
        <a href="#">Religious Information</a> &rarr; <a href="#">Buddhist Temple List</a> &rarr; <a href="#">Temple Name</a>
    </div><!-- Bottom Navigation Root End -->

</div><!-- .article section End -->