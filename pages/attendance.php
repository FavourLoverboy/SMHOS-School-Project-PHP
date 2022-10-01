<div class="container">
    <div class="row justify-content-center theme">
        <form action="attendance" method="POST">
            <div class="col-md-10">
                <input type="text" name="theme" placeholder="Enter Theme Of The Week">
            </div>
            <div class="col-md-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<div class="bg-info">
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $tblquery = "SELECT * FROM attendance WHERE date = CURDATE()";
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
                                        <td>$timeIn</td>
                                        <td>$timeOut</td>
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

<?php

    if($_POST['submit']){

        extract($_POST);
    
        $tblquery = "INSERT INTO theme VALUES(:id, :theme, :date)";
        $tblvalue = array(
            ':id' => null,
            ':theme' => htmlspecialchars(ucfirst($theme)),
            ':date' => strftime("%Y-%m-%d %H:%M:%S", time())
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){

            $tblquery = "SELECT * FROM members WHERE status = 'Active'";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
                $_SESSION['ln'] = $lastName;
                $_SESSION['fn'] = $firstName;
                $_SESSION['on'] = $otherName;
                $_SESSION['sex'] = $sex;

                $tblquery = "INSERT INTO attendance VALUES(:id, :lastName, :firstName, :otherName, 
                :sex, :timeIn, :timeOut, :date)";
                $tblvalue = array(
                    ':id' => null,
                    ':lastName' => $_SESSION['ln'],
                    ':firstName' => $_SESSION['fn'],
                    ':otherName' => $_SESSION['on'],
                    ':sex' => $_SESSION['sex'],
                    ':timeIn' => "",
                    ':timeOut' => "",
                    ':date' => date('y:m:d')
                );
                $insert = $collect->tbl_insert($tblquery, $tblvalue);
                if($insert){
                    echo '<script> window.location="http://localhost/favour/attendance/created"; </script>';
                }
            }
        }
    }
?>