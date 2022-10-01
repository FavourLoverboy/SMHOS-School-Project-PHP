<?php
    session_start();
    if($_SESSION['userName']){
        
    }else{
        header('location: login.php');
    }
?>
<?php include('includes/header.php'); ?>

    <!-- ============ Main Parent Body Container -->
    <div class="mainContainer">
        <div class="container-fluid">
            <div class="row">
                <!-- ============ Left Side ============ -->
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 leftNavSection">
                    <div class="row">
                        <?php include('pages/menu.php'); ?>
                    </div>
                </div>

                <!-- ============ Right Side ============ -->
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="row">
                        <!-- ============ Top Nav =========== -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 topNavSection">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 topNavLeftSection">
                                    <h1></h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 topNavMiddleSection">
                                    <p><a href="logout.php">LogOut</a></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 topNavRightSection">
                                    <img src="assets/3.png" alt="profile picture" width="50px" height="50px"style="border-radius:50%;">
                                    <p><?php echo $_SESSION['userName']; ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Main Dynamic Section -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 dynamicBodyBox">
                            <div class="bodyBox">
                                <?php include($pages);?>
                            </div>
                        </div>

                        <!-- ============ Footer Section -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 footerSection">
                            2021 All Rights Reserve.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>