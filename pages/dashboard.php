<div class="container">
    <div class="row justify-content-center">
        <?php
            $tblquery = "SELECT * FROM theme ORDER BY date DESC LIMIT 1";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                    $themeShow = $theme;
                    if($themeShow != ''){
                        echo "
                            <h3 class='text-center'>Theme: $theme</h3>
                        ";
                    }
                    if($theme == ''){
                        echo "
                            <h3 class='text-center'>No Theme yet</h3>
                        ";
                    }
            }
        ?>
    </div>
    <div class="row odd">
        <div class="col-md-4 dashBox" style="width:350px;">
            <a href="attendance">
                <span><i class="fa fa-clock-o"></i></span>
            </a>
            <div class="row">
                <div class="col-md-10">
                    <strong>Attendance</strong>
                </div>
                <div class="col-md-2">
                    <?php
                        $tblquery = "SELECT count(lastName) as totalCount FROM attendance WHERE date = CURDATE()";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <strong style='font-size:20px;'>$totalCount</strong>
                                ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 dashBox" style="width:350px;">
            <a href="attendance">
                <span><i class="fa fa-sign-in"></i></span>
            </a>
            <div class="row">
                <div class="col-md-10">
                    <strong>Signed In</strong>
                </div>
                <div class="col-md-2">
                    <?php
                        $tblquery = "SELECT count(lastName) as totalCount FROM attendance WHERE date = CURDATE() && timeIn != ''";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <strong style='font-size:20px;'>$totalCount</strong>
                                ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 dashBox" style="width:350px;">
            <a href="attendance">
                <span><i class="fa fa-sign-out"></i></span>
            </a>
            <div class="row">
                <div class="col-md-10">
                    <strong>Signed Out</strong>
                </div>
                <div class="col-md-2">
                    <?php
                        $tblquery = "SELECT count(lastName) as totalCount FROM attendance WHERE date = CURDATE() && timeOut != ''";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <strong style='font-size:20px;'>$totalCount</strong>
                                ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 dashBox" style="width:350px;">
            <a href="attendance">
                <span><i class="fa fa-home"></i></span>
            </a>
            <div class="row">
                <div class="col-md-10">
                    <strong>Members</strong>
                </div>
                <div class="col-md-2">
                    <?php
                        $tblquery = "SELECT count(lastName) as totalCount FROM members";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <strong style='font-size:20px;'>$totalCount</strong>
                                ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 dashBox" style="width:350px;">
            <a href="attendance">
                <span><i class="fa fa-home"></i></span>
            </a>
            <div class="row">
                <div class="col-md-10">
                    <strong>Active Members</strong>
                </div>
                <div class="col-md-2">
                    <?php
                        $tblquery = "SELECT count(lastName) as totalCount FROM members WHERE status = 'Active'";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <strong style='font-size:20px;'>$totalCount</strong>
                                ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 dashBox" style="width:350px;">
            <a href="attendance">
                <span><i class="fa fa-cancel"></i></span>
            </a>
            <div class="row">
                <div class="col-md-10">
                    <strong>Non Active Members</strong>
                </div>
                <div class="col-md-2">
                    <?php
                        $tblquery = "SELECT count(lastName) as totalCount FROM members WHERE status = 'Inactive'";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <strong style='font-size:20px;'>$totalCount</strong>
                                ";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>