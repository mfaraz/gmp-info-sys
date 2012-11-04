<?php
//print_r($religious_info);
?>
<div class="article2">
    <?php $this->load->view("topsearch"); ?>
</div>

<div class="article" style="margin-top:10px;">


<div id="searchresult" style="display: none;"></div>
    <div id="defaultresult">
    <!-- Temple / Hindu Kovil / Churches / Mosques  Start	-->
    <div class="news">
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
    </div><!-- Temple / Hindu Kovil / Churches / Mosques  End	-->


<div class="section odd">
    <a href="#"><img src="<?php echo base_url(); ?>images/photos-029.jpg" width="158" height="143" alt=""/></a>
    <div>
        <h3><a href="#">Historical Information</a></h3>
        <p>Pellentesque ac magna sit amet metus pretium ultricies. Nulla risus erat, varius ut tincidunt non, scelerisque ut mi.  Maecenas elit purus, dapibus in hendrerit in, consequat nec mi.</p>


    </div>
</div>
    </div>
<!-- Bottom Navigation Root Start -->
<div id="btm-navi">
    <a href="#">Gampola</a> &rarr; <a href="#">Religious Information</a>
</div><!-- Bottom Navigation Root End -->
</div><!-- .article section End -->
