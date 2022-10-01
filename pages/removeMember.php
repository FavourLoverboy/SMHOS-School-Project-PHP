<button type="button" class="btn btn-danger" style="margin:2px;">
    <a href="muteMember" style="color:#fff">Mute Member Instead</a>
</button>
<hr/>
<div class="bg-info">
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Date</th>
                    <th>Remove</th>
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
                                        <td>$email</td>
                                        <td>$sex</td>
                                        <td>$date</td>
                                        <td>
                                            <form action='removeMember' method='POST' style='margin:0px;padding:0px;'>
                                                <input type='hidden' name='rem' value='$memId'>
                                                <input type='submit' name='remove' value='Remove' class='btn btn-danger'>
                                            </form>
                                        </td>
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
<?php
    if($_POST['remove']){
        extract($_POST);

        $tblquery = "DELETE FROM members WHERE memId = :id";
        $tblvalue = array(
            ':id' => $rem
        );
        $delete = $collect->tbl_delete($tblquery, $tblvalue);
        if($delete){
            echo '<script> window.location="http://localhost/favour/removeMember/Deleted"; </script>';
        }
    }
?>