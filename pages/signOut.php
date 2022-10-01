
<div class="bg-info">
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Date</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $tblquery = "SELECT * FROM attendance WHERE date = CURDATE() && timeIn != '' && timeOut = ''";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <tr>
                                        <td>$lastName, $firstName $otherName</td>
                                        <td>$sex</td>
                                        <td>$date</td>
                                        <td>
                                            <form action='signOut' method='POST' style='margin:0px;padding:0px;'>
                                                <input type='hidden' name='timeOut' value='$id'>
                                                <input type='submit' name='signOut' class='btn btn-primary' value='Sign Out'>
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
    if($_POST['signOut']){

        extract($_POST);

        $subStrTime = strftime("%Y-%m-%d %H:%M:%S", time());
    
        $tblquery = "UPDATE attendance SET timeOut = :timeOut WHERE id = :id";
        $tblvalue = array(
            ':timeOut' => substr($subStrTime, 11),
            ':id' => $timeOut
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="http://localhost/favour/signOut/signOut"; </script>';
        }
    }
?>