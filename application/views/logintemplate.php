<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Gampola Area Information System - Login page</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="_your description goes here_" />
    <meta name="keywords" content="_your,keywords,goes,here_" />
    <meta name="author" content="PM Office" />
    <!-- General CSS --><link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" charset="utf-8" />
    <!-- General JS  --><script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/login-page.css" type="text/css" charset="utf-8" />
</head>

<!-- Table Styling  -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/tables-01.css" type="text/css" />

<body>
<div id="background">
    <img src="<?php echo base_url(); ?>images/absolute-img.jpg" alt="abs-img" class="abs-img" />
    <div id="page">

        <!-- Left Sidebar start -->
        <div class="sidebar">
            <div class="featured" style="margin-top:20px;">
                <a href="#" class="figure"><img src="<?php echo base_url(); ?>images/logo-top.png" alt=""/></a>
                <h1>Information System</h1>
            </div>

            <div id="article">
                <h3>Discussions</h3>
                <ul>
                    <li>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Right Section start --------------------------------------------- -->
        <div class="body">

            <div class="article">
                <?php echo $contents; ?>
                <p class="copyright" >&#169; Copyright 2012. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>