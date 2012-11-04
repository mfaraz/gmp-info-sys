<!-- Main/Youth/Women Organisation Search results setcion start	-->
<div class="news">

<!-- Branch Search results start -->
<div class="section-02 st">

<!-- Gampola→ Division 01→ Region 02→ Branch(Organisation List) start ------------------------------------------------------ -->

<!-- Gampola (Organisation List) start -->
<h5>Search Result</h5>
<div class="table-style" style="position:relative; z-index:0;">
    <?php
        if(count($_collection) > 0) {
    ?>
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
            foreach($_collection as $_data) :
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
    <?php
        } else {
            echo "<span style='color: #ff0000;'>No Search result for your search criteria</span>";
        }
    ?>
    <div id="clear_result"><a href="javascript: void(0);" onclick="clearResult()">clear search result</a></div>
</div><!-- Gampola (Organisation List) end -->
</div><!-- Gampola→ Division 01→ Region 02→ Branch(Organisation List) end-->


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

</div><!-- Main/Youth/Women Organisation Search results setcion end	-->

<div class="section">
    <a href="#"><img src="images/photos-034.jpg" width="158" height="143" alt=""/></a>
    <div>
        <h3><a href="#">Religious Information</a></h3>
        <p>Pellentesque ac magna sit amet metus pretium ultricies. Nulla risus erat, varius ut tincidunt non, scelerisque ut mi.  Maecenas elit purus, dapibus in hendrerit in, consequat nec mi.</p>


    </div>
</div>