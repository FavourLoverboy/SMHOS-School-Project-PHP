<div class="container-fluid inner">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 top">
            <h1>Welcome to Clinton's HomeCell</h1>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 bottom">
            <form action="createUser" method="POST">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-6 left">
                        <span>User Details<span>
                        <div class="box">
                            <div class="form-group">
                                <input type="text" name="userName" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter a valid email address">
                            </div>
                            <div class="form-group">
                                <select name="position" required>
                                    <option value="User">Select Position</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 right">
                        <div class="box" style="padding-top:60px;">
                            "Love-motivated giving is the covenant gateway to Kingdom prosperity."
                            <br/>
                            <span style="color:red;">David Ibiyeomie</span>
                        </div>
                        <input type="submit" name="registerUser" class="btn btn1" value="Register">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

    if($_POST['registerUser']){

        extract($_POST);
    
        $tblquery = "INSERT INTO users VALUES(:userId, :userName, :password, :email, :position, :date, :status)";
        $tblvalue = array(
            ':userId' => null,
            ':userName' => htmlspecialchars(ucfirst($userName)),
            ':password' => htmlspecialchars($password),
            ':email' => htmlspecialchars($email),
            ':position' => htmlspecialchars($position),
            ':date' => strftime("%Y-%m-%d %H:%M:%S", time()),
            ':status' => "Active"
        );
        // print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="http://localhost/favour/createUser/created"; </script>';
        }
    }
?>