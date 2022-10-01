<button type="button" class="btn btn-success" style="margin:2px;">
    <a href="removeMember" style="color:#fff">Back</a>
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
                    <th>Mute</th>
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
                                if($status == 'Active'){
                                    echo "
                                        <tr>
                                            <td>$memId</td>
                                            <td>$lastName, $firstName $otherName</td>
                                            <td>$email</td>
                                            <td>$sex</td>
                                            <td>$date</td>
                                            <td>
                                                <form action='muteMember' method='POST' style='margin:0px;padding:0px;'>
                                                    <input type='hidden' name='mute' value='$memId'>
                                                    <input type='submit' name='muteBtn' value='Mute' class='btn btn-danger'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                                else if($status == 'Inactive'){
                                    echo "
                                        <tr>
                                            <td>$memId</td>
                                            <td>$lastName, $firstName $otherName</td>
                                            <td>$email</td>
                                            <td>$sex</td>
                                            <td>$date</td>
                                            <td>
                                                <form action='muteMember' method='POST' style='margin:0px;padding:0px;'>
                                                    <input type='hidden' name='unMute' value='$memId'>
                                                    <input type='submit' name='unMuteBtn' value='Unmute' class='btn btn-success'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php
    if($_POST['muteBtn']){
        extract($_POST);

        $tblquery = "UPDATE members SET status = :status WHERE memId = :id";
        $tblvalue = array(
            ':status' => "Inactive",
            ':id' => $mute
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo '<script> window.location="http://localhost/favour/muteMember/muted"; </script>';
        }
    }
    else if($_POST['unMuteBtn']){
        extract($_POST);

        $tblquery = "UPDATE members SET status = :status WHERE memId = :id";
        $tblvalue = array(
            ':status' => "Active",
            ':id' => $unMute
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo '<script> window.location="http://localhost/favour/muteMember/Unmuted"; </script>';
        }
    }
?>