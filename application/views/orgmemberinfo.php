<!-- Branch Organisation Details Search start -->
<div class="article2">
    <?php $this->load->view("topsearch"); ?>
</div><!-- Branch Organisation Details Search end -->

<!--
<ul class="about-navi">
    <li><a href="blog.html">Articles &amp; </br> Blog</a></li>
    <li><a href="accessories.html">Cameras &amp; </br> Accessories</a></li>
    <li><a href="tutorials.html">How To </br> &amp; Tutorials</a></li>
    <li><a href="guide.html">Buying </br> Guide</a></li>
    <li><a href="gallery.html">Photo </br> Gallery</a></li>
</ul>
-->
<!-- Page Navigation start-->
<!--<div id="page-navi"><a href="#">Gampola</a> &rarr; <a href="#">Udapalatha</a> &rarr; <a href="#">Region 01</a> &rarr; <a href="#" class="active">Branch 01</a></div>-->
<!-- Page Navigation end-->

<h2>Branch Organisation Committee Details</h2>

<!-- .article section Start -->
<div class="article">

<!-- Main/Youth/Women Organisation Search results setcion start	-->
<div class="news">

<!-- Branch Search results start -->
<div class="section-02 st">

<!-- Gampola→ Division 01→ Region 02→ Branch(Organisation List) start ------------------------------------------------------ -->

<!-- Gampola (Organisation List) start -->
<div id="searchresult" style="display: none;"></div>
<div id="defaultresult">
    <h5>Gampola (City Summery)</h5>
    <h6>Chairman (List)</h6>
    <div class="table-style" style="position:relative; z-index:0;">
        <table class="flexme1">
            <thead>
            <tr>
                <th width="80">Division</th>
                <th width="80">Region</th>
                <th width="80">Branch</th>
                <th width="60">Organisation</th>
                <th width="100">Name</th>
                <th width="100">Address</th>
                <th width="80">Contact No </th>
                <th width="80">Birthday </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($chairman_list as $_data) :
                $memid = $_data['memberid'];
                $memname = $_data['membername'];
                $memaddr = $_data['memberaddress'];
                $memtel = $_data['membertelephone'];
                $memotherinfo = $_data['otherinfo'];
                $memimg = $_data['memberimage'];
                $memservicePerios = $_data['serviceperiod'];
                $memdesignation = $_data['designationname'];
                $mem_division = $_data['divisionname'];
                $mem_zonename = $_data['zonename'];
                $mem_branchname = $_data['branchname'];
                $mem_orgname = $_data['orgname'];
            ?>
            <tr>
                <td><?php echo $mem_division; ?></td>
                <td><?php echo $mem_zonename; ?></td>
                <td><?php echo $mem_branchname; ?></td>
                <td><?php echo $mem_orgname; ?></td>
                <td><?php echo $memname; ?></td>
                <td><?php echo $memaddr; ?></td>
                <td><?php echo $memtel; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- Gampola (Organisation List) end -->
</div>


<!-- Gampola→ Division 01→ Region 02→ Branch(Organisation List) end -------------------------------------------------------- -->

<script type="text/javascript">
    $('.flexme1').flexigrid();

    function test(com, grid) {
        if (com == 'Delete') {
            confirm('Delete ' + $('.trSelected', grid).length + ' items?')
        } else if (com == 'Add') {
            alert('Add New Item');
        }
    }
</script>
</div><!-- Branch Search results end -->

<!-- Update Time/ Print / PDF section Start -->
<div class="stats02">
    <!--<a href="#" class="time">Sept 21 by Nelum</a>
    <a href="#" class="facebook">PDF</a>
    <a href="#" class="twitter">Print</a>-->
</div><!-- Update Time/ Print / PDF section End -->
</div><!-- Main/Youth/Women Organisation Search results setcion end	-->

<div class="section">
    <a href="#"><img src="<?php echo base_url(); ?>images/photos-034.jpg" width="158" height="143" alt=""/></a>
    <div>
        <!--<a href="#" class="time">Sept 21  by Nelum</a>-->
        <p>Pellentesque ac magna sit amet metus pretium ultricies. Nulla risus erat, varius ut tincidunt non, scelerisque ut mi.  Maecenas elit purus, dapibus in hendrerit in, consequat nec mi.</p>

        <!-- Update Time/ Print / PDF section Start -->
        <div class="stats">
            <!--<a href="#" class="time">Sept 21  by Nelum</a>-->
            <a href="#" class="facebook">PDF</a>
            <a href="#" class="twitter">Print</a>
        </div><!-- Update Time/ Print / PDF section End -->
    </div>
</div>

<div class="section odd">
    <a href="#"><img src="<?php echo base_url(); ?>images/photos-035.jpg" width="158" height="143" alt=""/></a>
    <div>
        <h3><a href="#">Gampola - Map Page</a></h3>
        <p>Pellentesque ac magna sit amet metus pretium ultricies. Nulla risus erat, varius ut tincidunt non, scelerisque ut mi.  Maecenas elit purus, dapibus in hendrerit in, consequat nec mi.</p>

        <!-- Update Time/ Print / PDF section Start -->
        <div class="stats">
            <!--<a href="#" class="time">Sept 21  by Nelum</a>-->
            <a href="#" class="facebook">PDF</a>
            <a href="#" class="twitter">Print</a>
        </div><!-- Update Time/ Print / PDF section End -->
    </div>
</div>

<!-- Bottom Navigation Root Start -->
<div id="btm-navi">
    <a href="#">Gampola</a> &rarr; <a href="#">Udapalatha</a> &rarr; <a href="#">Region 01</a> &rarr; <a href="#" class="active">Branch 01</a>
</div><!-- Bottom Navigation Root End -->

</div>