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
                            echo "<th>Remove</th>";
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
                                    echo "
                                        <tr>
                                            <td>$userId</td>
                                            <td>$userName</td>
                                            <td>$password</td>
                                            <td>$email</td>
                                            <td>$position</td>
                                            <td>$date</td>
                                            <td>
                                                <form action='removeUser' method='POST' style='margin:0px;padding:0px;'>
                                                    <input type='hidden' name='rem' value='$userId'>
                                                    <input type='submit' name='remove' value='Remove' class='btn btn-danger'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
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
    if($_POST['remove']){
        extract($_POST);

        $tblquery = "DELETE FROM users WHERE userId = :id";
        $tblvalue = array(
            ':id' => $rem
        );
        $delete = $collect->tbl_delete($tblquery, $tblvalue);
        if($delete){
            echo '<script> window.location="http://localhost/favour/removeUser/Deleted"; </script>';
        }
    }
?>