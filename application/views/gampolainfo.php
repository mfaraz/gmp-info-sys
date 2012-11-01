<!-- #featured section start -->
<div id="featured">
    <div>
        <iframe width="690" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="gampolamap" src="https://maps.google.com/maps?hl=en&amp;q=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;geocode=FTJTbQAdm4DNBA&amp;split=0&amp;sll=37.0625,-95.677068&amp;sspn=23.875,57.630033&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;t=m&amp;source=embed&amp;ll=7.164682,80.576563&amp;spn=0.136427,0.261612&amp;z=13&amp;output=embed"></iframe><br />
        <small><a href="https://maps.google.com/maps?hl=en&amp;q=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;geocode=FTJTbQAdm4DNBA&amp;split=0&amp;sll=37.0625,-95.677068&amp;sspn=23.875,57.630033&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;t=m&amp;source=embed&amp;ll=7.164682,80.576563&amp;spn=0.136427,0.261612&amp;z=13" style="color:#999999;text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; margin:0 0 0 14px;">View Larger Map</a></small>
    </div>

    <!-- Update Time/ Print / PDF section Start -->
    <div class="stats">
        <!--<a href="#" class="time">Sept 21  by Nelum</a>-->
        <a href="#" class="facebook">PDF</a>
        <a href="#" class="twitter">Print</a>
    </div><!-- Update Time/ Print / PDF section End -->
</div><!-- #featured section end -->
<div class="article">
<!-- Udapalatha / Doluwa view details section Start -->
<div class="news">
    <div class="section-01 st">
        <h3><a href="#">Udapalatha</a></h3>
        <a href="#"><img src="<?php echo base_url(); ?>images/butterfly2.jpg" alt=""/></a>
        <p>Curabitur semper, lectus mollis semper, est tortor fermentum adipiscing vitaes</p>
        <span><a href="#">View More</a></span>
    </div>
    <div class="section-01 st">
        <h3><a href="#">Doluwa</a></h3>
        <a href="#"><img src="<?php echo base_url(); ?>images/butterfly2.jpg" alt=""/></a>
        <p>Mauris a mauris nibh, eu sodales metus. Aenean mattis, justo sit aliquetdia</p>
        <span><a href="#">View More</a></span>
    </div>

    <!-- Update Time/ Print / PDF section Start -->
    <div class="stats02">
        <!--<a href="#" class="time">Sept 21  by Nelum</a>-->
        <a href="#" class="facebook">PDF</a>
        <a href="#" class="twitter">Print</a>
    </div><!-- Update Time/ Print / PDF section End -->
</div><!-- Udapalatha / Doluwa view details section End -->

<!-- Race / Religion / Gender / Age  Start	-->
<div class="news">
    <!-- Race Section start -->
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
            foreach ($gampola_info_arr as $_data) :
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
                <li><a href="#divisions" class="current">Divisions</a></li>
                <li><a href="#regions">Regions</a></li>
                <li><a href="#branches">Branches</a></li>
            </ul>
            <div class="list-block">
                <ul id="divisions">
                    <li><a href="#">Uda Palatha</a> </li>
                    <li><a href="#">Doluwa</a> </li>
                </ul>
                <ul id="regions" class="hide">
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
    <a href="#">Population Statistics - Gampola</a>
</div><!-- Bottom Navigation Root End -->

</div>