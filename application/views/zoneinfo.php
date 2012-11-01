<?php
if($division_id == 1) {
    $division = "Uda Palatha";
} else if($division_id == 2) {
    $division = "Doluwa";
}
?>
<!-- Search by Category start -->
<div class="article2">
    <div class="section2 app-search">
        <h1>Population Statistics Search :</h1>
        <form action="" method="get" name="">
            <div class="form-sect-1">
                <select style="width:110px;" class="roundList">
                    <option value="">City [නගරය]</option>
                    <option>Gampola</option>
                </select>

                <select name="division" id="cmbDivision" style="width:158px;" class="roundList" onchange="getRegion(this.value)">
                    <option value="">Division [කොට්ඨාශය]</option>
                    <option value="1">Uda Palatha</option>
                    <option value="2">Doluwa</option>
                </select>

                <select name="zone" style="width:136px;" class="roundList" id="cmbRegion">
                    <option value="">Region [කලාපය]</option>
                </select>
                <div id="setregion" style="display: none;"></div>

                <select name="branch" style="width:126px;" class="roundList" id="cmbBranch">
                    <option value="">Branch [ශාඛාව]</option>
                </select>
                <div id="setbranch" style="display: none;"></div>
                <input name="search" type="button" value="Search" class="s-btn1" style="float:left;" onclick="getSearchResult();" />
            </div>
        </form>
    </div>
</div><!-- Search by Category end -->

<!-- Page Navigation start-->
<div id="page-navi"><a href="#"><?php echo $division; ?></a>&rarr; <a><?php echo $zone_info->zonename; ?></a></div>
<!-- Page Navigation end-->

<h2><?php echo $zone_info->zonename; ?></h2>

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
            foreach ($zone_arr as $_data) :
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
        <!-- Area Sections Tabs Start -->
        <h2>Area Sections</h2>
        <div id="archives_tabs">
            <ul class="nav">
                <li><a href="#regions" class="current">Other Regions</a></li>
                <li><a href="#branches">Other Branches</a></li>
            </ul>
            <div class="list-block">
                <ul id="regions">
                    <li><a href="#">Region 01</a> </li>
                    <li><a href="#">Region 02</a> </li>
                    <li><a href="#">Region 03</a> </li>
                    <li><a href="#">Region 04</a> </li>
                </ul>
                <ul id="branches" class="hide">
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
    <a href="#">Division name</a>&rarr; <a href="#">Region name</a>
</div><!-- Bottom Navigation Root End -->

</div><!-- .article section End -->
</div><!-- Main Right Section end ------------------------------------------ -->