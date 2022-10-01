
<div class="bg-info">
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Date</th>
                    <th>Time In</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $tblquery = "SELECT * FROM attendance WHERE date = CURDATE() && timeIn = ''";
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
                                            <form action='signIn' method='POST' style='margin:0px;padding:0px;'>
                                                <input type='hidden' name='signIn' value='$id'>
                                                <input type='submit' name='sign' class='btn btn-primary' value='Sign In'>
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
    if($_POST['sign']){

        extract($_POST);

        $subStrTime = strftime("%Y-%m-%d %H:%M:%S", time());
    
        $tblquery = "UPDATE attendance SET timeIn = :timeIn WHERE id = :id";
        $tblvalue = array(
            ':timeIn' => substr($subStrTime, 11),
            ':id' => $signIn
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="http://localhost/favour/signIn/signIn"; </script>';
        }
    }
?>