<!-- Search by Category start -->
<div class="article2">
    <?php $this->load->view("topsearch"); ?>
</div><!-- Search by Category end -->

<!-- Page Navigation start-->
<div id="page-navi"><a href="<?php echo base_url(); ?>division/info/<?php echo $division_id; ?>">Division name</a>&rarr; <a href="<?php echo base_url(); ?>zone/info/<?php echo $division_id; ?>/<?php echo $zone_id; ?>"><?php echo $zone_info->zonename; ?></a>&rarr; <a href="#"><?php echo $branch_info->branchname; ?></a></div>
<!-- Page Navigation end-->

<h2><?php echo $branch_info->branchname; ?></h2>

<!-- #featured section start -->
<div id="featured">
    <div>
        <h3 style="margin-bottom:12px;">General information & Population Statistics</h3>
        <p><img src="<?php echo base_url(); ?>images/gampola-map.png" width="190" class="left-align" style="border:5px solid #868593;" alt=""/>You can remove any link to our website from this website template, you're free to use this website template without linking back to us. <br/><br/> If you're having problems editing this website template, then don't hesitate to ask for help on the You can remove any link to our website from this website template, you're free to use this website template without linking back to us.. 	<a href="#">read more</a>
    </div>

    <!-- Update Time/ Print / PDF section Start -->
    <div class="stats">
        <!--<a href="#" class="time">Sept 21  by Nelum</a>-->
        <a href="#" class="facebook">PDF</a>
        <a href="#" class="twitter">Print</a>
    </div><!-- Update Time/ Print / PDF section End -->
</div><!-- #featured section end -->

<!-- .article section Start -->
<div class="article">

<!-- Race / Religion / Gender / Age  Start	-->
<div class="news">
    <!-- Race Section start -->
    <div id="searchresult" style="display: none;"></div>
    <div id="defaultresult">
    <div class="section-01 st">
        <h4>Race [ජන වර්ගය] :</h4>
        <table id="hor-minimalist-b" summary="">
            <thead>
            <tr>
                <th width="185" scope="col">Category</th>
                <th width="93" scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($branch_arr as $_data) :
                if($_data['populationcatdesc'] == "sinhalese")
                    $sinhalese .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "tamil")
                    $tamil .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "muslim")
                    $muslim .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "other_nat")
                    $other_nat .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "buddhist")
                    $buddhist .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "catholic")
                    $catholic .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "islam")
                    $islam .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "other_rel")
                    $other_rel .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "male")
                    $male .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "female")
                    $female .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "age_1_16")
                    $age_1_16 .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "age_16_30")
                    $age_16_30 .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "age_30_50")
                    $age_30_50 .= $_data['TOTALCOUNT'];
                if($_data['populationcatdesc'] == "age_50")
                    $age_50 .= $_data['TOTALCOUNT'];
            endforeach;
            ?>

            <tr>
                <td>Sinhalese</td>
                <td><?php echo $sinhalese; ?></td>
            </tr>
            <tr>
                <td>Tamil</td>
                <td><?php echo $tamil; ?></td>
            </tr>
            <tr>
                <td>Muslim</td>
                <td><?php echo $muslim; ?></td>
            </tr>
            <tr>
                <td>Other</td>
                <td><?php echo $other_nat; ?></td>
            </tr>
            <tr>
                <td class="td-style01" style="border-bottom:none;" >Total</td>
                <td class="td-style01" style="border-bottom:none;" >
                    <?php
                    $total_nat = $sinhalese + $tamil + $muslim + $other_nat;
                    echo $total_nat; // do not delete
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div><!-- Race Section end -->


    <!-- Religion Section start -->
    <div class="section-01">
        <h4>Religion [ආගම] :</h4>
        <table id="hor-minimalist-b" summary="">
            <thead>
            <tr>
                <th width="185" scope="col">Category</th>
                <th width="93" scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Buddhist</td>
                <td><?php echo $buddhist; ?></td>
            </tr>
            <tr>
                <td>Catholic</td>
                <td><?php echo $catholic; ?></td>
            </tr>
            <tr>
                <td>Islam</td>
                <td><?php echo $islam; ?></td>
            </tr>
            <tr>
                <td>Other</td>
                <td><?php echo $other_rel; ?></td>
            </tr>
            <tr>
                <td class="td-style01" style="border-bottom:none;" >Total</td>
                <td class="td-style01" style="border-bottom:none;" >
                    <?php
                    $total_rel = $buddhist + $catholic + $islam + $other_rel;
                    echo $total_rel; // do not delete
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div><!-- Religion Section end -->

    <!-- Gender Section start -->
    <div class="section-01 st">
        <h4>Gender [ස්ත්‍රී/පුරුෂ] :</h4>
        <table id="hor-minimalist-b" summary="">
            <thead>
            <tr>
                <th width="185" scope="col">Category</th>
                <th width="93" scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Male</td>
                <td><?php echo $male; ?></td>
            </tr>
            <tr>
                <td>Female</td>
                <td><?php echo $female; ?></td>
            </tr>
            <tr>
                <td class="td-style01" style="border-bottom:none;" >Total</td>
                <td class="td-style01" style="border-bottom:none;" >
                    <?php
                    $total_gen = $male + $female;
                    echo $total_gen; // do not delete
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div><!-- Gender Section end -->

    <!-- Age Section start -->
    <div class="section-01">
        <h4>Age [වයස] :</h4>
        <table id="hor-minimalist-b" summary="">
            <thead>
            <tr>
                <th width="185" scope="col">Category</th>
                <th width="93" scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1-16</td>
                <td><?php echo $age_1_16; ?></td>
            </tr>
            <tr>
                <td>16-30</td>
                <td><?php echo $age_16_30; ?></td>
            </tr>
            <tr>
                <td>30-50</td>
                <td><?php echo $age_30_50; ?></td>
            </tr>
            <tr>
                <td>50 above</td>
                <td><?php echo $age_50; ?></td>
            </tr>
            <tr>
                <td class="td-style01" style="border-bottom:none;" >Total</td>
                <td class="td-style01" style="border-bottom:none;" >
                    <?php
                    $total_age = $age_1_16 + $age_16_30 + $age_30_50 + $age_50;
                    echo $total_age;
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div><!-- Age Section end -->
    </div>
    <!-- Update Time/ Print / PDF section Start -->
    <div class="stats02">
        <!--<a href="#" class="time">Sept 21  by Nelum</a>-->
        <a href="#" class="facebook">PDF</a>
        <a href="#" class="twitter">Print</a>
    </div><!-- Update Time/ Print / PDF section End -->

</div><!-- Race / Religion / Gender / Age  End	-->


<div class="section odd">
<div>
<!-- Branch Organizations Tabs Start -->
<h2>Branch Organizations</h2>
<!-- Category section Start -->
<div id="category_tabs">
<ul class="nav">
    <li><a href="#branch-or" class="current">Main Organisation</a></li>
    <li><a href="#youth">Youth Organisation</a></li>
    <li><a href="#women">Womens Organisation</a></li>
</ul>

<!-- List block section Start -->
<div class="list-block">
<!-- Main Organisation Start ---------------------------------------------- -->
<div id="branch-or">
<p><?php echo $branch_info->branchdsc; ?></p>
<?php
//echo "<pre>";
//print_r($orgmeminfo);
foreach ($mainorgmeminfo as $_data) :
    $designation = $_data['designationname'];
    $memberid = $_data['memberid'];
    $membername = $_data['membername'];
    $memberaddress = $_data['memberaddress'];
    $otherinfo = $_data['otherinfo'];
    $memberimage = $_data['memberimage'];
    $serviceperiod = $_data['serviceperiod'];
    $telephone = $_data['telephone'];


    if($memberimage == "")
    {
        $memberimage = "noimage.jpg";
    } else {
        $memberimage = $memberimage;
    }
?>
<!-- Main Organisation - Chairman start -->
<h4><a href="#" rel="toggle[chairman1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png"><?php echo $designation; ?><img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="chairman1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="330" scope="col"></th><th width="115" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left" valign="top">Name :</td>
            <td align="left" valign="top"><span><?php echo $membername; ?></span></td>
            <td rowspan="4" align="left" valign="top" class="person-img"><img src="<?php echo base_url(); ?>images/members/<?php echo $memberimage; ?>" border="0" alt="<?php echo $membername; ?>" /></td>
        </tr>
        <!--<tr>
            <td align="left" valign="top">Birthday : </td>
            <td align="left" valign="top"><span>DD / MM / YYYY</span></td>
        </tr>-->
        <tr>
            <td align="left" valign="top">Working Period :</td>
            <td align="left" valign="top"><span><?php echo $serviceperiod; ?> Years</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Tel No: </td>
            <td align="left" valign="top"><span><?php echo $telephone; ?></span></td>
        </tr>
        <tr>
            <td height="41" align="left" valign="top">Address : </td>
            <td colspan="2" align="left" valign="top"><span><?php echo $memberaddress; ?></span></td>
        </tr>
        <tr>
            <td height="43" align="left" valign="top">Other : </td>
            <td colspan="2" align="left" valign="top"><span><?php echo $otherinfo; ?></span></td>
        </tr>
        </tbody>
    </table>
</div><!-- Main Organisation - Chairman end -->
<?php endforeach; ?>
<!-- Main Organisation - Vice Chairman start -->
<!--<h4><a href="#" rel="toggle[vicechairman1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png">Vice Chairman<img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="vicechairman1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="330" scope="col"></th><th width="115" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left" valign="top">Name :</td>
            <td align="left" valign="top"><span>Dgdfg Ffghfdghf</span></td>
            <td rowspan="4" align="left" valign="top" class="person-img"><img src="images/person-img.jpg" alt="" /></td>
        </tr>
        <tr>
            <td align="left" valign="top">Birthday : </td>
            <td align="left" valign="top"><span>DD / MM / YYYY</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Working Period :</td>
            <td align="left" valign="top"><span>10 Years</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Tel No: </td>
            <td align="left" valign="top"><span>3563563356</span></td>
        </tr>
        <tr>
            <td height="41" align="left" valign="top">Address : </td>
            <td colspan="2" align="left" valign="top"><span>fgxfdx zdfgvxzfd, <br/> szgrfszd zsfgzdfgvxz,<br/> fgsfdgzfxzfv.</span></td>
        </tr>
        <tr>
            <td height="43" align="left" valign="top">Other : </td>
            <td colspan="2" align="left" valign="top"><span>&nbsp;</span></td>
        </tr>
        </tbody>
    </table>
</div>--><!-- Main Organisation - Vice Chairman end -->

<!-- Main Organisation - Secretary start -->
<!--<h4><a href="#" rel="toggle[secretary1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png">Secretary<img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="secretary1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="330" scope="col"></th><th width="115" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left" valign="top">Name :</td>
            <td align="left" valign="top"><span>Dgdfg Ffghfdghf</span></td>
            <td rowspan="4" align="left" valign="top" class="person-img"><img src="images/person-img.jpg" alt="" /></td>
        </tr>
        <tr>
            <td align="left" valign="top">Birthday : </td>
            <td align="left" valign="top"><span>DD / MM / YYYY</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Working Period :</td>
            <td align="left" valign="top"><span>10 Years</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Tel No: </td>
            <td align="left" valign="top"><span>3563563356</span></td>
        </tr>
        <tr>
            <td height="41" align="left" valign="top">Address : </td>
            <td colspan="2" align="left" valign="top"><span>fgxfdx zdfgvxzfd, <br/> szgrfszd zsfgzdfgvxz,<br/> fgsfdgzfxzfv.</span></td>
        </tr>
        <tr>
            <td height="43" align="left" valign="top">Other : </td>
            <td colspan="2" align="left" valign="top"><span>&nbsp;</span></td>
        </tr>
        </tbody>
    </table>
</div>--><!-- Main Organisation - Secretary end -->

<!-- Main Organisation - Vice Secretary start -->
<!--<h4><a href="#" rel="toggle[vicesecretary1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png">Vice Secretary<img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="vicesecretary1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="330" scope="col"></th><th width="115" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left" valign="top">Name :</td>
            <td align="left" valign="top"><span>Dgdfg Ffghfdghf</span></td>
            <td rowspan="4" align="left" valign="top" class="person-img"><img src="images/person-img.jpg" alt="" /></td>
        </tr>
        <tr>
            <td align="left" valign="top">Birthday : </td>
            <td align="left" valign="top"><span>DD / MM / YYYY</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Working Period :</td>
            <td align="left" valign="top"><span>10 Years</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Tel No: </td>
            <td align="left" valign="top"><span>3563563356</span></td>
        </tr>
        <tr>
            <td height="41" align="left" valign="top">Address : </td>
            <td colspan="2" align="left" valign="top"><span>fgxfdx zdfgvxzfd, <br/> szgrfszd zsfgzdfgvxz,<br/> fgsfdgzfxzfv.</span></td>
        </tr>
        <tr>
            <td height="43" align="left" valign="top">Other : </td>
            <td colspan="2" align="left" valign="top"><span>&nbsp;</span></td>
        </tr>
        </tbody>
    </table>
</div>--><!-- Main Organisation - Vice Secretary end -->

<!-- Main Organisation - Treasurer start -->
<!--<h4><a href="#" rel="toggle[treasurer1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png">Treasurer<img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="treasurer1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="330" scope="col"></th><th width="115" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left" valign="top">Name :</td>
            <td align="left" valign="top"><span>Dgdfg Ffghfdghf</span></td>
            <td rowspan="4" align="left" valign="top" class="person-img"><img src="images/person-img.jpg" alt="" /></td>
        </tr>
        <tr>
            <td align="left" valign="top">Birthday : </td>
            <td align="left" valign="top"><span>DD / MM / YYYY</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Working Period :</td>
            <td align="left" valign="top"><span>10 Years</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Tel No: </td>
            <td align="left" valign="top"><span>3563563356</span></td>
        </tr>
        <tr>
            <td height="41" align="left" valign="top">Address : </td>
            <td colspan="2" align="left" valign="top"><span>fgxfdx zdfgvxzfd, <br/> szgrfszd zsfgzdfgvxz,<br/> fgsfdgzfxzfv.</span></td>
        </tr>
        <tr>
            <td height="43" align="left" valign="top">Other : </td>
            <td colspan="2" align="left" valign="top"><span>&nbsp;</span></td>
        </tr>
        </tbody>
    </table>
</div>--><!-- Main Organisation - Treasurer end -->

<!-- Main Organisation - Vice Treasurer start -->
<!--<h4><a href="#" rel="toggle[vicetreasurer1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png">Vice Treasurer<img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="vicetreasurer1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="330" scope="col"></th><th width="115" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left" valign="top">Name :</td>
            <td align="left" valign="top"><span>Dgdfg Ffghfdghf</span></td>
            <td rowspan="4" align="left" valign="top" class="person-img"><img src="images/person-img.jpg" alt="" /></td>
        </tr>
        <tr>
            <td align="left" valign="top">Birthday : </td>
            <td align="left" valign="top"><span>DD / MM / YYYY</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Working Period :</td>
            <td align="left" valign="top"><span>10 Years</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Tel No: </td>
            <td align="left" valign="top"><span>3563563356</span></td>
        </tr>
        <tr>
            <td height="41" align="left" valign="top">Address : </td>
            <td colspan="2" align="left" valign="top"><span>fgxfdx zdfgvxzfd, <br/> szgrfszd zsfgzdfgvxz,<br/> fgsfdgzfxzfv.</span></td>
        </tr>
        <tr>
            <td height="43" align="left" valign="top">Other : </td>
            <td colspan="2" align="left" valign="top"><span>&nbsp;</span></td>
        </tr>
        </tbody>
    </table>
</div>--><!-- Main Organisation - Vice Treasurer end -->

<!-- Main Organisation - Active Members start -->
<!--<h4><a href="#" rel="toggle[active1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png">Active Members<img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="active1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="445" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td height="30" align="left" valign="top">Member 01  : </td>
            <td colspan="2" align="left" valign="top"><span>Fgxfdx zdfgvxzfd</span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 02  : </td>
            <td colspan="2" align="left" valign="top"><span>Adgzxfd srdfgsdfgrfgs</span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 03  : </td>
            <td colspan="2" align="left" valign="top"><span></span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 04  : </td>
            <td colspan="2" align="left" valign="top"><span></span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 05  : </td>
            <td colspan="2" align="left" valign="top"><span></span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 06  : </td>
            <td colspan="2" align="left" valign="top"><span></span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 07  : </td>
            <td colspan="2" align="left" valign="top"><span></span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 08  : </td>
            <td colspan="2" align="left" valign="top"><span></span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 09  : </td>
            <td colspan="2" align="left" valign="top"><span></span></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="top">Member 10  : </td>
            <td colspan="2" align="left" valign="top"><span></span></td>
        </tr>
        </tbody>
    </table>
</div>--><!-- Main Organisation - Active Members end -->
</div><!-- Main Organisation End ------------------------------------------ -->

<!-- Youth Organisation Start --------------------------------------------- -->
<div id="youth" class="hide">
    <p><?php echo $branch_info->branchdsc; ?></p>
<!-- Youth Organisation - Chairman start -->
<?php
//echo "<pre>";
//print_r($orgmeminfo);
foreach ($youthorgmeminfo as $_data) :
    $designation = $_data['designationname'];
    $memberid = $_data['memberid'];
    $membername = $_data['membername'];
    $memberaddress = $_data['memberaddress'];
    $otherinfo = $_data['otherinfo'];
    $memberimage = $_data['memberimage'];
    $serviceperiod = $_data['serviceperiod'];
    $telephone = $_data['telephone'];


    if($memberimage == "")
    {
        $memberimage = "noimage.jpg";
    } else {
        $memberimage = $memberimage;
    }
    ?>
<!-- Main Organisation - Chairman start -->
<h4><a href="#" rel="toggle[chairman1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png"><?php echo $designation; ?><img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="chairman1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="330" scope="col"></th><th width="115" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left" valign="top">Name :</td>
            <td align="left" valign="top"><span><?php echo $membername; ?></span></td>
            <td rowspan="4" align="left" valign="top" class="person-img"><img src="<?php echo base_url(); ?>images/members/<?php echo $memberimage; ?>" border="0" alt="<?php echo $membername; ?>" /></td>
        </tr>
        <!--<tr>
            <td align="left" valign="top">Birthday : </td>
            <td align="left" valign="top"><span>DD / MM / YYYY</span></td>
        </tr>-->
        <tr>
            <td align="left" valign="top">Working Period :</td>
            <td align="left" valign="top"><span><?php echo $serviceperiod; ?> Years</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Tel No: </td>
            <td align="left" valign="top"><span><?php echo $telephone; ?></span></td>
        </tr>
        <tr>
            <td height="41" align="left" valign="top">Address : </td>
            <td colspan="2" align="left" valign="top"><span><?php echo $memberaddress; ?></span></td>
        </tr>
        <tr>
            <td height="43" align="left" valign="top">Other : </td>
            <td colspan="2" align="left" valign="top"><span><?php echo $otherinfo; ?></span></td>
        </tr>
        </tbody>
    </table>
</div><!-- Youth Organisation - Chairman end -->
    <?php endforeach; ?>



<!-- Women Organisation Start --------------------------------------------- -->
<div id="women" class="hide">
    <p><?php echo $branch_info->branchdsc; ?></p>
<!-- Women Organisation - Chairman start -->
<?php
//echo "<pre>";
//print_r($orgmeminfo);
foreach ($womenorgmeminfo as $_data) :
    $designation = $_data['designationname'];
    $memberid = $_data['memberid'];
    $membername = $_data['membername'];
    $memberaddress = $_data['memberaddress'];
    $otherinfo = $_data['otherinfo'];
    $memberimage = $_data['memberimage'];
    $serviceperiod = $_data['serviceperiod'];
    $telephone = $_data['telephone'];


    if($memberimage == "")
    {
        $memberimage = "noimage.jpg";
    } else {
        $memberimage = $memberimage;
    }
    ?>
<!-- Main Organisation - Chairman start -->
<h4><a href="#" rel="toggle[chairman1]" data-openimage="images/show-hide-02.png" data-closedimage="images/show-hide-01.png"><?php echo $designation; ?><img src="images/show-hide-02.png" alt="" /></a></h4>
<div id="chairman1" class="inner-view">
    <table class="hor-minimalist-c">
        <thead>
        <tr>
            <th width="109" scope="col"></th><th width="330" scope="col"></th><th width="115" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left" valign="top">Name :</td>
            <td align="left" valign="top"><span><?php echo $membername; ?></span></td>
            <td rowspan="4" align="left" valign="top" class="person-img"><img src="<?php echo base_url(); ?>images/members/<?php echo $memberimage; ?>" border="0" alt="<?php echo $membername; ?>" /></td>
        </tr>
        <!--<tr>
            <td align="left" valign="top">Birthday : </td>
            <td align="left" valign="top"><span>DD / MM / YYYY</span></td>
        </tr>-->
        <tr>
            <td align="left" valign="top">Working Period :</td>
            <td align="left" valign="top"><span><?php echo $serviceperiod; ?> Years</span></td>
        </tr>
        <tr>
            <td align="left" valign="top">Tel No: </td>
            <td align="left" valign="top"><span><?php echo $telephone; ?></span></td>
        </tr>
        <tr>
            <td height="41" align="left" valign="top">Address : </td>
            <td colspan="2" align="left" valign="top"><span><?php echo $memberaddress; ?></span></td>
        </tr>
        <tr>
            <td height="43" align="left" valign="top">Other : </td>
            <td colspan="2" align="left" valign="top"><span><?php echo $otherinfo; ?></span></td>
        </tr>
        </tbody>
    </table>
</div><!-- Women Organisation - Chairman end -->
    <?php endforeach; ?>


</div><!-- List block section End -->
</div><!-- Category section End -->
<!-- Branch Organizations Tabs End -->

<!-- Area Sections Tabs Start -->
<h2>Area Sections</h2>
<div id="archives_tabs">
    <ul class="nav">
        <li><a href="#branches" class="current">Other Branches</a></li>
    </ul>
    <div class="list-block">
        <ul id="branches">
            <li><a href="#">Branch 01</a></li>
            <li><a href="#">Branch 02</a></li>
            <li><a href="#">Branch 03</a></li>
            <li><a href="#">Branch 04</a></li>
            <li><a href="#">Branch 05</a></li>
            <li><a href="#">Branch 06</a></li>
            <li><a href="#">Branch 07</a></li>
            <li><a href="#">Branch 08</a></li>
            <li><a href="#">Branch 09</a></li>
            <li><a href="#">Branch 10</a></li>
        </ul>
    </div>
</div>
<!-- Area Sections Tabs End -->

<!-- Update Time/ Print / PDF section Start -->
<div class="stats">
    <!--<a href="#" class="time">Sept 21  by Nelum</a>-->
    <a href="#" class="facebook">PDF</a>
    <a href="#" class="twitter">Print</a>
</div><!-- Update Time/ Print / PDF section Start -->
</div>
</div>

<!-- Bottom Navigation Root Start -->
<div id="btm-navi">
    <a href="#">Division name</a>&rarr; <a href="#">Region name</a>&rarr; <a href="#">Branch name</a>
</div><!-- Bottom Navigation Root End -->

</div><!-- .article section End -->
</div><!-- Main Right Section end ------------------------------------------ -->