<?php
//print_r($religious_info);
?>
<div class="article2">
    <?php $this->load->view("topsearch"); ?>
</div>

<h2>Religious Information</h2>

<!-- #featured section start -->
<div id="featured">
    <div style="padding-bottom:5px;">
        <img src="<?php echo base_url(); ?>images/top-ban-11.png" width="690" class="left-align" style="margin-bottom:10px;" alt=""/>
        <p>You can remove any link to our website from this website template, you're free to use this website template without linking back to us.If you're having problems editing this website template, then don't hesitate to ask for help on the You can remove any link to our website from this website template, you're free to use this website template without linking back to us..
    </div>
</div><!-- #featured section end -->

<div class="article" style="margin-top:10px;">

<div class="news">
    <div id="searchresult" style="display: none;"></div>
    <div id="defaultresult">
        <!-- Temple / Hindu Kovil / Churches / Mosques  Start	-->

            <div class="section-02 st">
                <!-- Buddhist Temple List Start -->
                <h5><?php echo $religious['ORG']; ?> List [විහාරස්ථාන නාමලේඛනය] :</h5>
                <table class="hor-minimalist-d" summary="">
                    <thead>
                    <tr>
                        <th width="15" scope="col" height="30">No:</th>
                        <th width="325" scope="col">Name & Address of the Temple:</th>
                        <th width="300" scope="col">Name of the Head Priest:</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($religious_info as $religious) :
                ?>
                    <tr>
                        <td><div align="right"><?php echo $religious['orgid']; ?>.</div></td>
                        <td><a href="<?php echo base_url(); ?>religious/details/<?php echo $religious['orgid']; ?>" class="list-02"><?php echo $religious['orgname']; ?></a><br /> <?php echo $religious['orgaddress']; ?>.</td>
                        <td><?php echo $religious['membername']; ?></td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                    </tbody>
                </table>
                </table><!-- Buddhist Temple List End -->


            </div>
        <!-- Temple / Hindu Kovil / Churches / Mosques  End	-->
    </div>
 </div>
        <div class="section odd">
            <a href="#"><img src="<?php echo base_url(); ?>images/photos-029.jpg" width="158" height="143" alt=""/></a>
            <div>
                <h3><a href="#">Historical Information</a></h3>
                <p>Pellentesque ac magna sit amet metus pretium ultricies. Nulla risus erat, varius ut tincidunt non, scelerisque ut mi.  Maecenas elit purus, dapibus in hendrerit in, consequat nec mi.</p>
        </div>
        </div>

<!-- Bottom Navigation Root Start -->
<div id="btm-navi">
    <a href="<?php echo base_url(); ?>about/aboutgampola">Gampola</a> &rarr; Religious Information
</div><!-- Bottom Navigation Root End -->
</div><!-- .article section End -->
