    <div class="news">
        <div class="section-02 st">
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
            </div>
        </div>
    </div>