<div class="bg-info">
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UserName</th>
                    <?php 
                        if($_SESSION['position'] == "Admin"){
                            echo "<th>Password</th>";
                        }
                    ?>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Date</th>
                    <?php 
                        if($_SESSION['position'] == "Admin"){
                            echo "<th>Update</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $tblquery = "SELECT * FROM users";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                if($_SESSION['position'] == "Admin"){
                                    if($status == "Active"){
                                        echo "
                                            <tr>
                                                <td>$userId</td>
                                                <td>$userName</td>
                                                <td>$password</td>
                                                <td>$email</td>
                                                <td>$position</td>
                                                <td>$date</td>
                                                <td>
                                                    <form action='viewUser' method='POST' style='margin:0px;padding:0px;'>
                                                        <input type='hidden' name='dis' value='$userId'>
                                                        <input type='submit' name='disable' value='Disable' class='btn btn-danger'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }else{
                                        echo "
                                            <tr>
                                                <td>$userId</td>
                                                <td>$userName</td>
                                                <td>$password</td>
                                                <td>$email</td>
                                                <td>$position</td>
                                                <td>$date</td>
                                                <td>
                                                    <form action='viewUser' method='POST' style='margin:0px;padding:0px;'>
                                                        <input type='hidden' name='ena' value='$userId'>
                                                        <input type='submit' name='enable' value='Enable' class='btn btn-success'>
                                                    </form>
                                                </td>
                                            </tr>
                                        "; 
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td>$userId</td>
                                            <td>$userName</td>
                                            <td>$email</td>
                                            <td>$position</td>
                                            <td>$date</td>
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
    
<script type="text/javascript">
    $(document).ready(function(){
        $('#table').DataTable();
    });
</script>
<?php
    if($_POST['disable']){
        extract($_POST);

        $tblquery = "UPDATE users SET status = 'Inactive' WHERE userId = :id";
        $tblvalue = array(
            ':id' => $dis
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo '<script> window.location="http://localhost/favour/viewUser/Disabled"; </script>';
        }
    }
?>

<?php
    if($_POST['enable']){
        extract($_POST);

        $tblquery = "UPDATE users SET status = 'Active' WHERE userId = :id";
        $tblvalue = array(
            ':id' => $ena
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo '<script> window.location="http://localhost/favour/viewUser/Enabled"; </script>';
        }
    }
?>