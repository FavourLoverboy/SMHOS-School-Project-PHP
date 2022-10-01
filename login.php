<?php
    session_start();
    include('config/dataBaseLink.php');
    $collect = new HomeCell();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="http://localhost/favour/"/>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Computerized HomeCell Attendance</title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="" href="./assets/favicon.jfif">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="./styles/bootstrap.css">
        <link rel="stylesheet" href="./styles/stylesheet.css">
    </head>
    <body>
        <div class="containerBox">
            <div class="overLay"></div>
            <div class="Box">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 boxImg">
                            <div class="bookImg1"></div>
                            <div class="bookImg2"></div>
                        </div>
                        <div class="col-md-6 formBox">
                            <form action="login.php" method="POST">
                                <h3>Welcome to clinton wachukwu homecell</h3>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="emailOrUserName" class="form-control" id="email" placeholder="Enter a valid email address">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                </div>
                                <input type="submit" name="login" class="btn" style="background:#abcabc;" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="BoxDown">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 text">
                            <p>SMHOS HomeCell.</p>
                        </div>
                        <div class="col-md-6">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>    
                                    <li> 
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>    
                                    <li> 
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>    
                                    <li> 
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>    
                                    <li> 
                                </ul>    
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

<!-- ============ Including Footer ============ -->
<?php include('includes/footer.php'); ?>

<?php
    if($_POST['login']){
        extract($_POST);
        $tblquery = "SELECT * FROM users WHERE (email = :emailOrUserName || userName = :emailOrUserName) && password = :password && status = :status";
        $tblvalue = array(
            ':emailOrUserName' => htmlspecialchars($emailOrUserName),
            ':password' => htmlspecialchars($password),
            ':status' => "Active"
        );
        //print_r($tblvalue);
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                $_SESSION['userId'] = $userId;
                $_SESSION['userName'] = $userName;
                $_SESSION['email'] = $email;
                $_SESSION['position'] = $position;

                header('Location: dashboard');
                echo '<script> window.location="dashboard"; </script>';
            }
        }else{
            echo '<script> window.location="http://localhost/favour/login.php"; </script>';
        }
    }
?>




