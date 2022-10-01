<div class="bg-info">
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UserName</th>
                    <th>Marital Status</th>
                    <th>Address</th>
                    <th>Nationality</th>
                    <th>State</th>
                    <th>Town</th>
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
                                        <td>$maritalStatus</td>
                                        <td>$address</td>
                                        <td>$nationality</td>
                                        <td>$state</td>
                                        <td>$town</td>
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