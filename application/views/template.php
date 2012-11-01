<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Gampola Area Information System</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="_your description goes here_" />
    <meta name="keywords" content="_your,keywords,goes,here_" />
    <meta name="author" content="PM Office" />
    <!-- General CSS --><link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" charset="utf-8" />
    <!-- General JS  --><script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Listbox Styling
    <script type="text/javascript" src="js/listbox-style.js"></script>
    <script type="text/javascript" src="js/customSelect.txt"></script>
    <script type="text/javascript">
        $(function(){
        $('select.styled').customSelect();
        });
    </script>
    -->

    <script type="text/javascript" src="<?php echo base_url(); ?>js/speckyboyscripts_may_2012.js"></script>

    <!-- Left Navi Menu Styling  -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.naviDropDown.1.0.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#navigation_horiz').naviDropDown({
                dropDownWidth: '600px'
            });
            $('#navigation_vert').naviDropDown({
                dropDownWidth: '600px',
                orientation: 'vertical'
            });
        });
    </script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/menu.css" type="text/css" />

    <!-- DIV Show hide Script  -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/animatedcollapse-1.js"></script>
    <script type="text/javascript">
        animatedcollapse.addDiv('jason', 'fade=1,height=80px')
        animatedcollapse.addDiv('kelly', 'fade=1,height=100px')
        animatedcollapse.addDiv('michael', 'fade=1,height=120px')

        animatedcollapse.addDiv('chairman1', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('vicechairman1', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('secretary1', 'fade=1, speed=600, group=organizations, persist=1')
        animatedcollapse.addDiv('vicesecretary1', 'fade=1, speed=600, group=organizations, persist=1')
        animatedcollapse.addDiv('treasurer1', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('vicetreasurer1', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('active1', 'fade=1, speed=600, group=organizations')

        animatedcollapse.addDiv('chairman2', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('vicechairman2', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('secretary2', 'fade=1, speed=600, group=organizations, persist=1')
        animatedcollapse.addDiv('vicesecretary2', 'fade=1, speed=600, group=organizations, persist=1')
        animatedcollapse.addDiv('treasurer2', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('vicetreasurer2', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('active2', 'fade=1, speed=600, group=organizations')

        animatedcollapse.addDiv('chairman3', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('vicechairman3', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('secretary3', 'fade=1, speed=600, group=organizations, persist=1')
        animatedcollapse.addDiv('vicesecretary3', 'fade=1, speed=600, group=organizations, persist=1')
        animatedcollapse.addDiv('treasurer3', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('vicetreasurer3', 'fade=1, speed=600, group=organizations')
        animatedcollapse.addDiv('active3', 'fade=1, speed=600, group=organizations')

        animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
            //$: Access to jQuery
            //divobj: DOM reference to DIV being expanded/ collapsed. Use "divobj.id" to get its ID
            //state: "block" or "none", depending on state
        }
        animatedcollapse.init()
    </script>

    <!-- Table CSS Styling  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/tables-01.css" type="text/css" />
    <!-- Flexcible Table Styling  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/flexigrid.pack.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>js/flexigrid.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>
    <!-- Scrollbar Styling  -->

</head>
<body>
<!-- Background Section start -->
<div id="background">
<img src="<?php echo base_url(); ?>images/absolute-img.jpg" alt="abs-img" class="abs-img" />

<!-- Full Page Section start -->
<div id="page">

<!-- Left Section start -->
<div class="sidebar">
    <div class="featured">
        <a href="index.html" class="figure"><img src="<?php echo base_url(); ?>images/logo-top.png" alt=""/></a>
        <h1>Information System</h1>
    </div>

    <!-- Left Navigation Menu start ------------ -->
    <div id="navigation_vert">

        <!-- Gampola [General Info] start  -->
        <h1><a href="about-gampola.html"><b>Gampola</b> [ General Info ]</a></h1>
        <ul>
            <li><a href="about-map.html" class="navlink">Supeivision Map</a></li>
            <li><a href="about-historical.html" class="navlink">Historical Information</a></li>
            <li><a href="about-creatures.html" class="navlink">Creatures Plants</a></li>
            <li><a href="about-gallery.html" class="navlink">Gallery</a></li>
        </ul><!-- Gampola [General Info] end  -->

        <!-- Population Statistics start  -->
        <h1><a href="<?php echo base_url(); ?>division/gampolainfo"><b>Population Statistics</b></a></h1>
        <ul>
            <!-- Udapalatha Dropdown Menu Start -->
            <li><a href="<?php echo base_url(); ?>division/info/1" class="navlink menu-arrow">UDAPALATHA</a>
                <div class="dropdown" id="dropdown_four">
                    <ul>
                        <?php
                            error_reporting(E_ALL);
                            $this->load->model("common_model");
                            $zone_arr = $this->common_model->getDivisionInfoById(1);
                            foreach ($zone_arr as $zone_entry) :
                                $branch_arr = $this->common_model->getBranchByZoneId(1, $zone_entry['zoneid']);

                        ?>
                        <li><a href="<?php echo base_url(); ?>zone/info/1/<?php echo $zone_entry['zoneid']; ?>"><?php echo $zone_entry['zonename']; ?></a>
                            <ul>
                                <?php
                                    foreach ($branch_arr as $branch_entry) :
                                ?>
                                <li><a href="<?php echo base_url(); ?>branch/info/1/<?php echo $zone_entry['zoneid']; ?>/<?php echo $branch_entry['branchid']; ?>"><?php echo $branch_entry['branchname']; ?></a></li>
                                <?php
                                    endforeach;
                                ?>
                            </ul>
                        </li>
                         <?php endforeach; ?>
                    </ul>
                </div>
            </li><!-- Udapalatha Dropdown Menu end -->

            <!-- Doluwa Dropdown Menu Start -->
            <li><a href="<?php echo base_url(); ?>division/info/2" class="navlink menu-arrow">DOLUWA</a>
                <div class="dropdown" id="dropdown_four">
                    <ul>
                        <?php
                        error_reporting(E_ALL);
                        $this->load->model("common_model");
                        $zone_arr = $this->common_model->getDivisionInfoById(2);
                        foreach ($zone_arr as $zone_entry) :
                            $branch_arr = $this->common_model->getBranchByZoneId(2, $zone_entry['zoneid']);

                            ?>
                            <li><a href="<?php echo base_url(); ?>zone/info/2/<?php echo $zone_entry['zoneid']; ?>"><?php echo $zone_entry['zonename']; ?></a>
                                <ul>
                                    <?php
                                    foreach ($branch_arr as $branch_entry) :
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>branch/info/2/<?php echo $zone_entry['zoneid']; ?>/<?php echo $branch_entry['branchid']; ?>"><?php echo $branch_entry['branchname']; ?></a></li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </li>
                            <?php endforeach; ?>
                    </ul>
                </div>
            </li><!-- Doluwa Dropdown Menu end -->
        </ul><!-- Population Statistics end  -->

        <!-- Organisations start  -->
        <h1><a href="#"><b>Organisations</b></a></h1>
        <ul>
            <li><a href="<?php echo base_url(); ?>organization/orgmemberinfo" class="navlink">Branch Committee Details</a></li>
            <li><a href="org-member-list.html" class="navlink">Committee Member List</a></li>
        </ul><!-- Organisations end  -->

        <!-- Religious Information start  -->
        <h1><a href="religious-info.html"><b>Religious Information</b></a></h1>
        <ul>
            <li><a href="religious-info.html" class="navlink">Buddhist Temple List</a></li>
            <li><a href="religious-info.html" class="navlink">Monastery List</a></li>
            <li><a href="religious-info.html" class="navlink">Hindu Kovil List</a></li>
            <li><a href="religious-info.html" class="navlink">Christian Church List</a></li>
            <li><a href="religious-info.html" class="navlink">Islam mosque List</a></li>
        </ul><!-- Religious Information end  -->
    </div><!-- Left Navigation Menu end ------------ -->

    <!-- Login Info start -->
    <div id="logininfo">
        <h3>Login info:</h3>
        <p><img src="<?php echo base_url(); ?>images/log-face.jpg" class="image-01-right" width="60" alt=""/>Welcome <b>Name..</b><br/>You logged as a Superadmin<br/><br/><a href="#">Profile info</a>&nbsp; | &nbsp;<a href="#">Logout</a></p>
    </div><!-- Login Info end -->

    <!-- Left Article Section start  -->
    <div id="left-article">
        <h3>About :</h3>
        <p>Gampola is a town located near Kandy in the Central Province of Sri Lanka. Gampola was made the capital city of the island by King Buwanekabahu IV, who ruled for four years in the mid fourteenth century. The last king of Gampola was..<a href="#">read more»</a></p>

        <h3>Area Map :</h3>
        <iframe width="215" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="gampolamap" src="https://maps.google.com/maps?hl=en&amp;q=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;geocode=FTJTbQAdm4DNBA&amp;split=0&amp;sll=37.0625,-95.677068&amp;sspn=23.875,57.630033&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;t=m&amp;source=embed&amp;ll=7.164682,80.576563&amp;spn=0.136427,0.261612&amp;z=13&amp;output=embed"></iframe><br />
        <small><a href="#" style="color:#999999;text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; margin:0; color:#0099CC;">View Larger Map</a></small>

        <h3>Summery :</h3>
        <ul>
            <li><b>City: </b>Gampola</li>
            <li><b>District: </b>Kandy</li>
            <li><b>Province: </b>Central</li>
            <li><b>Country: </b>Sri Lanka</li>
            <li><b>Location Type: </b>Hill Country</li>
            <li><b>Distance from Airport: </b>140 Km (4.30 hour drive)</li>
            <li><b>Distance from Colombo: </b>122 Km (4.00 hour drive) Last Modified: 28 Nov 2012 </li>
            <li><a href="#">Lorem ipsum dolor sit amet</a></li>
        </ul>
        <span>Sept 21 | by <a href="#">Nelum</a></span>

    </div><!-- Left Article Section end  -->

    <p class="copyright2">&#169; Copyright 2012. All Rights Reserved.</p>
</div><!-- Left Section end -->

<!-- Main Right Section start --------------------------------------------- -->
<div class="body">
    <!-- Search start-->
    <form action="" id="search">
        <input type="text"/>
        <input type="submit" value="" id="submit"/>
    </form>
    <!-- Search end-->

    <!-- Top Navigation start-->
    <ul id="navigation">
        <li class="selected"><a href="index.html">Home</a></li>
        <li><a href="#">User Management</a></li>
        <li><a href="#">Profile info</a></li>
        <li><a href="#">History</a></li>
        <li><a href="#" style="background-color:#CC0000; color:#f2c1d3; border:1px solid #eb5555;">Logout</a></li>
    </ul>
    <!-- Top Navigation end-->

    <h1><a href="index.html">Information System of Gampola</a></h1>

    <!-- Page Navigation start-->
    <?php echo $contents; ?>

        <!-- Bottom Navigation Root Start -->
        <div id="btm-navi">
            <a href="index.html">Home Page</a>
        </div><!-- Bottom Navigation Root End -->

    </div><!-- .article section End -->
</div><!-- Main Right Section end ------------------------------------------ -->
</div><!-- Full Page Section end -->
</div><!-- Background Section end -->
</body>
</html>