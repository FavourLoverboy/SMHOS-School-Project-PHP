<div class="bg-info">
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UserName</th>
                    <th>Baptised</th>
                    <th>MemberShip</th>
                    <th>Name Of church</th>
                    <th>Satellite</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $tblquery = "SELECT * FROM members";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <tr>
                                        <td>$memId</td>
                                        <td>$lastName, $firstName $otherName</td>
                                        <td>$areYouBaptised</td>
                                        <td>$areYouAMember</td>
                                        <td>$churchName</td>
                                        <td>$churchBranch</td>
                                        <td>$date</td>
                                    </tr>
                                ";
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>